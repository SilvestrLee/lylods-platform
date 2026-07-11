<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pages', function (Blueprint $table) {
            if (! Schema::hasColumn('pages', 'careers_opportunity_eyebrow')) {
                $table->text('careers_opportunity_eyebrow')->nullable();
            }
            if (! Schema::hasColumn('pages', 'careers_opportunity_heading')) {
                $table->text('careers_opportunity_heading')->nullable();
            }
            if (! Schema::hasColumn('pages', 'careers_opportunity_body')) {
                $table->text('careers_opportunity_body')->nullable();
            }

            if (! Schema::hasColumn('pages', 'careers_message_eyebrow')) {
                $table->text('careers_message_eyebrow')->nullable();
            }
            if (! Schema::hasColumn('pages', 'careers_message_heading')) {
                $table->text('careers_message_heading')->nullable();
            }
            if (! Schema::hasColumn('pages', 'careers_message_body')) {
                $table->text('careers_message_body')->nullable();
            }
            if (! Schema::hasColumn('pages', 'careers_notice_body')) {
                $table->text('careers_notice_body')->nullable();
            }

            if (! Schema::hasColumn('pages', 'careers_how_eyebrow')) {
                $table->text('careers_how_eyebrow')->nullable();
            }
            if (! Schema::hasColumn('pages', 'careers_how_heading')) {
                $table->text('careers_how_heading')->nullable();
            }

            if (! Schema::hasColumn('pages', 'careers_page_cta_eyebrow')) {
                $table->text('careers_page_cta_eyebrow')->nullable();
            }
            if (! Schema::hasColumn('pages', 'careers_page_cta_heading')) {
                $table->text('careers_page_cta_heading')->nullable();
            }
            if (! Schema::hasColumn('pages', 'careers_page_cta_body')) {
                $table->text('careers_page_cta_body')->nullable();
            }
            if (! Schema::hasColumn('pages', 'careers_page_cta_label')) {
                $table->text('careers_page_cta_label')->nullable();
            }
        });
    }

    public function down(): void
    {
        Schema::table('pages', function (Blueprint $table) {
            $table->dropColumn([
                'careers_opportunity_eyebrow',
                'careers_opportunity_heading',
                'careers_opportunity_body',
                'careers_message_eyebrow',
                'careers_message_heading',
                'careers_message_body',
                'careers_notice_body',
                'careers_how_eyebrow',
                'careers_how_heading',
                'careers_page_cta_eyebrow',
                'careers_page_cta_heading',
                'careers_page_cta_body',
                'careers_page_cta_label',
            ]);
        });
    }
};
