<?php

use App\Models\Page;
use App\Models\PageCareersHowItWorksStep;
use App\Models\PageCareersOpportunityCard;
use App\Models\User;

function careersPage(array $overrides = []): Page
{
    return Page::factory()->create(array_merge(['slug' => 'careers'], $overrides));
}

test('careers page renders with fallback content when the database has no rows', function () {
    careersPage();

    $response = $this->get(route('careers'));

    $response->assertOk();
    $response->assertSee('Ways to work with us.');
    $response->assertSee('Professional Placements');
    $response->assertSee('Help us understand how you can contribute.');
    $response->assertSee('Simple steps to connect.');
    $response->assertSee('Share your interest');
    $response->assertSee('Interested in working with us or joining our network?');
    $response->assertSee('Submit Your Interest');
});

test('careers page renders database-managed opportunity cards when present', function () {
    $page = careersPage();

    PageCareersOpportunityCard::factory()->create([
        'page_id' => $page->id,
        'order' => 1,
        'icon' => 'cog',
        'title' => 'Custom Opportunity Card',
        'description' => 'Custom opportunity description.',
        'visibility' => true,
    ]);

    $response = $this->get(route('careers'));

    $response->assertOk();
    $response->assertSee('Custom Opportunity Card');
    $response->assertSee('Custom opportunity description.');
});

test('careers page hides non-visible repeatable rows', function () {
    $page = careersPage();

    PageCareersOpportunityCard::factory()->create([
        'page_id' => $page->id,
        'order' => 1,
        'title' => 'Hidden Opportunity Card',
        'visibility' => false,
    ]);

    $response = $this->get(route('careers'));

    $response->assertOk();
    $response->assertDontSee('Hidden Opportunity Card');
});

test('careers page respects the order column for repeatable rows', function () {
    $page = careersPage();

    PageCareersHowItWorksStep::factory()->create(['page_id' => $page->id, 'order' => 2, 'title' => 'Second Step', 'visibility' => true]);
    PageCareersHowItWorksStep::factory()->create(['page_id' => $page->id, 'order' => 1, 'title' => 'First Step', 'visibility' => true]);

    $response = $this->get(route('careers'));

    $response->assertOk();
    $content = $response->getContent();
    expect(strpos($content, 'First Step'))->toBeLessThan(strpos($content, 'Second Step'));
});

test('admin can update careers page scalar fields and repeatable sections', function () {
    $admin = User::factory()->create(['role' => 'admin']);
    $page = careersPage();

    $response = $this->actingAs($admin)->patch(route('admin.cms.pages.update', $page), [
        'title' => $page->title,
        'hero_title' => $page->hero_title,
        'hero_subtitle' => $page->hero_subtitle,
        'hero_description' => $page->hero_description,
        'careers_opportunity_heading' => 'Updated Opportunity Heading',
        'careers_opportunity_cards' => [
            ['icon' => 'cog', 'title' => 'Updated Opportunity Card', 'description' => 'Updated opportunity description.', 'visibility' => '1'],
        ],
        'careers_how_heading' => 'Updated How Heading',
        'careers_how_it_works_steps' => [
            ['title' => 'Updated Step', 'description' => 'Updated step description.', 'visibility' => '1'],
        ],
        'careers_page_cta_heading' => 'Updated CTA Heading',
        'sitemap_include' => '1',
        'is_published' => '1',
    ]);

    $response->assertRedirect(route('admin.cms.pages.edit', $page));
    $response->assertSessionHas('success');

    $page->refresh();

    expect($page->careers_opportunity_heading)->toBe('Updated Opportunity Heading');
    expect($page->careers_how_heading)->toBe('Updated How Heading');
    expect($page->careers_page_cta_heading)->toBe('Updated CTA Heading');

    expect(PageCareersOpportunityCard::where('page_id', $page->id)->where('order', 1)->first()->title)->toBe('Updated Opportunity Card');
    expect(PageCareersHowItWorksStep::where('page_id', $page->id)->where('order', 1)->first()->title)->toBe('Updated Step');
});

test('a non-admin cannot update the careers page', function () {
    $user = User::factory()->create(['role' => 'investor']);
    $page = careersPage();

    $response = $this->actingAs($user)->patch(route('admin.cms.pages.update', $page), [
        'title' => $page->title,
    ]);

    $response->assertForbidden();
});

test('careers closing CTA always links to the contact route regardless of CMS input', function () {
    careersPage();

    $response = $this->get(route('careers'));

    $response->assertOk();
    $response->assertSee('href="' . route('contact') . '"', false);
});
