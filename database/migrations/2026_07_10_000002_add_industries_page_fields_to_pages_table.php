<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pages', function (Blueprint $table) {
            // Industries page — Intro
            $table->string('industries_page_intro_heading')->nullable();
            $table->text('industries_page_intro_body')->nullable();

            // Industries page — Closing CTA
            $table->string('industries_page_cta_heading')->nullable();
            $table->text('industries_page_cta_description')->nullable();
            $table->string('industries_page_cta_primary_label')->nullable();
            $table->string('industries_page_cta_primary_url')->nullable();
            $table->string('industries_page_cta_secondary_label')->nullable();
            $table->string('industries_page_cta_secondary_url')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('pages', function (Blueprint $table) {
            $table->dropColumn([
                'industries_page_intro_heading',
                'industries_page_intro_body',
                'industries_page_cta_heading',
                'industries_page_cta_description',
                'industries_page_cta_primary_label',
                'industries_page_cta_primary_url',
                'industries_page_cta_secondary_label',
                'industries_page_cta_secondary_url',
            ]);
        });
    }
};
