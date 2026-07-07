<?php

namespace Database\Factories;

use App\Models\Page;
use App\Models\PageWhyChooseUsCard;
use App\Support\HeroIconRegistry;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<PageWhyChooseUsCard>
 */
class PageWhyChooseUsCardFactory extends Factory
{
    protected $model = PageWhyChooseUsCard::class;

    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'page_id' => Page::factory(),
            'order' => 1,
            'icon' => fake()->randomElement(HeroIconRegistry::options()),
            'title' => fake()->sentence(3),
            'description' => fake()->sentence(10),
            'is_dark' => false,
        ];
    }
}
