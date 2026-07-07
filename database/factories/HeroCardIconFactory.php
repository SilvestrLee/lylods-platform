<?php

namespace Database\Factories;

use App\Models\HeroCard;
use App\Models\HeroCardIcon;
use App\Support\HeroIconRegistry;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<HeroCardIcon>
 */
class HeroCardIconFactory extends Factory
{
    protected $model = HeroCardIcon::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'hero_card_id' => HeroCard::factory(),
            'order' => 1,
            'icon' => fake()->randomElement(HeroIconRegistry::options()),
            'label' => fake()->words(2, true),
            'tag' => fake()->word(),
        ];
    }
}
