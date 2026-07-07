<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pages', function (Blueprint $table) {
            // Discipline identity strip
            $table->string('discipline_eyebrow')->nullable()->after('secondary_cta_url');
            $table->json('discipline_items')->nullable()->after('discipline_eyebrow');

            // Services section intro
            $table->string('services_eyebrow')->nullable()->after('discipline_items');
            $table->string('services_heading')->nullable()->after('services_eyebrow');
            $table->string('services_heading_break')->nullable()->after('services_heading');
            $table->string('services_cta_label')->nullable()->after('services_heading_break');
            $table->string('services_cta_url')->nullable()->after('services_cta_label');

            // Industries section intro
            $table->string('industries_eyebrow')->nullable()->after('services_cta_url');
            $table->string('industries_heading')->nullable()->after('industries_eyebrow');
            $table->string('industries_cta_label')->nullable()->after('industries_heading');
            $table->string('industries_cta_url')->nullable()->after('industries_cta_label');

            // Why choose us section intro
            $table->string('why_choose_us_eyebrow')->nullable()->after('industries_cta_url');
            $table->string('why_choose_us_heading')->nullable()->after('why_choose_us_eyebrow');
            $table->text('why_choose_us_description')->nullable()->after('why_choose_us_heading');
            $table->string('why_choose_us_cta_label')->nullable()->after('why_choose_us_description');
            $table->string('why_choose_us_cta_url')->nullable()->after('why_choose_us_cta_label');

            // Engagement process (How We Engage) section intro
            $table->string('engagement_eyebrow')->nullable()->after('why_choose_us_cta_url');
            $table->string('engagement_heading')->nullable()->after('engagement_eyebrow');
            $table->text('engagement_description')->nullable()->after('engagement_heading');

            // About & Values
            $table->string('about_eyebrow')->nullable()->after('engagement_description');
            $table->string('about_heading')->nullable()->after('about_eyebrow');
            $table->text('about_description')->nullable()->after('about_heading');
            $table->foreignId('about_media_id')->nullable()->after('about_description')->constrained('media')->nullOnDelete();
            $table->string('about_media_alt')->nullable()->after('about_media_id');
            $table->string('about_cta_label')->nullable()->after('about_media_alt');
            $table->string('about_cta_url')->nullable()->after('about_cta_label');

            // Work With Us CTA
            $table->string('wwu_eyebrow')->nullable()->after('about_cta_url');
            $table->string('wwu_heading')->nullable()->after('wwu_eyebrow');
            $table->text('wwu_description')->nullable()->after('wwu_heading');
            $table->string('wwu_primary_cta_label')->nullable()->after('wwu_description');
            $table->string('wwu_primary_cta_url')->nullable()->after('wwu_primary_cta_label');
            $table->string('wwu_secondary_cta_label')->nullable()->after('wwu_primary_cta_url');
            $table->string('wwu_secondary_cta_url')->nullable()->after('wwu_secondary_cta_label');
            $table->string('wwu_investor_note')->nullable()->after('wwu_secondary_cta_url');
            $table->string('wwu_investor_cta_label')->nullable()->after('wwu_investor_note');
            $table->string('wwu_investor_cta_url')->nullable()->after('wwu_investor_cta_label');
        });
    }

    public function down(): void
    {
        Schema::table('pages', function (Blueprint $table) {
            $table->dropConstrainedForeignId('about_media_id');

            $table->dropColumn([
                'discipline_eyebrow',
                'discipline_items',
                'services_eyebrow',
                'services_heading',
                'services_heading_break',
                'services_cta_label',
                'services_cta_url',
                'industries_eyebrow',
                'industries_heading',
                'industries_cta_label',
                'industries_cta_url',
                'why_choose_us_eyebrow',
                'why_choose_us_heading',
                'why_choose_us_description',
                'why_choose_us_cta_label',
                'why_choose_us_cta_url',
                'engagement_eyebrow',
                'engagement_heading',
                'engagement_description',
                'about_eyebrow',
                'about_heading',
                'about_description',
                'about_media_alt',
                'about_cta_label',
                'about_cta_url',
                'wwu_eyebrow',
                'wwu_heading',
                'wwu_description',
                'wwu_primary_cta_label',
                'wwu_primary_cta_url',
                'wwu_secondary_cta_label',
                'wwu_secondary_cta_url',
                'wwu_investor_note',
                'wwu_investor_cta_label',
                'wwu_investor_cta_url',
            ]);
        });
    }
};
