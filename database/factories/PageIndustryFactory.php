<?php

namespace Database\Factories;

use App\Models\Page;
use App\Models\PageIndustry;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<PageIndustry>
 */
class PageIndustryFactory extends Factory
{
    protected $model = PageIndustry::class;

    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'page_id' => Page::factory(),
            'order' => 1,
            'title' => fake()->words(3, true),
        ];
    }
}
