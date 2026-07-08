<?php

namespace Database\Factories;

use App\Models\Page;
use App\Models\PageAboutPrinciple;
use App\Support\HeroIconRegistry;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<PageAboutPrinciple>
 */
class PageAboutPrincipleFactory extends Factory
{
    protected $model = PageAboutPrinciple::class;

    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'page_id' => Page::factory(),
            'order' => 1,
            'icon' => fake()->randomElement(HeroIconRegistry::options()),
            'title' => fake()->word(),
            'description' => fake()->sentence(8),
            'visibility' => true,
        ];
    }
}
