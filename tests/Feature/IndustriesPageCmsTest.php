<?php

use App\Models\CaseStudy;
use App\Models\Insight;
use App\Models\Media;
use App\Models\Page;
use App\Models\PageIndustryCard;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

function industriesPage(array $overrides = []): Page
{
    return Page::factory()->create(array_merge(['slug' => 'industries'], $overrides));
}

test('industries page renders with fallback content when the database has no industry cards', function () {
    industriesPage();

    $response = $this->get(route('industries'));

    $response->assertOk();
    $response->assertSee('Energy & Utilities');
    $response->assertSee('Infrastructure & Civil');
    $response->assertSee('Financial Services');
    $response->assertSee('Government & Public Sector');
    $response->assertSee('Technology & Digital');
    $response->assertSee('Oil & Gas / Industrial');
    $response->assertSee('Professional Services');
    $response->assertSee('Education & Training');
    $response->assertSee('Practical experience across sectors.');
    $response->assertSee('See how our services apply');
});

test('industries page renders database-managed content when present', function () {
    $page = industriesPage();

    PageIndustryCard::factory()->create([
        'page_id' => $page->id,
        'order' => 1,
        'icon' => 'cog',
        'title' => 'Custom Industry Card',
        'description' => 'Custom industry description.',
        'visibility' => true,
    ]);

    $response = $this->get(route('industries'));

    $response->assertOk();
    $response->assertSee('Custom Industry Card');
    $response->assertSee('Custom industry description.');
});

test('industries page hides non-visible repeatable rows', function () {
    $page = industriesPage();

    PageIndustryCard::factory()->create([
        'page_id' => $page->id,
        'order' => 1,
        'title' => 'Hidden Industry Card',
        'visibility' => false,
    ]);

    $response = $this->get(route('industries'));

    $response->assertOk();
    $response->assertDontSee('Hidden Industry Card');
});

test('industries page respects the order column for repeatable rows', function () {
    $page = industriesPage();

    PageIndustryCard::factory()->create(['page_id' => $page->id, 'order' => 2, 'title' => 'Second Card', 'visibility' => true]);
    PageIndustryCard::factory()->create(['page_id' => $page->id, 'order' => 1, 'title' => 'First Card', 'visibility' => true]);

    $response = $this->get(route('industries'));

    $response->assertOk();
    $content = $response->getContent();
    expect(strpos($content, 'First Card'))->toBeLessThan(strpos($content, 'Second Card'));
});

test('admin can update industries page repeatable sections', function () {
    $admin = User::factory()->create(['role' => 'admin']);
    $page = industriesPage();

    $response = $this->actingAs($admin)->patch(route('admin.cms.pages.update', $page), [
        'title' => $page->title,
        'hero_title' => $page->hero_title,
        'hero_subtitle' => $page->hero_subtitle,
        'hero_description' => $page->hero_description,
        'primary_cta_label' => $page->primary_cta_label,
        'primary_cta_url' => $page->primary_cta_url,
        'secondary_cta_label' => $page->secondary_cta_label,
        'secondary_cta_url' => $page->secondary_cta_url,
        'industries_page_intro_heading' => 'Updated Intro Heading',
        'industries_page_intro_body' => 'Updated intro body copy.',
        'industry_cards' => [
            ['icon' => 'cog', 'title' => 'Updated Industry Card', 'slug' => 'updated-industry-card', 'description' => 'Industry description.', 'visibility' => '1'],
        ],
        'industries_page_cta_heading' => 'Updated CTA Heading',
        'sitemap_include' => '1',
        'is_published' => '1',
    ]);

    $response->assertRedirect(route('admin.cms.pages.edit', $page));
    $response->assertSessionHas('success');

    $page->refresh();

    expect($page->industries_page_intro_heading)->toBe('Updated Intro Heading');
    expect($page->industries_page_cta_heading)->toBe('Updated CTA Heading');

    expect(PageIndustryCard::where('page_id', $page->id)->where('order', 1)->first()->title)->toBe('Updated Industry Card');
});

test('a non-admin cannot update the industries page', function () {
    $user = User::factory()->create(['role' => 'investor']);
    $page = industriesPage();

    $response = $this->actingAs($user)->patch(route('admin.cms.pages.update', $page), [
        'title' => $page->title,
    ]);

    $response->assertForbidden();
});

test('industries link no longer appears as a dead about mega menu anchor', function () {
    industriesPage();
    Page::factory()->create(['slug' => 'about']);
    Page::factory()->create(['slug' => 'home']);

    $response = $this->get(route('home'));

    $response->assertOk();
    $response->assertDontSee('about#industries', false);
    $response->assertSee(route('industries'), false);
});

