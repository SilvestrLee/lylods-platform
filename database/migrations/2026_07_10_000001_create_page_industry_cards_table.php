<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('page_industry_cards', function (Blueprint $table) {
            $table->id();
            $table->foreignId('page_id')->constrained('pages')->cascadeOnDelete();
            $table->unsignedTinyInteger('order')->default(0);
            $table->string('title')->nullable();
            $table->string('slug')->nullable();
            $table->text('description')->nullable();
            $table->string('icon')->nullable();
            $table->boolean('visibility')->default(true);
            $table->timestamps();

            $table->unique(['page_id', 'order']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('page_industry_cards');
    }
};
