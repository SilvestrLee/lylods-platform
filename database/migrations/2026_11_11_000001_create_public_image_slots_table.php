<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use App\Support\PublicImageSlots;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('public_image_slots', function (Blueprint $table) {
            $table->id();
            $table->string('key', 120)->unique();
            $table->string('label');
            $table->string('pool', 20);
            $table->foreignId('media_id')->nullable()->constrained('media')->nullOnDelete();
            $table->timestamps();
        });

        foreach (PublicImageSlots::definitions() as $key => $definition) {
            DB::table('public_image_slots')->insert([
                'key' => $key,
                'label' => $definition['label'],
                'pool' => $definition['pool'],
                'media_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('public_image_slots');
    }
};
