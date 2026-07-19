<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('site_settings', function (Blueprint $table) {
            $table->string('alternative_phone')->nullable()->after('phone');
            $table->string('support_email')->nullable()->after('primary_email');
            $table->string('enquiries_email')->nullable()->after('support_email');
        });
    }

    public function down(): void
    {
        Schema::table('site_settings', function (Blueprint $table) {
            $table->dropColumn(['alternative_phone', 'support_email', 'enquiries_email']);
        });
    }
};