test('industries hero falls back to the gradient background when no hero image is set', function () {
    industriesPage();

    $response = $this->get(route('industries'));

    $response->assertOk();
    $response->assertDontSee('<img', false);
});

test('industries hero renders the background image when hero media is set', function () {
    $media = Media::factory()->create(['alt_text' => 'Sector professionals collaborating']);
    industriesPage(['hero_media_id' => $media->id]);

    $response = $this->get(route('industries'));

    $response->assertOk();
    $response->assertSee($media->url(), false);
    $response->assertSee('Sector professionals collaborating', false);
});

test('industry card renders its image and hides the icon when an image is present', function () {
    $page = industriesPage();
    $media = Media::factory()->create(['alt_text' => 'Energy sector site']);

    PageIndustryCard::factory()->create([
        'page_id' => $page->id,
        'order' => 1,
        'title' => 'Energy & Utilities',
        'icon' => 'cog',
        'image_media_id' => $media->id,
        'image_alt' => 'Energy sector site',
        'visibility' => true,
    ]);

    $response = $this->get(route('industries'));

    $response->assertOk();
    $response->assertSee($media->url(), false);
    $response->assertSee('Energy sector site', false);
});

test('industry card falls back to the icon layout when no image is uploaded', function () {
    $page = industriesPage();

    PageIndustryCard::factory()->create([
        'page_id' => $page->id,
        'order' => 1,
        'title' => 'Energy & Utilities',
        'icon' => 'cog',
        'image_media_id' => null,
        'visibility' => true,
    ]);

    $response = $this->get(route('industries'));

    $response->assertOk();
    $response->assertSee('Energy & Utilities');
    $response->assertDontSee('<img', false);
});

test('related content renders featured thumbnails for case studies and insights when present', function () {
    industriesPage();

    $caseStudyMedia = Media::factory()->create(['alt_text' => 'Case study cover']);
    $insightMedia = Media::factory()->create(['alt_text' => 'Insight cover']);

    CaseStudy::create([
        'title' => 'A Published Case Study',
        'slug' => 'a-published-case-study',
        'status' => 'published',
        'published_at' => now(),
        'featured_media_id' => $caseStudyMedia->id,
    ]);

    Insight::create([
        'title' => 'A Published Insight',
        'slug' => 'a-published-insight',
        'status' => 'published',
        'published_at' => now(),
        'featured_media_id' => $insightMedia->id,
    ]);

    $response = $this->get(route('industries'));

    $response->assertOk();
    $response->assertSee($caseStudyMedia->url(), false);
    $response->assertSee($insightMedia->url(), false);
});

test('related content gracefully omits thumbnails when case studies and insights have no featured media', function () {
    industriesPage();

    CaseStudy::create([
        'title' => 'A Published Case Study',
        'slug' => 'a-published-case-study-no-media',
        'status' => 'published',
        'published_at' => now(),
    ]);

    $response = $this->get(route('industries'));

    $response->assertOk();
    $response->assertSee('A Published Case Study');
    $response->assertDontSee('<img', false);
});

test('admin can upload and remove an industry card image', function () {
    Storage::fake('public');

    $admin = User::factory()->create(['role' => 'admin']);
    $page = industriesPage();

    $upload = $this->actingAs($admin)->patch(route('admin.cms.pages.update', $page), [
        'title' => $page->title,
        'hero_title' => $page->hero_title,
        'industry_cards' => [
            ['title' => 'Energy & Utilities', 'icon' => 'cog', 'visibility' => '1', 'image_file' => UploadedFile::fake()->image('energy.jpg'), 'image_alt' => 'Energy sector site'],
        ],
        'sitemap_include' => '1',
        'is_published' => '1',
    ]);

    $upload->assertRedirect(route('admin.cms.pages.edit', $page));

    $card = PageIndustryCard::where('page_id', $page->id)->where('order', 1)->first();
    expect($card->image_media_id)->not->toBeNull();
    expect($card->image_alt)->toBe('Energy sector site');

    $removal = $this->actingAs($admin)->patch(route('admin.cms.pages.update', $page), [
        'title' => $page->title,
        'hero_title' => $page->hero_title,
        'industry_cards' => [
            ['title' => 'Energy & Utilities', 'icon' => 'cog', 'visibility' => '1', 'remove_image' => '1'],
        ],
        'sitemap_include' => '1',
        'is_published' => '1',
    ]);

    $removal->assertRedirect(route('admin.cms.pages.edit', $page));

    expect($card->refresh()->image_media_id)->toBeNull();
});
