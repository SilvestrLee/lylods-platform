<?php

namespace Database\Factories;

use App\Models\Page;
use App\Models\PagePropertyNetworkTag;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<PagePropertyNetworkTag>
 */
class PagePropertyNetworkTagFactory extends Factory
{
    protected $model = PagePropertyNetworkTag::class;

    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'page_id' => Page::factory(),
            'order' => 1,
            'label' => fake()->word(),
            'visibility' => true,
        ];
    }
}
