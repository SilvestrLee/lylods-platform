<?php

use App\Models\Page;
use App\Models\PageServicesHowWorkStep;
use App\Models\PageServicesWhyUsCard;
use App\Models\Service;
use App\Models\ServiceGroup;
use App\Models\User;

function servicesPage(array $overrides = []): Page
{
    return Page::factory()->create(array_merge(['slug' => 'services'], $overrides));
}

test('services page renders with fallback content when the database has no services sections', function () {
    servicesPage();

    $response = $this->get(route('services'));

    $response->assertOk();
    $response->assertSee('Service Catalogue');
    $response->assertSee('Practical Delivery');
    $response->assertSee('Understand your need');
    $response->assertSee('Not sure where to start?');
});

test('services page keeps the intro and catalogue in a single service-areas section', function () {
    servicesPage();

    $response = $this->get(route('services'));

    $response->assertOk();
    $content = $response->getContent();

    // The original page nested the intro copy and the service area panels
    // inside one shared <section id="service-areas">. Regression guard: the
    // componentized version must not split this into two public sections.
    expect(substr_count($content, 'id="service-areas"'))->toBe(1);
});

test('services page renders database-managed content when present', function () {
    $page = servicesPage();

    PageServicesHowWorkStep::factory()->create([
        'page_id' => $page->id,
        'order' => 1,
        'title' => 'Custom Step Title',
        'description' => 'Custom step description.',
        'visibility' => true,
    ]);

    PageServicesWhyUsCard::factory()->create([
        'page_id' => $page->id,
        'order' => 1,
        'icon' => 'cog',
        'title' => 'Custom Why Us Card',
        'description' => 'Custom why us description.',
        'visibility' => true,
    ]);

    $response = $this->get(route('services'));

    $response->assertOk();
    $response->assertSee('Custom Step Title');
    $response->assertSee('Custom Why Us Card');
});

test('services page hides non-visible repeatable rows', function () {
    $page = servicesPage();

    PageServicesWhyUsCard::factory()->create([
        'page_id' => $page->id,
        'order' => 1,
        'title' => 'Hidden Why Us Card',
        'visibility' => false,
    ]);

    $response = $this->get(route('services'));

    $response->assertOk();
    $response->assertDontSee('Hidden Why Us Card');
});

test('services page respects the order column for repeatable rows', function () {
    $page = servicesPage();

    PageServicesHowWorkStep::factory()->create(['page_id' => $page->id, 'order' => 2, 'title' => 'Second Step', 'visibility' => true]);
    PageServicesHowWorkStep::factory()->create(['page_id' => $page->id, 'order' => 1, 'title' => 'First Step', 'visibility' => true]);

    $response = $this->get(route('services'));

    $response->assertOk();
    $content = $response->getContent();
    expect(strpos($content, 'First Step'))->toBeLessThan(strpos($content, 'Second Step'));
});

test('services page still renders the existing service catalogue unaffected', function () {
    servicesPage();

    $group = ServiceGroup::create([
        'name' => 'Business & Technology',
        'slug' => 'business-technology',
        'description' => 'Practical support for growth.',
        'display_order' => 1,
        'is_active' => true,
    ]);

    Service::create([
        'service_group_id' => $group->id,
        'title' => 'Digital Transformation Advisory',
        'slug' => 'digital-transformation-advisory',
        'display_order' => 1,
        'is_active' => true,
    ]);

    $response = $this->get(route('services'));

    $response->assertOk();
    $response->assertSee('Business & Technology');
    $response->assertSee('Digital Transformation Advisory');
});

test('admin can update services page repeatable sections', function () {
    $admin = User::factory()->create(['role' => 'admin']);
    $page = servicesPage();

    $response = $this->actingAs($admin)->patch(route('admin.cms.pages.update', $page), [
        'title' => $page->title,
        'hero_title' => $page->hero_title,
        'hero_subtitle' => $page->hero_subtitle,
        'hero_description' => $page->hero_description,
        'primary_cta_label' => $page->primary_cta_label,
        'primary_cta_url' => $page->primary_cta_url,
        'secondary_cta_label' => $page->secondary_cta_label,
        'secondary_cta_url' => $page->secondary_cta_url,
        'services_page_intro_heading' => 'Updated Intro Heading',
        'services_page_intro_body' => 'Updated intro body copy.',
        'services_why_us' => [
            ['icon' => 'cog', 'title' => 'Updated Why Us Card', 'description' => 'Why us description.', 'visibility' => '1'],
        ],
        'services_how_work_steps' => [
            ['title' => 'Discover', 'description' => 'Discover step.', 'visibility' => '1'],
        ],
        'services_page_cta_heading' => 'Updated CTA Heading',
        'sitemap_include' => '1',
        'is_published' => '1',
    ]);

    $response->assertRedirect(route('admin.cms.pages.edit', $page));
    $response->assertSessionHas('success');

    $page->refresh();

    expect($page->services_page_intro_heading)->toBe('Updated Intro Heading');
    expect($page->services_page_cta_heading)->toBe('Updated CTA Heading');

    expect(PageServicesWhyUsCard::where('page_id', $page->id)->where('order', 1)->first()->title)->toBe('Updated Why Us Card');
    expect(PageServicesHowWorkStep::where('page_id', $page->id)->where('order', 1)->first()->title)->toBe('Discover');
});

test('a non-admin cannot update the services page', function () {
    $user = User::factory()->create(['role' => 'investor']);
    $page = servicesPage();

    $response = $this->actingAs($user)->patch(route('admin.cms.pages.update', $page), [
        'title' => $page->title,
    ]);

    $response->assertForbidden();
});
