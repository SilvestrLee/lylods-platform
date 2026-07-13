<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('enquiries', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('enquiry_type');
            $table->string('organisation')->nullable();
            $table->text('message');
            $table->string('ip_address')->nullable();
            $table->timestamp('email_sent_at')->nullable();
            $table->timestamps();
            $table->index('enquiry_type');
            $table->index('created_at');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('enquiries');
    }
};
