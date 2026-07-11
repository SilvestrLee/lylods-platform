<?php

namespace Database\Factories;

use App\Models\Page;
use App\Models\PageCommunityAudienceTag;
use App\Support\HeroIconRegistry;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<PageCommunityAudienceTag>
 */
class PageCommunityAudienceTagFactory extends Factory
{
    protected $model = PageCommunityAudienceTag::class;

    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'page_id' => Page::factory(),
            'order' => 1,
            'icon' => fake()->randomElement(HeroIconRegistry::options()),
            'label' => fake()->words(2, true),
            'visibility' => true,
        ];
    }
}
