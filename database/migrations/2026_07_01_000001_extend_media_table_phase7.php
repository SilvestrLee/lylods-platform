<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('media', function (Blueprint $table) {
            $table->uuid('uuid')->nullable()->unique()->after('id');
            $table->string('original_filename')->nullable()->after('title');
            $table->string('filename')->nullable()->after('original_filename');
            $table->string('directory')->nullable()->after('filename');
            $table->string('extension', 20)->nullable()->after('directory');
            $table->string('category', 100)->nullable()->after('mime_type');
            $table->text('description')->nullable()->after('caption');
            $table->string('credit')->nullable()->after('description');
            $table->string('copyright')->nullable()->after('credit');
            $table->unsignedTinyInteger('focal_point_x')->nullable()->after('height');
            $table->unsignedTinyInteger('focal_point_y')->nullable()->after('focal_point_x');
            $table->json('variants')->nullable()->after('focal_point_y');
            $table->boolean('is_public')->default(true)->after('variants');
            $table->foreignId('updated_by')->nullable()->constrained('users')->nullOnDelete()->after('uploaded_by');
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::table('media', function (Blueprint $table) {
            $table->dropSoftDeletes();
            $table->dropForeign(['updated_by']);
            $table->dropColumn([
                'uuid', 'original_filename', 'filename', 'directory', 'extension',
                'category', 'description', 'credit', 'copyright',
                'focal_point_x', 'focal_point_y', 'variants', 'is_public', 'updated_by',
            ]);
        });
    }
};
