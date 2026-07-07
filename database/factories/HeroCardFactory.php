<?php

namespace Database\Factories;

use App\Models\HeroCard;
use App\Models\Page;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<HeroCard>
 */
class HeroCardFactory extends Factory
{
    protected $model = HeroCard::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'page_id' => Page::factory(),
            'order' => 1,
            'badge' => fake()->words(2, true),
            'title' => fake()->sentence(3),
            'description' => fake()->sentence(10),
            'image_media_id' => null,
            'image_alt' => fake()->words(3, true),
            'cta_label' => 'Learn More',
            'cta_url' => '/services',
            'is_visible' => true,
        ];
    }
}
