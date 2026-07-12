<?php

use App\Models\FooterLink;
use App\Models\Page;
use App\Models\SiteSetting;
use App\Models\SocialLink;
use App\Models\User;
use Illuminate\Support\Facades\Cache;

beforeEach(function () {
    SiteSetting::query()->delete();
    SiteSetting::create(['site_name' => 'The Lylods Group']);
    Cache::forget('cms.site_settings');
    Cache::forget('cms.footer_links');
    Cache::forget('cms.social_links');
    Page::factory()->create(['slug' => 'home']);
});

test('primary navigation has exactly the six governed items and no standalone Case Studies link', function () {
    $response = $this->get(route('home'));

    $response->assertOk();
    $response->assertSee('aria-label="Main navigation"', false);

    $nav = substr($response->getContent(), strpos($response->getContent(), 'aria-label="Main navigation"'));
    $nav = substr($nav, 0, strpos($nav, '</nav>'));

    foreach (['Home', 'About', 'Services', 'Industries', 'Insights', 'Contact'] as $label) {
        expect(str_contains($nav, $label))->toBeTrue("Expected primary nav to contain '{$label}'");
    }

    // Case Studies must resolve exactly once within the nav block (inside the
    // Insights mega menu) — not also as its own standalone top-level link.
    expect(substr_count($nav, 'href="' . route('case-studies') . '"'))->toBe(1);
});

test('the Industries mega menu renders with real, routable links', function () {
    $response = $this->get(route('home'));

    $response->assertOk();
    $response->assertSee('Explore Industries →', false);
    $response->assertSee('href="' . route('industries') . '"', false);
});

test('the Insights mega menu renders and includes a real Case Studies link', function () {
    $response = $this->get(route('home'));

    $response->assertOk();
    $response->assertSee('View All Insights →', false);
    $response->assertSee('href="' . route('case-studies') . '"', false);
});

test('mobile navigation mirrors desktop with Industries and Insights accordions', function () {
    $response = $this->get(route('home'));

    $response->assertOk();
    $response->assertSee('mobileIndustries', false);
    $response->assertSee('mobileInsights', false);
});

// --- Phase 17.4 premium footer architecture ---

test('the footer renders exactly four physical navigation regions, not seven equal columns', function () {
    FooterLink::create(['group' => 'company', 'label' => 'About Us', 'url' => '/about', 'display_order' => 1]);
    FooterLink::create(['group' => 'services', 'label' => 'Business & Technology', 'url' => '/services', 'display_order' => 1]);
    FooterLink::create(['group' => 'industries', 'label' => 'Explore Industries', 'url' => '/industries', 'display_order' => 1]);
    FooterLink::create(['group' => 'insights', 'label' => 'Insights', 'url' => '/insights', 'display_order' => 1]);
    FooterLink::create(['group' => 'support', 'label' => 'Contact Us', 'url' => '/contact', 'display_order' => 1]);
    Cache::forget('cms.footer_links');

    $response = $this->get(route('home'));
    $response->assertOk();

    $footer = substr($response->getContent(), strpos($response->getContent(), '<footer'));

    // The four governed physical column headings.
    foreach (['Company', 'What We Do', 'Knowledge &amp; Support', 'Legal &amp; Access'] as $heading) {
        expect(str_contains($footer, $heading))->toBeTrue("Expected footer to contain the '{$heading}' region heading");
    }

    // The logical seven groups still surface as sub-headings within those regions.
    foreach (['Services', 'Industries', 'Insights', 'Support', 'Legal'] as $subheading) {
        expect(substr_count($footer, '>' . $subheading . '<'))->toBeGreaterThan(0, "Expected logical group '{$subheading}' to still render");
    }
});

test('Services and Industries render inside the What We Do region', function () {
    FooterLink::create(['group' => 'services', 'label' => 'Business Consultancy', 'url' => '/services', 'display_order' => 1]);
    FooterLink::create(['group' => 'industries', 'label' => 'Energy & Infrastructure', 'url' => '/industries', 'display_order' => 1]);
    Cache::forget('cms.footer_links');

    $response = $this->get(route('home'));
    $response->assertOk();

    $footer = substr($response->getContent(), strpos($response->getContent(), '<footer'));
    $whatWeDo = substr($footer, strpos($footer, 'What We Do'));
    $whatWeDo = substr($whatWeDo, 0, strpos($whatWeDo, 'Legal &amp; Access'));

    expect(str_contains($whatWeDo, 'Business Consultancy'))->toBeTrue();
    expect(str_contains($whatWeDo, 'Energy &amp; Infrastructure'))->toBeTrue();
});

test('Insights and Support render inside the Knowledge and Support region', function () {
    FooterLink::create(['group' => 'insights', 'label' => 'Latest Insights', 'url' => '/insights', 'display_order' => 1]);
    FooterLink::create(['group' => 'support', 'label' => 'Contact Support', 'url' => '/contact', 'display_order' => 1]);
    Cache::forget('cms.footer_links');

    $response = $this->get(route('home'));
    $response->assertOk();

    $footer = substr($response->getContent(), strpos($response->getContent(), '<footer'));
    $knowledge = substr($footer, strpos($footer, 'Knowledge &amp; Support'));
    $knowledge = substr($knowledge, 0, strpos($knowledge, 'Legal &amp; Access'));

    expect(str_contains($knowledge, 'Latest Insights'))->toBeTrue();
    expect(str_contains($knowledge, 'Contact Support'))->toBeTrue();
});

