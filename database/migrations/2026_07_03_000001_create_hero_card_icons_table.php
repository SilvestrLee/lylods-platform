<?php

use App\Support\HeroIconRegistry;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('hero_card_icons', function (Blueprint $table) {
            $table->id();
            $table->foreignId('hero_card_id')->constrained('hero_cards')->cascadeOnDelete();
            $table->unsignedTinyInteger('order')->default(0);
            $table->string('icon');
            $table->string('label');
            $table->string('tag')->nullable();
            $table->timestamps();

            $table->unique(['hero_card_id', 'order']);
        });

        $this->migrateExistingRows();

        Schema::table('hero_cards', function (Blueprint $table) {
            $table->dropColumn('rows');
        });
    }

    public function down(): void
    {
        Schema::table('hero_cards', function (Blueprint $table) {
            $table->json('rows')->nullable();
        });

        Schema::dropIfExists('hero_card_icons');
    }

    /**
     * Carries forward any raw-SVG rows already stored on hero_cards.rows
     * into the new relational hero_card_icons table before the column is
     * dropped, mapping each stored SVG path back to a known icon identifier.
     */
    private function migrateExistingRows(): void
    {
        if (! Schema::hasColumn('hero_cards', 'rows')) {
            return;
        }

        $pathToIdentifier = array_flip(HeroIconRegistry::all());
        $now = now();

        DB::table('hero_cards')->whereNotNull('rows')->get(['id', 'rows'])->each(function ($card) use ($pathToIdentifier, $now) {
            $rows = json_decode($card->rows, true) ?: [];

            foreach (array_values($rows) as $index => $row) {
                DB::table('hero_card_icons')->insert([
                    'hero_card_id' => $card->id,
                    'order' => $index + 1,
                    'icon' => $pathToIdentifier[$row['icon'] ?? ''] ?? 'check-circle',
                    'label' => $row['label'] ?? '',
                    'tag' => $row['tag'] ?? null,
                    'created_at' => $now,
                    'updated_at' => $now,
                ]);
            }
        });
    }
};
