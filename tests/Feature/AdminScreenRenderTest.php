<?php

use App\Models\CaseStudy;
use App\Models\CompliancePage;
use App\Models\Download;
use App\Models\FooterLink;
use App\Models\Insight;
use App\Models\Investment;
use App\Models\InvestmentPlan;
use App\Models\Media;
use App\Models\Notice;
use App\Models\Organisation;
use App\Models\Partner;
use App\Models\ServiceGroup;
use App\Models\SocialLink;
use App\Models\TeamMember;
use App\Models\Testimonial;
use App\Models\User;
use Illuminate\Support\Str;

function admin(): User
{
    return User::factory()->create(['role' => 'admin']);
}

// --- Investments ---

test('admin investments index renders', function () {
    $response = $this->actingAs(admin())->get(route('admin.investments.index'));
    $response->assertOk();
    $response->assertSee('Investment Records');
});

test('admin investment edit renders', function () {
    $investor = User::factory()->create(['role' => 'investor']);
    $plan = InvestmentPlan::create(['name' => 'Growth Plan', 'minimum_amount' => 1000, 'expected_return_rate' => 5, 'duration' => '12 months', 'is_active' => true]);
    $investment = Investment::create(['user_id' => $investor->id, 'investment_plan_id' => $plan->id, 'amount' => 5000, 'status' => 'active']);

    $response = $this->actingAs(admin())->get(route('admin.investments.edit', $investment));
    $response->assertOk();
    $response->assertSee('Edit Investment Record');
});

// --- Investment Plans ---

test('admin investment plans index renders', function () {
    $response = $this->actingAs(admin())->get(route('admin.investment-plans.index'));
    $response->assertOk();
    $response->assertSee('Manage Investment Plans');
});

test('admin investment plan edit renders', function () {
    $plan = InvestmentPlan::create(['name' => 'Growth Plan', 'minimum_amount' => 1000, 'expected_return_rate' => 5, 'duration' => '12 months', 'is_active' => true]);

    $response = $this->actingAs(admin())->get(route('admin.investment-plans.edit', $plan));
    $response->assertOk();
    $response->assertSee('Edit Investment Plan');
});

// --- Investors ---

test('admin investors index renders', function () {
    $response = $this->actingAs(admin())->get(route('admin.investors.index'));
    $response->assertOk();
    $response->assertSee('Manage Investors');
});

test('admin investor edit renders', function () {
    $investor = User::factory()->create(['role' => 'investor']);

    $response = $this->actingAs(admin())->get(route('admin.investors.edit', $investor));
    $response->assertOk();
    $response->assertSee('Edit Investor Account');
});

// --- Notices ---

test('admin notices index renders', function () {
    $response = $this->actingAs(admin())->get(route('admin.notices.index'));
    $response->assertOk();
    $response->assertSee('Manage Notices');
});

test('admin notice edit renders', function () {
    $admin = admin();
    $notice = Notice::create(['created_by' => $admin->id, 'title' => 'System Notice', 'body' => 'Notice body.', 'is_published' => true]);

    $response = $this->actingAs($admin)->get(route('admin.notices.edit', $notice));
    $response->assertOk();
    $response->assertSee('Edit Notice');
});

// --- Media ---

test('admin media index renders', function () {
    $response = $this->actingAs(admin())->get(route('admin.cms.media.index'));
    $response->assertOk();
    $response->assertSee('Media Library');
});

test('admin media edit renders', function () {
    $media = Media::create(['uuid' => (string) Str::uuid(), 'title' => 'Test Image', 'original_filename' => 'test.jpg', 'filename' => 'test.jpg', 'directory' => 'cms/uploads', 'extension' => 'jpg', 'path' => 'cms/uploads/test.jpg', 'disk' => 'public', 'mime_type' => 'image/jpeg', 'category' => 'uploads', 'file_size' => 1024, 'is_public' => true]);

    $response = $this->actingAs(admin())->get(route('admin.cms.media.edit', $media));
    $response->assertOk();
    $response->assertSee('Edit Media');
});

// --- Partners ---

test('admin partners index renders', function () {
    $response = $this->actingAs(admin())->get(route('admin.cms.partners.index'));
    $response->assertOk();
    $response->assertSee('Partners');
});

test('admin partner edit renders', function () {
    $partner = Partner::create(['name' => 'Acme Ltd', 'display_order' => 1, 'is_visible' => true]);

    $response = $this->actingAs(admin())->get(route('admin.cms.partners.edit', $partner));
    $response->assertOk();
    $response->assertSee('Edit Partner');
});

// --- Downloads ---

test('admin downloads index renders', function () {
    $response = $this->actingAs(admin())->get(route('admin.cms.downloads.index'));
    $response->assertOk();
    $response->assertSee('Downloads');
});

