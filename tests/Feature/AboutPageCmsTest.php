<?php

use App\Models\Media;
use App\Models\Organisation;
use App\Models\Page;
use App\Models\PageAboutAudienceTag;
use App\Models\PageAboutDifferentiator;
use App\Models\PageAboutFocusArea;
use App\Models\PageAboutHowWeWorkStep;
use App\Models\PageAboutPrinciple;
use App\Models\TeamMember;
use App\Models\User;

function aboutPage(array $overrides = []): Page
{
    return Page::factory()->create(array_merge(['slug' => 'about'], $overrides));
}

test('about page renders with fallback content when the database has no about sections', function () {
    aboutPage();

    $response = $this->get(route('about'));

    $response->assertOk();
    $response->assertSee('Who We Are');
    $response->assertSee('Practicality');
    $response->assertSee('Public Sector Partners');
    $response->assertSee('Why Clients Choose Us');
    $response->assertSee("Let's Build Something Meaningful Together");
});

test('about page renders database-managed content when present', function () {
    $page = aboutPage();

    PageAboutHowWeWorkStep::factory()->create([
        'page_id' => $page->id,
        'order' => 1,
        'title' => 'Custom Step Title',
        'description' => 'Custom step description.',
        'visibility' => true,
    ]);

    $response = $this->get(route('about'));

    $response->assertOk();
    $response->assertSee('Custom Step Title');
});

test('about page hides non-visible repeatable rows', function () {
    $page = aboutPage();

    PageAboutFocusArea::factory()->create([
        'page_id' => $page->id,
        'order' => 1,
        'title' => 'Hidden Focus Area',
        'visibility' => false,
    ]);

    $response = $this->get(route('about'));

    $response->assertOk();
    $response->assertDontSee('Hidden Focus Area');
});

test('about page respects the order column for repeatable rows', function () {
    $page = aboutPage();

    PageAboutPrinciple::factory()->create(['page_id' => $page->id, 'order' => 2, 'title' => 'Second Principle', 'visibility' => true]);
    PageAboutPrinciple::factory()->create(['page_id' => $page->id, 'order' => 1, 'title' => 'First Principle', 'visibility' => true]);

    $response = $this->get(route('about'));

    $response->assertOk();
    $content = $response->getContent();
    expect(strpos($content, 'First Principle'))->toBeLessThan(strpos($content, 'Second Principle'));
});

test('about page still renders existing team members and accreditations unaffected', function () {
    aboutPage();

    $member = TeamMember::create([
        'name' => 'Jane Doe',
        'role' => 'Principal Consultant',
        'is_active' => true,
        'display_order' => 1,
    ]);

    $organisation = Organisation::create([
        'name' => 'Chartered Institute Example',
        'type' => 'accreditation',
        'is_active' => true,
        'display_order' => 1,
    ]);

    $response = $this->get(route('about'));

    $response->assertOk();
    $response->assertSee($member->name);
    $response->assertSee($organisation->name);
});

test('admin can update about page repeatable sections and media binding', function () {
    $admin = User::factory()->create(['role' => 'admin']);
    $page = aboutPage();
    $media = Media::factory()->create();

    $response = $this->actingAs($admin)->patch(route('admin.cms.pages.update', $page), [
        'title' => $page->title,
        'hero_title' => $page->hero_title,
        'hero_subtitle' => $page->hero_subtitle,
        'hero_description' => $page->hero_description,
        'primary_cta_label' => $page->primary_cta_label,
        'primary_cta_url' => $page->primary_cta_url,
        'secondary_cta_label' => $page->secondary_cta_label,
        'secondary_cta_url' => $page->secondary_cta_url,
        'about_page_intro_heading' => 'Updated Intro Heading',
        'about_page_intro_body' => 'Updated intro body copy.',
        'how_we_work_steps' => [
            ['title' => 'Discover', 'description' => 'Discover step.', 'visibility' => '1'],
        ],
        'focus_areas' => [
            ['icon' => 'cog', 'title' => 'Updated Focus Area', 'description' => 'Focus description.', 'visibility' => '1'],
        ],
        'principles' => [
            ['icon' => 'star', 'title' => 'Updated Principle', 'description' => 'Principle description.', 'visibility' => '1'],
        ],
        'audience_tags' => [
            ['label' => 'Updated Audience', 'visibility' => '1'],
        ],
        'differentiators' => [
            ['icon' => 'user', 'title' => 'Updated Differentiator', 'description' => 'Differentiator description.', 'visibility' => '1'],
        ],
        'about_page_cta_heading' => 'Updated CTA Heading',
        'sitemap_include' => '1',
        'is_published' => '1',
    ]);

    $response->assertRedirect(route('admin.cms.pages.edit', $page));
    $response->assertSessionHas('success');

    $page->refresh();

    expect($page->about_page_intro_heading)->toBe('Updated Intro Heading');
    expect($page->about_page_cta_heading)->toBe('Updated CTA Heading');

    expect(PageAboutHowWeWorkStep::where('page_id', $page->id)->where('order', 1)->first()->title)->toBe('Discover');
    expect(PageAboutFocusArea::where('page_id', $page->id)->where('order', 1)->first()->title)->toBe('Updated Focus Area');
    expect(PageAboutPrinciple::where('page_id', $page->id)->where('order', 1)->first()->title)->toBe('Updated Principle');
    expect(PageAboutAudienceTag::where('page_id', $page->id)->where('order', 1)->first()->label)->toBe('Updated Audience');
    expect(PageAboutDifferentiator::where('page_id', $page->id)->where('order', 1)->first()->title)->toBe('Updated Differentiator');
});

test('a non-admin cannot update the about page', function () {
    $user = User::factory()->create(['role' => 'investor']);
    $page = aboutPage();

    $response = $this->actingAs($user)->patch(route('admin.cms.pages.update', $page), [
        'title' => $page->title,
    ]);

    $response->assertForbidden();
});
