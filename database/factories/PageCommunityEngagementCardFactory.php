<?php

namespace Database\Factories;

use App\Models\Page;
use App\Models\PageCommunityEngagementCard;
use App\Support\HeroIconRegistry;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<PageCommunityEngagementCard>
 */
class PageCommunityEngagementCardFactory extends Factory
{
    protected $model = PageCommunityEngagementCard::class;

    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'page_id' => Page::factory(),
            'order' => 1,
            'icon' => fake()->randomElement(HeroIconRegistry::options()),
            'title' => fake()->words(3, true),
            'description' => fake()->sentence(12),
            'image_media_id' => null,
            'image_alt' => null,
            'visibility' => true,
        ];
    }
}
