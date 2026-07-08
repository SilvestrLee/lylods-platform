<?php

namespace Database\Factories;

use App\Models\Page;
use App\Models\PageAboutAudienceTag;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<PageAboutAudienceTag>
 */
class PageAboutAudienceTagFactory extends Factory
{
    protected $model = PageAboutAudienceTag::class;

    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'page_id' => Page::factory(),
            'order' => 1,
            'label' => fake()->words(2, true),
            'visibility' => true,
        ];
    }
}
