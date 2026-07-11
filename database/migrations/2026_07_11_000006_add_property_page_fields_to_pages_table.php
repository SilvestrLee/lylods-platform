<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Guarded with hasColumn checks so this migration is safely re-runnable
        // if a prior attempt partially applied before failing (DDL statements
        // are not transactional in MySQL).
        Schema::table('pages', function (Blueprint $table) {
            // Property page — What We Support (intro)
            if (! Schema::hasColumn('pages', 'property_support_eyebrow')) {
                $table->text('property_support_eyebrow')->nullable();
            }
            if (! Schema::hasColumn('pages', 'property_support_heading')) {
                $table->text('property_support_heading')->nullable();
            }
            if (! Schema::hasColumn('pages', 'property_support_body')) {
                $table->text('property_support_body')->nullable();
            }

            // Property page — Context image break
            if (! Schema::hasColumn('pages', 'property_context_media_id')) {
                $table->foreignId('property_context_media_id')->nullable()->constrained('media')->nullOnDelete();
            }
            if (! Schema::hasColumn('pages', 'property_context_eyebrow')) {
                $table->text('property_context_eyebrow')->nullable();
            }
            if (! Schema::hasColumn('pages', 'property_context_heading')) {
                $table->text('property_context_heading')->nullable();
            }

            // Property page — Who We Help (intro)
            if (! Schema::hasColumn('pages', 'property_audience_eyebrow')) {
                $table->text('property_audience_eyebrow')->nullable();
            }
            if (! Schema::hasColumn('pages', 'property_audience_heading')) {
                $table->text('property_audience_heading')->nullable();
            }
            if (! Schema::hasColumn('pages', 'property_audience_body')) {
                $table->text('property_audience_body')->nullable();
            }

            // Property page — Why Clients Work With Us (intro)
            if (! Schema::hasColumn('pages', 'property_why_us_eyebrow')) {
                $table->text('property_why_us_eyebrow')->nullable();
            }
            if (! Schema::hasColumn('pages', 'property_why_us_heading')) {
                $table->text('property_why_us_heading')->nullable();
            }
            if (! Schema::hasColumn('pages', 'property_why_us_body')) {
                $table->text('property_why_us_body')->nullable();
            }

            // Property page — Our Role
            if (! Schema::hasColumn('pages', 'property_role_eyebrow')) {
                $table->text('property_role_eyebrow')->nullable();
            }
            if (! Schema::hasColumn('pages', 'property_role_heading')) {
                $table->text('property_role_heading')->nullable();
            }
            if (! Schema::hasColumn('pages', 'property_role_body')) {
                $table->text('property_role_body')->nullable();
            }

            // Property page — Professional Network panel
            if (! Schema::hasColumn('pages', 'property_network_eyebrow')) {
                $table->text('property_network_eyebrow')->nullable();
            }
            if (! Schema::hasColumn('pages', 'property_network_heading')) {
                $table->text('property_network_heading')->nullable();
            }
            if (! Schema::hasColumn('pages', 'property_network_body')) {
                $table->text('property_network_body')->nullable();
            }
            if (! Schema::hasColumn('pages', 'property_network_footnote')) {
                $table->text('property_network_footnote')->nullable();
            }

            // Property page — Required disclaimer
            if (! Schema::hasColumn('pages', 'property_disclaimer_heading')) {
                $table->text('property_disclaimer_heading')->nullable();
            }
            if (! Schema::hasColumn('pages', 'property_disclaimer_body')) {
                $table->text('property_disclaimer_body')->nullable();
            }

            // Property page — Closing CTA
            if (! Schema::hasColumn('pages', 'property_page_cta_heading')) {
                $table->text('property_page_cta_heading')->nullable();
            }
            if (! Schema::hasColumn('pages', 'property_page_cta_description')) {
                $table->text('property_page_cta_description')->nullable();
            }
            if (! Schema::hasColumn('pages', 'property_page_cta_primary_label')) {
                $table->text('property_page_cta_primary_label')->nullable();
            }
            if (! Schema::hasColumn('pages', 'property_page_cta_primary_url')) {
                $table->text('property_page_cta_primary_url')->nullable();
            }
            if (! Schema::hasColumn('pages', 'property_page_cta_secondary_label')) {
                $table->text('property_page_cta_secondary_label')->nullable();
            }
            if (! Schema::hasColumn('pages', 'property_page_cta_secondary_url')) {
                $table->text('property_page_cta_secondary_url')->nullable();
            }
        });
    }

    public function down(): void
    {
        Schema::table('pages', function (Blueprint $table) {
            $table->dropConstrainedForeignId('property_context_media_id');

            $table->dropColumn([
                'property_support_eyebrow',
                'property_support_heading',
                'property_support_body',
                'property_context_eyebrow',
                'property_context_heading',
                'property_audience_eyebrow',
                'property_audience_heading',
                'property_audience_body',
                'property_why_us_eyebrow',
                'property_why_us_heading',
                'property_why_us_body',
                'property_role_eyebrow',
                'property_role_heading',
                'property_role_body',
                'property_network_eyebrow',
                'property_network_heading',
                'property_network_body',
                'property_network_footnote',
                'property_disclaimer_heading',
                'property_disclaimer_body',
                'property_page_cta_heading',
                'property_page_cta_description',
                'property_page_cta_primary_label',
                'property_page_cta_primary_url',
                'property_page_cta_secondary_label',
                'property_page_cta_secondary_url',
            ]);
        });
    }
};
