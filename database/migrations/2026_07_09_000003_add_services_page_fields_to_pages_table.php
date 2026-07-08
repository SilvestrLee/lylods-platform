<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pages', function (Blueprint $table) {
            // Services page — Intro
            $table->string('services_page_intro_heading')->nullable();
            $table->text('services_page_intro_body')->nullable();

            // Services page — Closing CTA
            $table->string('services_page_cta_heading')->nullable();
            $table->text('services_page_cta_description')->nullable();
            $table->string('services_page_cta_primary_label')->nullable();
            $table->string('services_page_cta_primary_url')->nullable();
            $table->string('services_page_cta_secondary_label')->nullable();
            $table->string('services_page_cta_secondary_url')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('pages', function (Blueprint $table) {
            $table->dropColumn([
                'services_page_intro_heading',
                'services_page_intro_body',
                'services_page_cta_heading',
                'services_page_cta_description',
                'services_page_cta_primary_label',
                'services_page_cta_primary_url',
                'services_page_cta_secondary_label',
                'services_page_cta_secondary_url',
            ]);
        });
    }
};
