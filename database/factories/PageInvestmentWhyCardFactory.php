<?php

namespace Database\Factories;

use App\Models\Page;
use App\Models\PageInvestmentWhyCard;
use App\Support\HeroIconRegistry;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<PageInvestmentWhyCard>
 */
class PageInvestmentWhyCardFactory extends Factory
{
    protected $model = PageInvestmentWhyCard::class;

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
            'description' => fake()->sentence(12),
            'visibility' => true,
        ];
    }
}
