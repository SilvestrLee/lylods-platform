<?php

use App\Models\Media;
use App\Models\Page;
use App\Models\PagePropertyAudienceCard;
use App\Models\PagePropertyNetworkTag;
use App\Models\PagePropertyRoleStep;
use App\Models\PagePropertySupportCard;
use App\Models\PagePropertyWhyUsCard;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

function propertyPage(array $overrides = []): Page
{
    return Page::factory()->create(array_merge(['slug' => 'property'], $overrides));
}

test('property page renders with fallback content when the database has no rows', function () {
    propertyPage();

    $response = $this->get(route('property'));

    $response->assertOk();
    $response->assertSee('Property Sourcing and Packaging');
    $response->assertSee('Practical property support across the full opportunity lifecycle.');
    $response->assertSee('Property Owners');
    $response->assertSee('Who We Help');
    $response->assertSee('Practical Delivery');
    $response->assertSee('We coordinate');
    $response->assertSee('Solicitors');
    $response->assertSee('Important Notice');
    $response->assertSee('Ready to discuss a property opportunity?');
});

test('property page renders database-managed support cards when present', function () {
    $page = propertyPage();

    PagePropertySupportCard::factory()->create([
        'page_id' => $page->id,
        'order' => 1,
        'icon' => 'cog',
        'title' => 'Custom Support Card',
        'description' => 'Custom support description.',
        'visibility' => true,
    ]);

    $response = $this->get(route('property'));

    $response->assertOk();
    $response->assertSee('Custom Support Card');
    $response->assertSee('Custom support description.');
});

test('property page hides non-visible repeatable rows', function () {
    $page = propertyPage();

    PagePropertyAudienceCard::factory()->create([
        'page_id' => $page->id,
        'order' => 1,
        'title' => 'Hidden Audience Card',
        'visibility' => false,
    ]);

    $response = $this->get(route('property'));

    $response->assertOk();
    $response->assertDontSee('Hidden Audience Card');
});

test('property page respects the order column for repeatable rows', function () {
    $page = propertyPage();

    PagePropertyWhyUsCard::factory()->create(['page_id' => $page->id, 'order' => 2, 'title' => 'Second Card', 'visibility' => true]);
    PagePropertyWhyUsCard::factory()->create(['page_id' => $page->id, 'order' => 1, 'title' => 'First Card', 'visibility' => true]);

    $response = $this->get(route('property'));

    $response->assertOk();
    $content = $response->getContent();
    expect(strpos($content, 'First Card'))->toBeLessThan(strpos($content, 'Second Card'));
});

test('admin can update property page scalar fields and repeatable sections', function () {
    $admin = User::factory()->create(['role' => 'admin']);
    $page = propertyPage();

    $response = $this->actingAs($admin)->patch(route('admin.cms.pages.update', $page), [
        'title' => $page->title,
        'hero_title' => $page->hero_title,
        'hero_subtitle' => $page->hero_subtitle,
        'hero_description' => $page->hero_description,
        'property_support_heading' => 'Updated Support Heading',
        'property_support_cards' => [
            ['icon' => 'cog', 'title' => 'Updated Support Card', 'description' => 'Updated support description.', 'visibility' => '1'],
        ],
        'property_audience_heading' => 'Updated Audience Heading',
        'property_audience_cards' => [
            ['icon' => 'home', 'title' => 'Updated Audience Card', 'description' => 'Updated audience description.', 'is_dark' => '1', 'visibility' => '1'],
        ],
        'property_why_us_heading' => 'Updated Why Us Heading',
        'property_role_heading' => 'Updated Role Heading',
        'property_role_steps' => [
            ['title' => 'Updated Step', 'description' => 'Updated step description.', 'visibility' => '1'],
        ],
        'property_network_heading' => 'Updated Network Heading',
        'property_network_tags' => [
            ['label' => 'Updated Tag', 'visibility' => '1'],
        ],
        'property_disclaimer_heading' => 'Updated Disclaimer Heading',
        'property_page_cta_heading' => 'Updated CTA Heading',
        'sitemap_include' => '1',
        'is_published' => '1',
    ]);

    $response->assertRedirect(route('admin.cms.pages.edit', $page));
    $response->assertSessionHas('success');

    $page->refresh();

    expect($page->property_support_heading)->toBe('Updated Support Heading');
    expect($page->property_audience_heading)->toBe('Updated Audience Heading');
    expect($page->property_role_heading)->toBe('Updated Role Heading');
    expect($page->property_network_heading)->toBe('Updated Network Heading');
    expect($page->property_disclaimer_heading)->toBe('Updated Disclaimer Heading');
    expect($page->property_page_cta_heading)->toBe('Updated CTA Heading');

    expect(PagePropertySupportCard::where('page_id', $page->id)->where('order', 1)->first()->title)->toBe('Updated Support Card');

    $audienceCard = PagePropertyAudienceCard::where('page_id', $page->id)->where('order', 1)->first();
    expect($audienceCard->title)->toBe('Updated Audience Card');
    expect($audienceCard->is_dark)->toBeTrue();

    expect(PagePropertyRoleStep::where('page_id', $page->id)->where('order', 1)->first()->title)->toBe('Updated Step');
    expect(PagePropertyNetworkTag::where('page_id', $page->id)->where('order', 1)->first()->label)->toBe('Updated Tag');
});

test('a non-admin cannot update the property page', function () {
    $user = User::factory()->create(['role' => 'investor']);
    $page = propertyPage();

    $response = $this->actingAs($user)->patch(route('admin.cms.pages.update', $page), [
        'title' => $page->title,
    ]);

    $response->assertForbidden();
});

test('admin can upload and remove the property context banner image', function () {
    Storage::fake('public');

    $admin = User::factory()->create(['role' => 'admin']);
    $page = propertyPage();

    $upload = $this->actingAs($admin)->patch(route('admin.cms.pages.update', $page), [
        'title' => $page->title,
        'hero_title' => $page->hero_title,
        'property_context_media_file' => UploadedFile::fake()->image('context.jpg'),
        'sitemap_include' => '1',
        'is_published' => '1',
    ]);

    $upload->assertRedirect(route('admin.cms.pages.edit', $page));

    $page->refresh();
    expect($page->property_context_media_id)->not->toBeNull();

    $removal = $this->actingAs($admin)->patch(route('admin.cms.pages.update', $page), [
        'title' => $page->title,
        'hero_title' => $page->hero_title,
        'remove_property_context_media' => '1',
        'sitemap_include' => '1',
        'is_published' => '1',
    ]);

    $removal->assertRedirect(route('admin.cms.pages.edit', $page));
    expect($page->refresh()->property_context_media_id)->toBeNull();
});

test('property context banner renders the uploaded image when present', function () {
    $media = Media::factory()->create(['alt_text' => 'Property coordination site visit']);
    propertyPage(['property_context_media_id' => $media->id]);

    $response = $this->get(route('property'));

    $response->assertOk();
    $response->assertSee($media->url(), false);
    $response->assertSee('Property coordination site visit', false);
});
