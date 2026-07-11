<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pages', function (Blueprint $table) {
            if (! Schema::hasColumn('pages', 'investment_approach_media_id')) {
                $table->foreignId('investment_approach_media_id')->nullable()->constrained('media')->nullOnDelete();
            }
            if (! Schema::hasColumn('pages', 'investment_approach_eyebrow')) {
                $table->text('investment_approach_eyebrow')->nullable();
            }
            if (! Schema::hasColumn('pages', 'investment_approach_heading')) {
                $table->text('investment_approach_heading')->nullable();
            }
            if (! Schema::hasColumn('pages', 'investment_approach_body')) {
                $table->text('investment_approach_body')->nullable();
            }

            if (! Schema::hasColumn('pages', 'investment_why_eyebrow')) {
                $table->text('investment_why_eyebrow')->nullable();
            }
            if (! Schema::hasColumn('pages', 'investment_why_heading')) {
                $table->text('investment_why_heading')->nullable();
            }

            if (! Schema::hasColumn('pages', 'investment_process_eyebrow')) {
                $table->text('investment_process_eyebrow')->nullable();
            }
            if (! Schema::hasColumn('pages', 'investment_process_heading')) {
                $table->text('investment_process_heading')->nullable();
            }

            if (! Schema::hasColumn('pages', 'investment_cta_eyebrow')) {
                $table->text('investment_cta_eyebrow')->nullable();
            }
            if (! Schema::hasColumn('pages', 'investment_cta_heading')) {
                $table->text('investment_cta_heading')->nullable();
            }
            if (! Schema::hasColumn('pages', 'investment_cta_body')) {
                $table->text('investment_cta_body')->nullable();
            }
            if (! Schema::hasColumn('pages', 'investment_cta_primary_label')) {
                $table->text('investment_cta_primary_label')->nullable();
            }
            if (! Schema::hasColumn('pages', 'investment_cta_secondary_label')) {
                $table->text('investment_cta_secondary_label')->nullable();
            }
            if (! Schema::hasColumn('pages', 'investment_cta_secondary_url')) {
                $table->text('investment_cta_secondary_url')->nullable();
            }
        });
    }

    public function down(): void
    {
        Schema::table('pages', function (Blueprint $table) {
            $table->dropConstrainedForeignId('investment_approach_media_id');

            $table->dropColumn([
                'investment_approach_eyebrow',
                'investment_approach_heading',
                'investment_approach_body',
                'investment_why_eyebrow',
                'investment_why_heading',
                'investment_process_eyebrow',
                'investment_process_heading',
                'investment_cta_eyebrow',
                'investment_cta_heading',
                'investment_cta_body',
                'investment_cta_primary_label',
                'investment_cta_secondary_label',
                'investment_cta_secondary_url',
            ]);
        });
    }
};
