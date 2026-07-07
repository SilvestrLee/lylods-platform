<?php

namespace Database\Factories;

use App\Models\Page;
use App\Models\PageServiceCard;
use App\Support\HeroIconRegistry;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<PageServiceCard>
 */
class PageServiceCardFactory extends Factory
{
    protected $model = PageServiceCard::class;

    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'page_id' => Page::factory(),
            'order' => 1,
            'icon' => fake()->randomElement(HeroIconRegistry::options()),
            'title' => fake()->sentence(3),
            'description' => fake()->sentence(10),
            'href' => '/services',
            'image_media_id' => null,
            'image_alt' => fake()->words(3, true),
        ];
    }
}
