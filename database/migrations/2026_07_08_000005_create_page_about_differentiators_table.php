<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('page_about_differentiators', function (Blueprint $table) {
            $table->id();
            $table->foreignId('page_id')->constrained('pages')->cascadeOnDelete();
            $table->unsignedTinyInteger('order')->default(0);
            $table->string('icon')->nullable();
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->boolean('visibility')->default(true);
            $table->timestamps();

            $table->unique(['page_id', 'order']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('page_about_differentiators');
    }
};
