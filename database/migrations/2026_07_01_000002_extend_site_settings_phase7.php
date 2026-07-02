<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('site_settings', function (Blueprint $table) {
            $table->string('short_name')->nullable()->after('site_name');
            $table->string('whatsapp')->nullable()->after('phone');
            $table->foreignId('logo_dark_media_id')->nullable()->constrained('media')->nullOnDelete()->after('logo_inverse_media_id');
            $table->foreignId('logo_footer_media_id')->nullable()->constrained('media')->nullOnDelete()->after('logo_dark_media_id');
            $table->foreignId('logo_email_media_id')->nullable()->constrained('media')->nullOnDelete()->after('logo_footer_media_id');
            $table->foreignId('logo_login_media_id')->nullable()->constrained('media')->nullOnDelete()->after('logo_email_media_id');
            $table->foreignId('apple_touch_media_id')->nullable()->constrained('media')->nullOnDelete()->after('favicon_media_id');
            $table->foreignId('twitter_card_media_id')->nullable()->constrained('media')->nullOnDelete()->after('default_og_media_id');
        });
    }

    public function down(): void
    {
        Schema::table('site_settings', function (Blueprint $table) {
            $table->dropForeign(['logo_dark_media_id']);
            $table->dropForeign(['logo_footer_media_id']);
            $table->dropForeign(['logo_email_media_id']);
            $table->dropForeign(['logo_login_media_id']);
            $table->dropForeign(['apple_touch_media_id']);
            $table->dropForeign(['twitter_card_media_id']);
            $table->dropColumn([
                'short_name', 'whatsapp',
                'logo_dark_media_id', 'logo_footer_media_id',
                'logo_email_media_id', 'logo_login_media_id',
                'apple_touch_media_id', 'twitter_card_media_id',
            ]);
        });
    }
};
