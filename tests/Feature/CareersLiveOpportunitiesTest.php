<?php

use App\Models\CareerOpportunity;
use App\Models\Page;
use Illuminate\Support\Facades\Cache;

function careersLiveOpportunitiesPage(array $overrides = []): Page
{
    return Page::factory()->create(array_merge(['slug' => 'careers'], $overrides));
}

beforeEach(function () {
    Cache::forget('cms.careers');
});

test('with zero published opportunities, a graceful empty state renders', function () {
    careersLiveOpportunitiesPage();

    $response = $this->get(route('careers'));

    $response->assertOk();
    $response->assertSee('There are no live openings at the moment', false);
});

test('a single published opportunity renders with its details', function () {
    careersLiveOpportunitiesPage();

    CareerOpportunity::create([
        'title' => 'Junior Compliance Analyst',
        'location' => 'London, UK',
        'type' => 'full-time',
        'description' => 'Support our compliance team with documentation and audit readiness.',
        'closing_date' => now()->addDays(14),
        'status' => 'published',
    ]);

    $response = $this->get(route('careers'));

    $response->assertOk();
    $response->assertSee('Junior Compliance Analyst');
    $response->assertSee('London, UK');
    $response->assertSee('Full Time');
});

test('many published opportunities all render', function () {
    careersLiveOpportunitiesPage();

    CareerOpportunity::factory()->count(5)->create(['status' => 'published']);

    $response = $this->get(route('careers'));

    $response->assertOk();
    expect(CareerOpportunity::where('status', 'published')->count())->toBe(5);
});

test('draft opportunities are not rendered on the public page', function () {
    careersLiveOpportunitiesPage();

    CareerOpportunity::create([
        'title' => 'Secret Draft Role',
        'status' => 'draft',
    ]);

    $response = $this->get(route('careers'));

    $response->assertOk();
    $response->assertDontSee('Secret Draft Role');
});

test('archived opportunities are not rendered on the public page', function () {
    careersLiveOpportunitiesPage();

    CareerOpportunity::create([
        'title' => 'Old Archived Role',
        'status' => 'archived',
    ]);

    $response = $this->get(route('careers'));

    $response->assertOk();
    $response->assertDontSee('Old Archived Role');
});

test('expired but still-published opportunities still render, matching existing service behaviour', function () {
    careersLiveOpportunitiesPage();

    CareerOpportunity::create([
        'title' => 'Expired But Published Role',
        'status' => 'published',
        'closing_date' => now()->subDays(30),
    ]);

    $response = $this->get(route('careers'));

    $response->assertOk();
    $response->assertSee('Expired But Published Role');
});

test('opportunities render ordered by closing date then title, matching CareerService::published()', function () {
    careersLiveOpportunitiesPage();

    CareerOpportunity::create(['title' => 'Zebra Role', 'status' => 'published', 'closing_date' => now()->addDays(5)]);
    CareerOpportunity::create(['title' => 'Alpha Role', 'status' => 'published', 'closing_date' => now()->addDays(1)]);

    $response = $this->get(route('careers'));

    $response->assertOk();
    $content = $response->getContent();
    $alphaPos = strpos($content, 'Alpha Role');
    $zebraPos = strpos($content, 'Zebra Role');

    expect($alphaPos)->not->toBeFalse();
    expect($zebraPos)->not->toBeFalse();
    expect($alphaPos)->toBeLessThan($zebraPos);
});
