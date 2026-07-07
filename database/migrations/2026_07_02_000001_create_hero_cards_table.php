<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('hero_cards', function (Blueprint $table) {
            $table->id();
            $table->foreignId('page_id')->constrained('pages')->cascadeOnDelete();
            $table->unsignedTinyInteger('order')->default(0);
            $table->string('badge')->nullable();
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->json('rows')->nullable();
            $table->foreignId('image_media_id')->nullable()->constrained('media')->nullOnDelete();
            $table->string('image_alt')->nullable();
            $table->string('cta_label')->nullable();
            $table->string('cta_url')->nullable();
            $table->boolean('is_visible')->default(true);
            $table->timestamps();

            $table->unique(['page_id', 'order']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('hero_cards');
    }
};
