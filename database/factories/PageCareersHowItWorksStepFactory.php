<?php

namespace Database\Factories;

use App\Models\Page;
use App\Models\PageCareersHowItWorksStep;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<PageCareersHowItWorksStep>
 */
class PageCareersHowItWorksStepFactory extends Factory
{
    protected $model = PageCareersHowItWorksStep::class;

    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'page_id' => Page::factory(),
            'order' => 1,
            'title' => fake()->words(3, true),
            'description' => fake()->sentence(10),
            'visibility' => true,
        ];
    }
}
