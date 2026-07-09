<?php

namespace Database\Factories;

use App\Models\Page;
use App\Models\PageIndustryCard;
use App\Support\HeroIconRegistry;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<PageIndustryCard>
 */
class PageIndustryCardFactory extends Factory
{
    protected $model = PageIndustryCard::class;

    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->words(2, true);

        return [
            'page_id' => Page::factory(),
            'order' => 1,
            'title' => $title,
            'slug' => Str::slug($title),
            'description' => fake()->sentence(12),
            'icon' => fake()->randomElement(HeroIconRegistry::options()),
            'visibility' => true,
        ];
    }
}
