<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * All short-text columns are declared TEXT (not VARCHAR/string()) from the
     * start — Property (Phase 15.1) hit InnoDB's 65,535-byte max row size
     * after the `pages` table accumulated ~106 VARCHAR columns across every
     * prior page phase; TEXT is stored off-page under ROW_FORMAT=DYNAMIC and
     * doesn't count toward that inline limit. See ARCHITECTURE.md.
     */
    public function up(): void
    {
        Schema::table('pages', function (Blueprint $table) {
            if (! Schema::hasColumn('pages', 'community_support_eyebrow')) {
                $table->text('community_support_eyebrow')->nullable();
            }
            if (! Schema::hasColumn('pages', 'community_support_heading')) {
                $table->text('community_support_heading')->nullable();
            }
            if (! Schema::hasColumn('pages', 'community_support_body')) {
                $table->text('community_support_body')->nullable();
            }

            if (! Schema::hasColumn('pages', 'community_audience_media_id')) {
                $table->foreignId('community_audience_media_id')->nullable()->constrained('media')->nullOnDelete();
            }
            if (! Schema::hasColumn('pages', 'community_audience_eyebrow')) {
                $table->text('community_audience_eyebrow')->nullable();
            }
            if (! Schema::hasColumn('pages', 'community_audience_heading')) {
                $table->text('community_audience_heading')->nullable();
            }
            if (! Schema::hasColumn('pages', 'community_audience_body')) {
                $table->text('community_audience_body')->nullable();
            }
            if (! Schema::hasColumn('pages', 'community_audience_cta_label')) {
                $table->text('community_audience_cta_label')->nullable();
            }
            if (! Schema::hasColumn('pages', 'community_audience_cta_url')) {
                $table->text('community_audience_cta_url')->nullable();
            }

            if (! Schema::hasColumn('pages', 'community_role_media_id')) {
                $table->foreignId('community_role_media_id')->nullable()->constrained('media')->nullOnDelete();
            }
            if (! Schema::hasColumn('pages', 'community_role_eyebrow')) {
                $table->text('community_role_eyebrow')->nullable();
            }
            if (! Schema::hasColumn('pages', 'community_role_heading')) {
                $table->text('community_role_heading')->nullable();
            }
            if (! Schema::hasColumn('pages', 'community_role_body')) {
                $table->text('community_role_body')->nullable();
            }

            if (! Schema::hasColumn('pages', 'community_how_work_eyebrow')) {
                $table->text('community_how_work_eyebrow')->nullable();
            }
            if (! Schema::hasColumn('pages', 'community_how_work_heading')) {
                $table->text('community_how_work_heading')->nullable();
            }
            if (! Schema::hasColumn('pages', 'community_how_work_body')) {
                $table->text('community_how_work_body')->nullable();
            }

            if (! Schema::hasColumn('pages', 'community_engagement_eyebrow')) {
                $table->text('community_engagement_eyebrow')->nullable();
            }
            if (! Schema::hasColumn('pages', 'community_engagement_heading')) {
                $table->text('community_engagement_heading')->nullable();
            }
            if (! Schema::hasColumn('pages', 'community_engagement_body')) {
                $table->text('community_engagement_body')->nullable();
            }

            if (! Schema::hasColumn('pages', 'community_page_cta_heading')) {
                $table->text('community_page_cta_heading')->nullable();
            }
            if (! Schema::hasColumn('pages', 'community_page_cta_description')) {
                $table->text('community_page_cta_description')->nullable();
            }
            if (! Schema::hasColumn('pages', 'community_page_cta_primary_label')) {
                $table->text('community_page_cta_primary_label')->nullable();
            }
            if (! Schema::hasColumn('pages', 'community_page_cta_primary_url')) {
                $table->text('community_page_cta_primary_url')->nullable();
            }
            if (! Schema::hasColumn('pages', 'community_page_cta_secondary_label')) {
                $table->text('community_page_cta_secondary_label')->nullable();
            }
            if (! Schema::hasColumn('pages', 'community_page_cta_secondary_url')) {
                $table->text('community_page_cta_secondary_url')->nullable();
            }
        });
    }

    public function down(): void
    {
        Schema::table('pages', function (Blueprint $table) {
            $table->dropConstrainedForeignId('community_audience_media_id');
            $table->dropConstrainedForeignId('community_role_media_id');

            $table->dropColumn([
                'community_support_eyebrow',
                'community_support_heading',
                'community_support_body',
                'community_audience_eyebrow',
                'community_audience_heading',
                'community_audience_body',
                'community_audience_cta_label',
                'community_audience_cta_url',
                'community_role_eyebrow',
                'community_role_heading',
                'community_role_body',
                'community_how_work_eyebrow',
                'community_how_work_heading',
                'community_how_work_body',
                'community_engagement_eyebrow',
                'community_engagement_heading',
                'community_engagement_body',
                'community_page_cta_heading',
                'community_page_cta_description',
                'community_page_cta_primary_label',
                'community_page_cta_primary_url',
                'community_page_cta_secondary_label',
                'community_page_cta_secondary_url',
            ]);
        });
    }
};
