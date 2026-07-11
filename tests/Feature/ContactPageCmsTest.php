<?php

use App\Models\Media;
use App\Models\Page;
use App\Models\PageContactEnquiryCard;
use App\Models\PageStatistic;
use App\Models\SiteSetting;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

function contactPage(array $overrides = []): Page
{
    return Page::factory()->create(array_merge(['slug' => 'contact'], $overrides));
}

/**
 * The real contact() controller action always calls SiteSettingService::current(),
 * which uses firstOrFail() — every test that renders the public /contact route
 * needs at least one SiteSetting row to exist, or it 404s before the CMS content
 * is ever reached. This is pre-existing controller behavior, not introduced here.
 */
beforeEach(function () {
    SiteSetting::query()->delete();
    SiteSetting::create(['site_name' => 'The Lylods Group']);
    Cache::forget('cms.site_settings');
});

test('contact page renders with fallback content when the database has no rows', function () {
    contactPage();

    $response = $this->get(route('contact'));

    $response->assertOk();
    $response->assertSee('Response Target');
    $response->assertSee('2 Business Days');
    $response->assertSee('Reach our team directly.');
    $response->assertSee('General Enquiries');
    $response->assertSee('Business & Services');
    $response->assertSee('What is your enquiry about?');
    $response->assertSee('Send an Enquiry');
});

test('contact page renders database-managed enquiry cards when present', function () {
    $page = contactPage();

    PageContactEnquiryCard::factory()->create([
        'page_id' => $page->id,
        'order' => 1,
        'icon' => 'cog',
        'title' => 'Custom Enquiry Card',
        'description' => 'Custom enquiry description.',
        'visibility' => true,
    ]);

    $response = $this->get(route('contact'));

    $response->assertOk();
    $response->assertSee('Custom Enquiry Card');
    $response->assertSee('Custom enquiry description.');
});

test('contact page hides non-visible repeatable rows', function () {
    $page = contactPage();

    PageContactEnquiryCard::factory()->create([
        'page_id' => $page->id,
        'order' => 1,
        'title' => 'Hidden Enquiry Card',
        'visibility' => false,
    ]);

    $response = $this->get(route('contact'));

    $response->assertOk();
    $response->assertDontSee('Hidden Enquiry Card');
});

test('contact page respects the order column for repeatable rows', function () {
    $page = contactPage();

    PageContactEnquiryCard::factory()->create(['page_id' => $page->id, 'order' => 2, 'title' => 'Second Card', 'visibility' => true]);
    PageContactEnquiryCard::factory()->create(['page_id' => $page->id, 'order' => 1, 'title' => 'First Card', 'visibility' => true]);

    $response = $this->get(route('contact'));

    $response->assertOk();
    $content = $response->getContent();
    expect(strpos($content, 'First Card'))->toBeLessThan(strpos($content, 'Second Card'));
});

test('contact info panel renders live site settings values, not CMS-stored copies', function () {
    contactPage();
    SiteSetting::query()->delete();
    SiteSetting::create([
        'site_name' => 'The Lylods Group',
        'primary_email' => 'hello@example-test.com',
        'address' => '123 Test Street, Testville',
        'office_hours' => 'Test Hours 9-5',
    ]);
    Cache::forget('cms.site_settings');

    $response = $this->get(route('contact'));

    $response->assertOk();
    $response->assertSee('hello@example-test.com');
    $response->assertSee('123 Test Street, Testville');
    $response->assertSee('Test Hours 9-5');
});

test('admin can update contact page scalar fields and repeatable sections', function () {
    $admin = User::factory()->create(['role' => 'admin']);
    $page = contactPage();

    $response = $this->actingAs($admin)->patch(route('admin.cms.pages.update', $page), [
        'title' => $page->title,
        'hero_title' => $page->hero_title,
        'hero_subtitle' => $page->hero_subtitle,
        'hero_description' => $page->hero_description,
        'statistics' => [
            ['label' => 'Updated Label', 'value' => 'Updated Value', 'caption' => 'Updated caption.'],
        ],
        'contact_info_heading' => 'Updated Info Heading',
        'contact_enquiry_heading' => 'Updated Enquiry Heading',
        'contact_enquiry_cards' => [
            ['icon' => 'cog', 'title' => 'Updated Enquiry Card', 'description' => 'Updated enquiry description.', 'visibility' => '1'],
        ],
        'sitemap_include' => '1',
        'is_published' => '1',
    ]);

    $response->assertRedirect(route('admin.cms.pages.edit', $page));
    $response->assertSessionHas('success');

    $page->refresh();

    expect($page->contact_info_heading)->toBe('Updated Info Heading');
    expect($page->contact_enquiry_heading)->toBe('Updated Enquiry Heading');
    expect(PageStatistic::where('page_id', $page->id)->where('order', 1)->first()->label)->toBe('Updated Label');
    expect(PageContactEnquiryCard::where('page_id', $page->id)->where('order', 1)->first()->title)->toBe('Updated Enquiry Card');
});

test('a non-admin cannot update the contact page', function () {
    $user = User::factory()->create(['role' => 'investor']);
    $page = contactPage();

    $response = $this->actingAs($user)->patch(route('admin.cms.pages.update', $page), [
        'title' => $page->title,
    ]);

    $response->assertForbidden();
});

test('admin can upload and remove the contact info panel image', function () {
    Storage::fake('public');

    $admin = User::factory()->create(['role' => 'admin']);
    $page = contactPage();

    $upload = $this->actingAs($admin)->patch(route('admin.cms.pages.update', $page), [
        'title' => $page->title,
        'hero_title' => $page->hero_title,
        'contact_info_media_file' => UploadedFile::fake()->image('info.jpg'),
        'sitemap_include' => '1',
        'is_published' => '1',
    ]);

    $upload->assertRedirect(route('admin.cms.pages.edit', $page));

    $page->refresh();
    expect($page->contact_info_media_id)->not->toBeNull();

    $removal = $this->actingAs($admin)->patch(route('admin.cms.pages.update', $page), [
        'title' => $page->title,
        'hero_title' => $page->hero_title,
        'remove_contact_info_media' => '1',
        'sitemap_include' => '1',
        'is_published' => '1',
    ]);

    $removal->assertRedirect(route('admin.cms.pages.edit', $page));
    expect($page->refresh()->contact_info_media_id)->toBeNull();
});

test('contact info panel renders the uploaded image when present', function () {
    $media = Media::factory()->create(['alt_text' => 'Client consultation photo']);
    contactPage(['contact_info_media_id' => $media->id]);

    $response = $this->get(route('contact'));

    $response->assertOk();
    $response->assertSee($media->url(), false);
    $response->assertSee('Client consultation photo', false);
});

test('contact investor callout always links to the login route regardless of CMS input', function () {
    contactPage();

    $response = $this->get(route('contact'));

    $response->assertOk();
    $response->assertSee('href="' . route('login') . '"', false);
});

test('contact form fields remain present and unmodified by CMS content', function () {
    contactPage();

    $response = $this->get(route('contact'));

    $response->assertOk();
    $response->assertSee('Enquiry Type', false);
    $response->assertSee('business-consultancy', false);
    $response->assertSee('Send Enquiry');
});
