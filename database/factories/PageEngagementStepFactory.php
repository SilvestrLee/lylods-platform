<?php

namespace Database\Factories;

use App\Models\Page;
use App\Models\PageEngagementStep;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<PageEngagementStep>
 */
class PageEngagementStepFactory extends Factory
{
    protected $model = PageEngagementStep::class;

    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'page_id' => Page::factory(),
            'order' => 1,
            'title' => fake()->sentence(2),
            'description' => fake()->sentence(10),
            'is_dark' => false,
        ];
    }
}
