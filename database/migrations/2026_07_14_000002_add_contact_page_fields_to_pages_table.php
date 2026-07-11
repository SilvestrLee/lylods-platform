<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pages', function (Blueprint $table) {
            if (! Schema::hasColumn('pages', 'contact_info_eyebrow')) {
                $table->text('contact_info_eyebrow')->nullable();
            }
            if (! Schema::hasColumn('pages', 'contact_info_heading')) {
                $table->text('contact_info_heading')->nullable();
            }
            if (! Schema::hasColumn('pages', 'contact_info_body')) {
                $table->text('contact_info_body')->nullable();
            }

            if (! Schema::hasColumn('pages', 'contact_general_label')) {
                $table->text('contact_general_label')->nullable();
            }
            if (! Schema::hasColumn('pages', 'contact_general_description')) {
                $table->text('contact_general_description')->nullable();
            }

            if (! Schema::hasColumn('pages', 'contact_office_label')) {
                $table->text('contact_office_label')->nullable();
            }
            if (! Schema::hasColumn('pages', 'contact_office_description')) {
                $table->text('contact_office_description')->nullable();
            }

            if (! Schema::hasColumn('pages', 'contact_hours_label')) {
                $table->text('contact_hours_label')->nullable();
            }

            if (! Schema::hasColumn('pages', 'contact_info_media_id')) {
                $table->foreignId('contact_info_media_id')->nullable()->constrained('media')->nullOnDelete();
            }
            if (! Schema::hasColumn('pages', 'contact_info_media_alt')) {
                $table->text('contact_info_media_alt')->nullable();
            }

            if (! Schema::hasColumn('pages', 'contact_investor_eyebrow')) {
                $table->text('contact_investor_eyebrow')->nullable();
            }
            if (! Schema::hasColumn('pages', 'contact_investor_heading')) {
                $table->text('contact_investor_heading')->nullable();
            }
            if (! Schema::hasColumn('pages', 'contact_investor_body')) {
                $table->text('contact_investor_body')->nullable();
            }
            if (! Schema::hasColumn('pages', 'contact_investor_cta_label')) {
                $table->text('contact_investor_cta_label')->nullable();
            }

            if (! Schema::hasColumn('pages', 'contact_enquiry_eyebrow')) {
                $table->text('contact_enquiry_eyebrow')->nullable();
            }
            if (! Schema::hasColumn('pages', 'contact_enquiry_heading')) {
                $table->text('contact_enquiry_heading')->nullable();
            }
        });
    }

    public function down(): void
    {
        Schema::table('pages', function (Blueprint $table) {
            $table->dropConstrainedForeignId('contact_info_media_id');

            $table->dropColumn([
                'contact_info_eyebrow',
                'contact_info_heading',
                'contact_info_body',
                'contact_general_label',
                'contact_general_description',
                'contact_office_label',
                'contact_office_description',
                'contact_hours_label',
                'contact_info_media_alt',
                'contact_investor_eyebrow',
                'contact_investor_heading',
                'contact_investor_body',
                'contact_investor_cta_label',
                'contact_enquiry_eyebrow',
                'contact_enquiry_heading',
            ]);
        });
    }
};
