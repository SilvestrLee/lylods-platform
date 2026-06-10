<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('investments', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('investment_plan_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            $table->decimal('amount', 15, 2);
            $table->decimal('expected_return', 15, 2)->nullable();

            $table->string('status')->default('pending');
            $table->date('start_date')->nullable();
            $table->date('maturity_date')->nullable();

            $table->text('notes')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('investments');
    }
};