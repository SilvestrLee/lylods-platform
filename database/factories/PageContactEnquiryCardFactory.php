<?php

namespace Database\Factories;

use App\Models\Page;
use App\Models\PageContactEnquiryCard;
use App\Support\HeroIconRegistry;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<PageContactEnquiryCard>
 */
class PageContactEnquiryCardFactory extends Factory
{
    protected $model = PageContactEnquiryCard::class;

    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'page_id' => Page::factory(),
            'order' => 1,
            'icon' => fake()->randomElement(HeroIconRegistry::options()),
            'title' => fake()->words(2, true),
            'description' => fake()->sentence(10),
            'visibility' => true,
        ];
    }
}
