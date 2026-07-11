<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * The pages table's remaining legacy VARCHAR(255) columns from
     * Homepage/About/Services/Industries/Property (63 total, ~64.4KB of
     * InnoDB's 65,535-byte row-size budget on their own) finally exhausted
     * the row-size budget outright when Careers tried to add its own new
     * TEXT columns — there was no headroom left for ANY new column,
     * regardless of type. Converting these to TEXT (same fix already
     * applied to Property/Community/Investment/Contact's own new columns)
     * frees the budget without any behavioral change: Eloquent/Blade treat
     * both as plain PHP strings, and no application-level max:255
     * validation is affected.
     *
     * Deliberately NOT touched: `slug` (unique-indexed, core identity),
     * `title`, `meta_title`, `canonical_url`, `robots` — pre-page-phase
     * base columns, not worth the marginal byte savings for the added
     * (if small) risk of touching indexed/core columns.
     */
    private const COLUMNS = [
        'about_cta_label', 'about_cta_url', 'about_eyebrow', 'about_heading', 'about_media_alt',
        'about_page_cta_heading', 'about_page_cta_primary_label', 'about_page_cta_primary_url',
        'about_page_cta_secondary_label', 'about_page_cta_secondary_url',
        'about_page_intro_cta_label', 'about_page_intro_cta_url', 'about_page_intro_heading',
        'discipline_eyebrow', 'engagement_eyebrow', 'engagement_heading',
        'hero_subtitle', 'hero_title',
        'industries_cta_label', 'industries_cta_url', 'industries_eyebrow', 'industries_heading',
        'industries_page_cta_heading', 'industries_page_cta_primary_label', 'industries_page_cta_primary_url',
        'industries_page_cta_secondary_label', 'industries_page_cta_secondary_url', 'industries_page_intro_heading',
        'primary_cta_label', 'primary_cta_url', 'secondary_cta_label', 'secondary_cta_url',
        'property_support_eyebrow', 'property_support_heading',
        'services_cta_label', 'services_cta_url', 'services_eyebrow', 'services_heading', 'services_heading_break',
        'services_page_cta_heading', 'services_page_cta_primary_label', 'services_page_cta_primary_url',
        'services_page_cta_secondary_label', 'services_page_cta_secondary_url', 'services_page_intro_heading',
        'why_choose_us_cta_label', 'why_choose_us_cta_url', 'why_choose_us_eyebrow', 'why_choose_us_heading',
        'wwu_eyebrow', 'wwu_heading', 'wwu_investor_cta_label', 'wwu_investor_cta_url', 'wwu_investor_note',
        'wwu_primary_cta_label', 'wwu_primary_cta_url', 'wwu_secondary_cta_label', 'wwu_secondary_cta_url',
    ];

    /**
     * MySQL-specific: InnoDB's 65,535-byte max row size is what this fixes.
     * SQLite (used by the test suite) has no such limit and doesn't
     * understand MODIFY syntax, so this is a genuine no-op there — nothing
     * to fix on a driver that was never at risk.
     */
    public function up(): void
    {
        if (DB::getDriverName() !== 'mysql') {
            return;
        }

        foreach (self::COLUMNS as $column) {
            if (Schema::hasColumn('pages', $column)) {
                DB::statement("ALTER TABLE `pages` MODIFY `{$column}` TEXT NULL");
            }
        }
    }

    public function down(): void
    {
        if (DB::getDriverName() !== 'mysql') {
            return;
        }

        foreach (self::COLUMNS as $column) {
            if (Schema::hasColumn('pages', $column)) {
                DB::statement("ALTER TABLE `pages` MODIFY `{$column}` VARCHAR(255) NULL");
            }
        }
    }
};
