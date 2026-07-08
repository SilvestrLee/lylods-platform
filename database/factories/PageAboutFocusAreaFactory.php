<?php

namespace Database\Factories;

use App\Models\Page;
use App\Models\PageAboutFocusArea;
use App\Support\HeroIconRegistry;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<PageAboutFocusArea>
 */
class PageAboutFocusAreaFactory extends Factory
{
    protected $model = PageAboutFocusArea::class;

    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'page_id' => Page::factory(),
            'order' => 1,
            'icon' => fake()->randomElement(HeroIconRegistry::options()),
            'title' => fake()->words(3, true),
            'description' => fake()->sentence(10),
            'visibility' => true,
        ];
    }
}
