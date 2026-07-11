<?php

namespace Database\Factories;

use App\Models\Page;
use App\Models\PageCommunityHowWorkStep;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<PageCommunityHowWorkStep>
 */
class PageCommunityHowWorkStepFactory extends Factory
{
    protected $model = PageCommunityHowWorkStep::class;

    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'page_id' => Page::factory(),
            'order' => 1,
            'title' => fake()->words(2, true),
            'description' => fake()->sentence(12),
            'visibility' => true,
        ];
    }
}
