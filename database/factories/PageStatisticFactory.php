<?php

namespace Database\Factories;

use App\Models\Page;
use App\Models\PageStatistic;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<PageStatistic>
 */
class PageStatisticFactory extends Factory
{
    protected $model = PageStatistic::class;

    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'page_id' => Page::factory(),
            'order' => 1,
            'label' => fake()->words(2, true),
            'value' => (string) fake()->numberBetween(1, 100),
            'caption' => fake()->sentence(4),
        ];
    }
}
