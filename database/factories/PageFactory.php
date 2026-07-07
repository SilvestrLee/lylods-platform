<?php

namespace Database\Factories;

use App\Models\Page;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Page>
 */
class PageFactory extends Factory
{
    protected $model = Page::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->unique()->words(2, true);

        return [
            'slug' => fake()->unique()->slug(2),
            'title' => ucfirst($title),
            'hero_title' => fake()->sentence(6),
            'hero_subtitle' => fake()->words(3, true),
            'hero_description' => fake()->paragraph(),
            'hero_media_id' => null,
            'primary_cta_label' => 'Discuss Your Project',
            'primary_cta_url' => '/contact',
            'secondary_cta_label' => 'Explore Our Services',
            'secondary_cta_url' => '/services',
            'section_visibility' => [
                'hero' => true,
                'why_choose_us' => true,
                'services' => true,
                'testimonials' => true,
                'partners' => true,
                'cta' => true,
            ],
            'meta_title' => ucfirst($title),
            'meta_description' => fake()->sentence(12),
            'og_media_id' => null,
            'canonical_url' => null,
            'robots' => null,
            'structured_data' => null,
            'sitemap_include' => true,
            'is_published' => true,
            'created_by' => null,
            'updated_by' => null,
        ];
    }
}
