<?php

use App\Models\Page;
use App\Models\User;

/**
 * Renders each CMS-managed page's admin editor via GET and asserts 200, plus
 * that every expected section panel and "Manage Elsewhere" link actually
 * rendered. This exists specifically to catch RouteNotFoundException-type
 * bugs and silently-skipped admin branches — a broken route name in the
 * About branch shipped undetected once because no test rendered that view
 * via GET (only a PATCH-redirect was covered). assertOk() alone already
 * rules out RouteNotFoundException/ViewException/MissingVariableException
 * (any of those would produce a 500, not 200); the assertSee() calls below
 * additionally guard against a page's slug branch silently falling through
 * to the generic fallback editor instead of its dedicated structured one.
 */
test('homepage admin editor renders every expected section', function () {
    $admin = User::factory()->create(['role' => 'admin']);
    $page = Page::factory()->create(['slug' => 'home']);

    $response = $this->actingAs($admin)->get(route('admin.cms.pages.edit', $page));

    $response->assertOk();
    $response->assertSee('Hero');
    $response->assertSee('Statistics');
    $response->assertSee('Services');
    $response->assertSee('Industries We Serve');
    $response->assertSee('Why Choose Us');
    $response->assertSee('Engagement Process');
    $response->assertSee('Discipline Identity Strip');
    $response->assertSee('About &amp; Values', false);
    $response->assertSee('Testimonials');
    $response->assertSee('Partners &amp; Accreditations', false);
    $response->assertSee('Work With Us CTA');
    $response->assertSee('Search Engine Metadata');
    $response->assertSee('action="' . route('admin.cms.pages.update', $page) . '"', false);
});

test('about admin editor renders every expected section', function () {
    $admin = User::factory()->create(['role' => 'admin']);
    $page = Page::factory()->create(['slug' => 'about']);

    $response = $this->actingAs($admin)->get(route('admin.cms.pages.edit', $page));

    $response->assertOk();
    $response->assertSee('Hero');
    $response->assertSee('Introduction');
    $response->assertSee('How We Work');
    $response->assertSee('Areas of Focus');
    $response->assertSee('Operating Principles');
    $response->assertSee('Who We Support');
    $response->assertSee('Why Clients Choose Us');
    $response->assertSee('Work With Us');
    $response->assertSee('Search Engine Metadata');
    $response->assertSee('Managed Elsewhere');
    $response->assertSee('Manage Team');
    $response->assertSee('Manage Accreditations');
    $response->assertSee(route('admin.cms.people.team.index'), false);
    $response->assertSee(route('admin.cms.trust.index'), false);
    $response->assertSee('action="' . route('admin.cms.pages.update', $page) . '"', false);
});

test('services admin editor renders every expected section', function () {
    $admin = User::factory()->create(['role' => 'admin']);
    $page = Page::factory()->create(['slug' => 'services']);

    $response = $this->actingAs($admin)->get(route('admin.cms.pages.edit', $page));

    $response->assertOk();
    $response->assertSee('Hero');
    $response->assertSee('Introduction');
    $response->assertSee('Why Clients Work With Us');
    $response->assertSee('How We Work');
    $response->assertSee('Get Started');
    $response->assertSee('Search Engine Metadata');
    $response->assertSee('Managed Elsewhere');
    $response->assertSee('Manage Service Catalogue');
    $response->assertSee(route('admin.cms.services.groups.index'), false);
    $response->assertSee('action="' . route('admin.cms.pages.update', $page) . '"', false);
});

test('industries admin editor renders every expected section', function () {
    $admin = User::factory()->create(['role' => 'admin']);
    $page = Page::factory()->create(['slug' => 'industries']);

    $response = $this->actingAs($admin)->get(route('admin.cms.pages.edit', $page));

    $response->assertOk();
    $response->assertSee('Hero');
    $response->assertSee('Introduction');
    $response->assertSee('Industry Grid');
    $response->assertSee('Get Started');
    $response->assertSee('Search Engine Metadata');
    $response->assertSee('action="' . route('admin.cms.pages.update', $page) . '"', false);
});

test('property admin editor renders every expected section', function () {
    $admin = User::factory()->create(['role' => 'admin']);
    $page = Page::factory()->create(['slug' => 'property']);

    $response = $this->actingAs($admin)->get(route('admin.cms.pages.edit', $page));

    $response->assertOk();
    $response->assertSee('Hero');
    $response->assertSee('What We Support');
    $response->assertSee('Context Banner');
    $response->assertSee('Who We Help');
    $response->assertSee('Why Clients Work With Us');
    $response->assertSee('Our Role');
    $response->assertSee('Professional Network');
    $response->assertSee('Important Notice');
    $response->assertSee('Get Started');
    $response->assertSee('Search Engine Metadata');
    $response->assertSee('action="' . route('admin.cms.pages.update', $page) . '"', false);
});

test('community projects admin editor renders every expected section', function () {
    $admin = User::factory()->create(['role' => 'admin']);
    $page = Page::factory()->create(['slug' => 'community-projects']);

    $response = $this->actingAs($admin)->get(route('admin.cms.pages.edit', $page));

    $response->assertOk();
    $response->assertSee('Hero');
    $response->assertSee('What We Support');
    $response->assertSee('Who We Support');
    $response->assertSee('Our Role');
    $response->assertSee('How We Work');
    $response->assertSee('Example Engagement Areas');
    $response->assertSee('Get Started');
    $response->assertSee('Search Engine Metadata');
    $response->assertSee('action="' . route('admin.cms.pages.update', $page) . '"', false);
});

test('investment admin editor renders every expected section', function () {
    $admin = User::factory()->create(['role' => 'admin']);
    $page = Page::factory()->create(['slug' => 'investment']);

    $response = $this->actingAs($admin)->get(route('admin.cms.pages.edit', $page));

    $response->assertOk();
    $response->assertSee('Hero');
    $response->assertSee('Statistics');
    $response->assertSee('Credibility Signals');
    $response->assertSee('Our Approach');
    $response->assertSee('Why The Lylods Group');
    $response->assertSee('The Process');
    $response->assertSee('Investor Access');
    $response->assertSee('Search Engine Metadata');
    $response->assertSee('action="' . route('admin.cms.pages.update', $page) . '"', false);
});

test('contact admin editor renders every expected section', function () {
    $admin = User::factory()->create(['role' => 'admin']);
    $page = Page::factory()->create(['slug' => 'contact']);

    $response = $this->actingAs($admin)->get(route('admin.cms.pages.edit', $page));

    $response->assertOk();
    $response->assertSee('Hero');
    $response->assertSee('Statistics');
    $response->assertSee('Contact Information');
    $response->assertSee('How We Can Help');
    $response->assertSee('Search Engine Metadata');
    $response->assertSee('Managed Elsewhere');
    $response->assertSee('Manage Site Settings');
    $response->assertSee(route('admin.cms.site-settings.edit'), false);
    $response->assertSee('action="' . route('admin.cms.pages.update', $page) . '"', false);
});

test('careers admin editor renders every expected section', function () {
    $admin = User::factory()->create(['role' => 'admin']);
    $page = Page::factory()->create(['slug' => 'careers']);

    $response = $this->actingAs($admin)->get(route('admin.cms.pages.edit', $page));

    $response->assertOk();
    $response->assertSee('Hero');
    $response->assertSee('Opportunity Areas');
    $response->assertSee('What to Tell Us');
    $response->assertSee('How It Works');
    $response->assertSee('Get In Touch');
    $response->assertSee('Search Engine Metadata');
    $response->assertSee('action="' . route('admin.cms.pages.update', $page) . '"', false);
});