test('Legal and Portal content render inside the final navigation region', function () {
    FooterLink::create(['group' => 'portal', 'label' => 'Investment Information', 'url' => '/investment', 'display_order' => 1]);
    FooterLink::create(['group' => 'portal', 'label' => 'Investor FAQ', 'url' => '/investment#faq', 'display_order' => 2]);
    Cache::forget('cms.footer_links');

    $response = $this->get(route('home'));
    $response->assertOk();

    $footer = substr($response->getContent(), strpos($response->getContent(), '<footer'));
    $legalAccess = substr($footer, strpos($footer, 'Legal &amp; Access'));

    expect(str_contains($legalAccess, 'Privacy Notice'))->toBeTrue();
    expect(str_contains($legalAccess, 'Terms of Use'))->toBeTrue();

    // The first portal link is promoted to the Client Access panel CTA, so
    // only the remaining portal links render as additional column links.
    expect(str_contains($legalAccess, 'Investor FAQ'))->toBeTrue();
});

test('the Client Portal CTA remains present in the Client Access panel', function () {
    $response = $this->get(route('home'));

    $response->assertOk();
    $response->assertSee('Client Access', false);
    $response->assertSee('Access your secure portal', false);
    $response->assertSee('href="' . route('login') . '"', false);
});

test('empty CMS groups do not render empty region or sub-headings', function () {
    // No FooterLink rows seeded at all — every logical group is empty.
    $response = $this->get(route('home'));

    $response->assertOk();
    $footer = substr($response->getContent(), strpos($response->getContent(), '<footer'));

    // Company, What We Do and Knowledge & Support have no CMS links and must not render.
    expect(str_contains($footer, '>Company<'))->toBeFalse();
    expect(str_contains($footer, 'What We Do'))->toBeFalse();
    expect(str_contains($footer, 'Knowledge &amp; Support'))->toBeFalse();

    // Legal & Access always renders because Legal routes are developer-owned, not CMS-driven.
    expect(str_contains($footer, 'Legal &amp; Access'))->toBeTrue();
    expect(str_contains($footer, '>Portal<'))->toBeFalse();
});

test('the footer Legal region links to the correct real routes', function () {
    $response = $this->get(route('home'));

    $response->assertOk();
    $response->assertSee('href="' . route('privacy-notice') . '"', false);
    $response->assertSee('href="' . route('cookie-notice') . '"', false);
    $response->assertSee('href="' . route('accessibility') . '"', false);
    $response->assertSee('href="' . route('complaints') . '"', false);
    $response->assertSee('href="' . route('terms') . '"', false);
});

test('the footer does not link the unresolved /privacy route', function () {
    $response = $this->get(route('home'));

    $response->assertOk();
    $response->assertDontSee('href="' . route('privacy') . '"', false);
});

test('footer CMS-driven regions render real seeded links when present', function () {
    FooterLink::create(['group' => 'insights', 'label' => 'Insights', 'url' => '/insights', 'display_order' => 1]);
    FooterLink::create(['group' => 'support', 'label' => 'Contact Us', 'url' => '/contact', 'display_order' => 1]);
    Cache::forget('cms.footer_links');

    $response = $this->get(route('home'));

    $response->assertOk();
    $response->assertSee('Contact Us');
});

test('the trust strip renders LinkedIn only when a LinkedIn social link exists', function () {
    $withoutLinkedIn = $this->get(route('home'));
    $withoutLinkedIn->assertOk();
    $withoutLinkedIn->assertDontSee('>LinkedIn<', false);

    SocialLink::create(['platform' => 'linkedin', 'url' => 'https://linkedin.com/company/lylods', 'display_order' => 1]);
    Cache::forget('cms.social_links');

    $withLinkedIn = $this->get(route('home'));
    $withLinkedIn->assertOk();
    $withLinkedIn->assertSee('>LinkedIn<', false);
});

test('admin can create a footer link in the new Insights and Support groups', function () {
    $admin = User::factory()->create(['role' => 'admin']);

    $response = $this->actingAs($admin)->post(route('admin.cms.footer.links.store'), [
        'group' => 'insights',
        'label' => 'Latest Insights',
        'url'   => '/insights',
    ]);

    $response->assertRedirect(route('admin.cms.footer.links.index'));
    $this->assertDatabaseHas('footer_links', ['group' => 'insights', 'label' => 'Latest Insights']);
});

test('an invalid footer link group is rejected', function () {
    $admin = User::factory()->create(['role' => 'admin']);

    $response = $this->actingAs($admin)->post(route('admin.cms.footer.links.store'), [
        'group' => 'not-a-real-group',
        'label' => 'Broken',
        'url'   => '/broken',
    ]);

    $response->assertSessionHasErrors('group');
});

// --- The nine public pages without a dedicated CMS test file must still render ---

test('the nine pages not covered by a dedicated CMS test all return HTTP 200', function () {
    foreach (['case-studies', 'insights', 'privacy', 'privacy-notice', 'cookie-notice', 'accessibility', 'complaints', 'terms'] as $slug) {
        Page::factory()->create(['slug' => $slug]);
    }

    foreach (['home', 'case-studies', 'insights', 'privacy', 'privacy-notice', 'cookie-notice', 'accessibility', 'complaints', 'terms'] as $routeName) {
        $this->get(route($routeName))->assertOk();
    }
});
