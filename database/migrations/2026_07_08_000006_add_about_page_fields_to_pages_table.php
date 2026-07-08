<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pages', function (Blueprint $table) {
            // About page — Who We Are / Introduction
            $table->string('about_page_intro_heading')->nullable();
            $table->text('about_page_intro_body')->nullable();
            $table->foreignId('about_page_intro_media_id')->nullable()->constrained('media')->nullOnDelete();
            $table->string('about_page_intro_cta_label')->nullable();
            $table->string('about_page_intro_cta_url')->nullable();

            // About page — Closing CTA
            $table->string('about_page_cta_heading')->nullable();
            $table->text('about_page_cta_description')->nullable();
            $table->string('about_page_cta_primary_label')->nullable();
            $table->string('about_page_cta_primary_url')->nullable();
            $table->string('about_page_cta_secondary_label')->nullable();
            $table->string('about_page_cta_secondary_url')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('pages', function (Blueprint $table) {
            $table->dropConstrainedForeignId('about_page_intro_media_id');

            $table->dropColumn([
                'about_page_intro_heading',
                'about_page_intro_body',
                'about_page_intro_cta_label',
                'about_page_intro_cta_url',
                'about_page_cta_heading',
                'about_page_cta_description',
                'about_page_cta_primary_label',
                'about_page_cta_primary_url',
                'about_page_cta_secondary_label',
                'about_page_cta_secondary_url',
            ]);
        });
    }
};