test('admin download edit renders', function () {
    $download = Download::create(['title' => 'Brochure', 'display_order' => 1, 'is_public' => true]);

    $response = $this->actingAs(admin())->get(route('admin.cms.downloads.edit', $download));
    $response->assertOk();
    $response->assertSee('Edit Download');
});

// --- Service Groups ---

test('admin service group edit renders', function () {
    $group = ServiceGroup::create(['name' => 'Business & Technology', 'slug' => 'business-technology-render-test', 'display_order' => 1, 'is_active' => true]);

    $response = $this->actingAs(admin())->get(route('admin.cms.services.groups.edit', $group));
    $response->assertOk();
    $response->assertSee('Edit Service Group');
});

// --- Team ---

test('admin team member edit renders', function () {
    $member = TeamMember::create(['name' => 'Jane Doe', 'role' => 'Director', 'display_order' => 1, 'is_active' => true]);

    $response = $this->actingAs(admin())->get(route('admin.cms.people.team.edit', $member));
    $response->assertOk();
    $response->assertSee('Team Member Profile');
});

// --- Testimonials ---

test('admin testimonials index renders', function () {
    $response = $this->actingAs(admin())->get(route('admin.cms.people.testimonials.index'));
    $response->assertOk();
    $response->assertSee('Testimonials');
});

test('admin testimonial edit renders', function () {
    $testimonial = Testimonial::create(['quote' => 'Great service.', 'client_name' => 'John Smith', 'display_order' => 1, 'is_active' => true]);

    $response = $this->actingAs(admin())->get(route('admin.cms.people.testimonials.edit', $testimonial));
    $response->assertOk();
    $response->assertSee('Client Testimonial');
});

// --- Trust / Organisations ---

test('admin organisation edit renders', function () {
    $organisation = Organisation::create(['name' => 'Chamber of Commerce', 'type' => 'partner', 'display_order' => 1, 'is_active' => true]);

    $response = $this->actingAs(admin())->get(route('admin.cms.trust.edit', $organisation));
    $response->assertOk();
    $response->assertSee('Organisation Details');
});

// --- Case Studies ---

test('admin case studies index renders', function () {
    $response = $this->actingAs(admin())->get(route('admin.cms.content.case-studies.index'));
    $response->assertOk();
    $response->assertSee('Case Studies');
});

// --- Insights ---

test('admin insights index renders', function () {
    $response = $this->actingAs(admin())->get(route('admin.cms.content.insights.index'));
    $response->assertOk();
    $response->assertSee('Insights');
});

// --- Careers ---

test('admin careers index renders', function () {
    $response = $this->actingAs(admin())->get(route('admin.cms.content.careers.index'));
    $response->assertOk();
    $response->assertSee('Career Opportunities');
});

test('admin career edit renders', function () {
    $career = \App\Models\CareerOpportunity::factory()->create();

    $response = $this->actingAs(admin())->get(route('admin.cms.content.careers.edit', $career));
    $response->assertOk();
    $response->assertSee('Opportunity Details');
});

// --- Footer links / social ---

test('admin footer link edit renders', function () {
    $link = FooterLink::create(['group' => 'company', 'label' => 'About', 'url' => '/about', 'display_order' => 1]);

    $response = $this->actingAs(admin())->get(route('admin.cms.footer.links.edit', $link));
    $response->assertOk();
    $response->assertSee('Edit Footer Link');
});

test('admin footer social index renders', function () {
    $response = $this->actingAs(admin())->get(route('admin.cms.footer.social.index'));
    $response->assertOk();
    $response->assertSee('Social Links');
});

test('admin footer social edit renders', function () {
    $social = SocialLink::create(['platform' => 'linkedin', 'url' => 'https://linkedin.com/company/test', 'display_order' => 1]);

    $response = $this->actingAs(admin())->get(route('admin.cms.footer.social.edit', $social));
    $response->assertOk();
    $response->assertSee('Edit Social Link');
});

// --- Compliance ---

test('admin compliance index renders', function () {
    $response = $this->actingAs(admin())->get(route('admin.cms.compliance.index'));
    $response->assertOk();
    $response->assertSee('Compliance Pages');
});

test('admin compliance page edit renders', function () {
    $admin = admin();
    $page = CompliancePage::create(['slug' => 'privacy-notice', 'title' => 'Privacy Notice', 'content' => 'Content.', 'created_by' => $admin->id, 'updated_by' => $admin->id]);

    $response = $this->actingAs($admin)->get(route('admin.cms.compliance.edit', $page));
    $response->assertOk();
    $response->assertSee('Page Details');
});

// --- Non-admin access control (spot check) ---

test('a non-admin cannot access admin investment records', function () {
    $user = User::factory()->create(['role' => 'investor']);

    $response = $this->actingAs($user)->get(route('admin.investments.index'));

    $response->assertForbidden();
});
