<?php

namespace Database\Factories;

use App\Models\Page;
use App\Models\PageInvestmentCredibilityCard;
use App\Support\HeroIconRegistry;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<PageInvestmentCredibilityCard>
 */
class PageInvestmentCredibilityCardFactory extends Factory
{
    protected $model = PageInvestmentCredibilityCard::class;

    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'page_id' => Page::factory(),
            'order' => 1,
            'icon' => fake()->randomElement(HeroIconRegistry::options()),
            'title' => fake()->words(2, true),
            'description' => fake()->sentence(10),
            'visibility' => true,
        ];
    }
}
