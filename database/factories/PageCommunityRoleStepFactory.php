<?php

namespace Database\Factories;

use App\Models\Page;
use App\Models\PageCommunityRoleStep;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<PageCommunityRoleStep>
 */
class PageCommunityRoleStepFactory extends Factory
{
    protected $model = PageCommunityRoleStep::class;

    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'page_id' => Page::factory(),
            'order' => 1,
            'description' => fake()->sentence(12),
            'visibility' => true,
        ];
    }
}
