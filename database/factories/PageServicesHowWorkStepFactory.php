<?php

namespace Database\Factories;

use App\Models\Page;
use App\Models\PageServicesHowWorkStep;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<PageServicesHowWorkStep>
 */
class PageServicesHowWorkStepFactory extends Factory
{
    protected $model = PageServicesHowWorkStep::class;

    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'page_id' => Page::factory(),
            'order' => 1,
            'title' => fake()->words(2, true),
            'description' => fake()->sentence(10),
            'visibility' => true,
        ];
    }
}
