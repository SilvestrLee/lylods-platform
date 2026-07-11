<?php

use App\Models\Media;
use App\Models\Page;
use App\Models\PageInvestmentApproachCard;
use App\Models\PageInvestmentCredibilityCard;
use App\Models\PageInvestmentProcessStep;
use App\Models\PageInvestmentWhyCard;
use App\Models\PageStatistic;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

function investmentPage(array $overrides = []): Page
{
    return Page::factory()->create(array_merge(['slug' => 'investment'], $overrides));
}

test('investment page renders with fallback content when the database has no rows', function () {
    investmentPage();

    $response = $this->get(route('investment'));

    $response->assertOk();
    $response->assertSee('Portal Type');
    $response->assertSee('Dedicated Portal');
    $response->assertSee('Structured Platform');
    $response->assertSee('Investor relationships managed with structure and clarity.');
    $response->assertSee('Investment governed by professional standards.');
    $response->assertSee('Enquiry');
    $response->assertSee('Already have investor access?');
    $response->assertSee('Go to Login');
});

test('investment page renders database-managed credibility cards when present', function () {
    $page = investmentPage();

    PageInvestmentCredibilityCard::factory()->create([
        'page_id' => $page->id,
        'order' => 1,
        'icon' => 'cog',
        'title' => 'Custom Credibility Card',
        'description' => 'Custom credibility description.',
        'visibility' => true,
    ]);

    $response = $this->get(route('investment'));

    $response->assertOk();
    $response->assertSee('Custom Credibility Card');
    $response->assertSee('Custom credibility description.');
});

test('investment page hides non-visible repeatable rows', function () {
    $page = investmentPage();

    PageInvestmentWhyCard::factory()->create([
        'page_id' => $page->id,
        'order' => 1,
        'title' => 'Hidden Why Card',
        'visibility' => false,
    ]);

    $response = $this->get(route('investment'));

    $response->assertOk();
    $response->assertDontSee('Hidden Why Card');
});

test('investment page respects the order column for repeatable rows', function () {
    $page = investmentPage();

    PageInvestmentProcessStep::factory()->create(['page_id' => $page->id, 'order' => 2, 'title' => 'Second Step', 'visibility' => true]);
    PageInvestmentProcessStep::factory()->create(['page_id' => $page->id, 'order' => 1, 'title' => 'First Step', 'visibility' => true]);

    $response = $this->get(route('investment'));

    $response->assertOk();
    $content = $response->getContent();
    expect(strpos($content, 'First Step'))->toBeLessThan(strpos($content, 'Second Step'));
});

test('admin can update investment page scalar fields and repeatable sections', function () {
    $admin = User::factory()->create(['role' => 'admin']);
    $page = investmentPage();

    $response = $this->actingAs($admin)->patch(route('admin.cms.pages.update', $page), [
        'title' => $page->title,
        'hero_title' => $page->hero_title,
        'hero_subtitle' => $page->hero_subtitle,
        'hero_description' => $page->hero_description,
        'statistics' => [
            ['label' => 'Updated Label', 'value' => 'Updated Value', 'caption' => 'Updated caption.'],
        ],
        'investment_credibility_cards' => [
            ['icon' => 'cog', 'title' => 'Updated Credibility Card', 'description' => 'Updated credibility description.', 'visibility' => '1'],
        ],
        'investment_approach_heading' => 'Updated Approach Heading',
        'investment_approach_cards' => [
            ['icon' => 'lock-closed', 'title' => 'Updated Approach Card', 'description' => 'Updated approach description.', 'visibility' => '1'],
        ],
        'investment_why_heading' => 'Updated Why Heading',
        'investment_why_cards' => [
            ['icon' => 'shield-check', 'title' => 'Updated Why Card', 'description' => 'Updated why description.', 'visibility' => '1'],
        ],
        'investment_process_heading' => 'Updated Process Heading',
        'investment_process_steps' => [
            ['icon' => 'envelope', 'title' => 'Updated Step', 'description' => 'Updated step description.', 'visibility' => '1'],
        ],
        'investment_cta_heading' => 'Updated CTA Heading',
        'sitemap_include' => '1',
        'is_published' => '1',
    ]);

    $response->assertRedirect(route('admin.cms.pages.edit', $page));
    $response->assertSessionHas('success');

    $page->refresh();

    expect($page->investment_approach_heading)->toBe('Updated Approach Heading');
    expect($page->investment_why_heading)->toBe('Updated Why Heading');
    expect($page->investment_process_heading)->toBe('Updated Process Heading');
    expect($page->investment_cta_heading)->toBe('Updated CTA Heading');

    expect(PageStatistic::where('page_id', $page->id)->where('order', 1)->first()->label)->toBe('Updated Label');
    expect(PageInvestmentCredibilityCard::where('page_id', $page->id)->where('order', 1)->first()->title)->toBe('Updated Credibility Card');
    expect(PageInvestmentApproachCard::where('page_id', $page->id)->where('order', 1)->first()->title)->toBe('Updated Approach Card');
    expect(PageInvestmentWhyCard::where('page_id', $page->id)->where('order', 1)->first()->title)->toBe('Updated Why Card');
    expect(PageInvestmentProcessStep::where('page_id', $page->id)->where('order', 1)->first()->title)->toBe('Updated Step');
});

test('a non-admin cannot update the investment page', function () {
    $user = User::factory()->create(['role' => 'investor']);
    $page = investmentPage();

    $response = $this->actingAs($user)->patch(route('admin.cms.pages.update', $page), [
        'title' => $page->title,
    ]);

    $response->assertForbidden();
});

test('admin can upload and remove the investment approach image', function () {
    Storage::fake('public');

    $admin = User::factory()->create(['role' => 'admin']);
    $page = investmentPage();

    $upload = $this->actingAs($admin)->patch(route('admin.cms.pages.update', $page), [
        'title' => $page->title,
        'hero_title' => $page->hero_title,
        'investment_approach_media_file' => UploadedFile::fake()->image('approach.jpg'),
        'sitemap_include' => '1',
        'is_published' => '1',
    ]);

    $upload->assertRedirect(route('admin.cms.pages.edit', $page));

    $page->refresh();
    expect($page->investment_approach_media_id)->not->toBeNull();

    $removal = $this->actingAs($admin)->patch(route('admin.cms.pages.update', $page), [
        'title' => $page->title,
        'hero_title' => $page->hero_title,
        'remove_investment_approach_media' => '1',
        'sitemap_include' => '1',
        'is_published' => '1',
    ]);

    $removal->assertRedirect(route('admin.cms.pages.edit', $page));
    expect($page->refresh()->investment_approach_media_id)->toBeNull();
});

test('investment approach section renders the uploaded image when present', function () {
    $media = Media::factory()->create(['alt_text' => 'Investor relations meeting']);
    investmentPage(['investment_approach_media_id' => $media->id]);

    $response = $this->get(route('investment'));

    $response->assertOk();
    $response->assertSee($media->url(), false);
    $response->assertSee('Investor relations meeting', false);
});

test('investment login CTA always links to the login route regardless of CMS input', function () {
    $page = investmentPage();

    $response = $this->get(route('investment'));

    $response->assertOk();
    $response->assertSee('href="' . route('login') . '"', false);
});
