<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('page_industry_cards', function (Blueprint $table) {
            $table->foreignId('image_media_id')->nullable()->after('icon')->constrained('media')->nullOnDelete();
            $table->string('image_alt')->nullable()->after('image_media_id');
        });
    }

    public function down(): void
    {
        Schema::table('page_industry_cards', function (Blueprint $table) {
            $table->dropConstrainedForeignId('image_media_id');
            $table->dropColumn('image_alt');
        });
    }
};
