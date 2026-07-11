<?php

use App\Models\Media;
use App\Models\Page;
use App\Models\PageCommunityAudienceTag;
use App\Models\PageCommunityEngagementCard;
use App\Models\PageCommunityHowWorkStep;
use App\Models\PageCommunityRoleStep;
use App\Models\PageCommunitySupportCard;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

function communityProjectsPage(array $overrides = []): Page
{
    return Page::factory()->create(array_merge(['slug' => 'community-projects'], $overrides));
}

test('community projects page renders with fallback content when the database has no rows', function () {
    communityProjectsPage();

    $response = $this->get(route('community-projects'));

    $response->assertOk();
    $response->assertSee('Community Programmes');
    $response->assertSee('Practical support across every stage of a community programme.');
    $response->assertSee('Community organisations');
    $response->assertSee('We help you move from idea to action.');
    $response->assertSee('Understand the purpose');
    $response->assertSee('Community training programme');
    $response->assertSee('Planning a community-focused project?');
});

test('community projects page renders database-managed support cards when present', function () {
    $page = communityProjectsPage();

    PageCommunitySupportCard::factory()->create([
        'page_id' => $page->id,
        'order' => 1,
        'icon' => 'cog',
        'title' => 'Custom Support Card',
        'description' => 'Custom support description.',
        'visibility' => true,
    ]);

    $response = $this->get(route('community-projects'));

    $response->assertOk();
    $response->assertSee('Custom Support Card');
    $response->assertSee('Custom support description.');
});

test('community projects page hides non-visible repeatable rows', function () {
    $page = communityProjectsPage();

    PageCommunityAudienceTag::factory()->create([
        'page_id' => $page->id,
        'order' => 1,
        'label' => 'Hidden Audience Tag',
        'visibility' => false,
    ]);

    $response = $this->get(route('community-projects'));

    $response->assertOk();
    $response->assertDontSee('Hidden Audience Tag');
});

test('community projects page respects the order column for repeatable rows', function () {
    $page = communityProjectsPage();

    PageCommunityHowWorkStep::factory()->create(['page_id' => $page->id, 'order' => 2, 'title' => 'Second Step', 'visibility' => true]);
    PageCommunityHowWorkStep::factory()->create(['page_id' => $page->id, 'order' => 1, 'title' => 'First Step', 'visibility' => true]);

    $response = $this->get(route('community-projects'));

    $response->assertOk();
    $content = $response->getContent();
    expect(strpos($content, 'First Step'))->toBeLessThan(strpos($content, 'Second Step'));
});

test('admin can update community projects page scalar fields and repeatable sections', function () {
    $admin = User::factory()->create(['role' => 'admin']);
    $page = communityProjectsPage();

    $response = $this->actingAs($admin)->patch(route('admin.cms.pages.update', $page), [
        'title' => $page->title,
        'hero_title' => $page->hero_title,
        'hero_subtitle' => $page->hero_subtitle,
        'hero_description' => $page->hero_description,
        'community_support_heading' => 'Updated Support Heading',
        'community_support_cards' => [
            ['icon' => 'cog', 'title' => 'Updated Support Card', 'description' => 'Updated support description.', 'visibility' => '1'],
        ],
        'community_audience_heading' => 'Updated Audience Heading',
        'community_audience_tags' => [
            ['icon' => 'heart', 'label' => 'Updated Tag', 'visibility' => '1'],
        ],
        'community_role_heading' => 'Updated Role Heading',
        'community_role_steps' => [
            ['description' => 'Updated role step description.', 'visibility' => '1'],
        ],
        'community_how_work_heading' => 'Updated How We Work Heading',
        'community_how_work_steps' => [
            ['title' => 'Updated Step', 'description' => 'Updated step description.', 'visibility' => '1'],
        ],
        'community_engagement_heading' => 'Updated Engagement Heading',
        'community_engagement_cards' => [
            ['icon' => 'cog', 'title' => 'Updated Engagement Card', 'description' => 'Updated engagement description.', 'visibility' => '1'],
        ],
        'community_page_cta_heading' => 'Updated CTA Heading',
        'sitemap_include' => '1',
        'is_published' => '1',
    ]);

    $response->assertRedirect(route('admin.cms.pages.edit', $page));
    $response->assertSessionHas('success');

    $page->refresh();

    expect($page->community_support_heading)->toBe('Updated Support Heading');
    expect($page->community_audience_heading)->toBe('Updated Audience Heading');
    expect($page->community_role_heading)->toBe('Updated Role Heading');
    expect($page->community_how_work_heading)->toBe('Updated How We Work Heading');
    expect($page->community_engagement_heading)->toBe('Updated Engagement Heading');
    expect($page->community_page_cta_heading)->toBe('Updated CTA Heading');

    expect(PageCommunitySupportCard::where('page_id', $page->id)->where('order', 1)->first()->title)->toBe('Updated Support Card');
    expect(PageCommunityAudienceTag::where('page_id', $page->id)->where('order', 1)->first()->label)->toBe('Updated Tag');
    expect(PageCommunityRoleStep::where('page_id', $page->id)->where('order', 1)->first()->description)->toBe('Updated role step description.');
    expect(PageCommunityHowWorkStep::where('page_id', $page->id)->where('order', 1)->first()->title)->toBe('Updated Step');
    expect(PageCommunityEngagementCard::where('page_id', $page->id)->where('order', 1)->first()->title)->toBe('Updated Engagement Card');
});

test('a non-admin cannot update the community projects page', function () {
    $user = User::factory()->create(['role' => 'investor']);
    $page = communityProjectsPage();

    $response = $this->actingAs($user)->patch(route('admin.cms.pages.update', $page), [
        'title' => $page->title,
    ]);

    $response->assertForbidden();
});

test('admin can upload and remove the community projects audience and role images', function () {
    Storage::fake('public');

    $admin = User::factory()->create(['role' => 'admin']);
    $page = communityProjectsPage();

    $upload = $this->actingAs($admin)->patch(route('admin.cms.pages.update', $page), [
        'title' => $page->title,
        'hero_title' => $page->hero_title,
        'community_audience_media_file' => UploadedFile::fake()->image('audience.jpg'),
        'community_role_media_file' => UploadedFile::fake()->image('role.jpg'),
        'sitemap_include' => '1',
        'is_published' => '1',
    ]);

    $upload->assertRedirect(route('admin.cms.pages.edit', $page));

    $page->refresh();
    expect($page->community_audience_media_id)->not->toBeNull();
    expect($page->community_role_media_id)->not->toBeNull();

    $removal = $this->actingAs($admin)->patch(route('admin.cms.pages.update', $page), [
        'title' => $page->title,
        'hero_title' => $page->hero_title,
        'remove_community_audience_media' => '1',
        'remove_community_role_media' => '1',
        'sitemap_include' => '1',
        'is_published' => '1',
    ]);

    $removal->assertRedirect(route('admin.cms.pages.edit', $page));
    $page->refresh();
    expect($page->community_audience_media_id)->toBeNull();
    expect($page->community_role_media_id)->toBeNull();
});

test('admin can upload and remove a community projects engagement card image', function () {
    Storage::fake('public');

    $admin = User::factory()->create(['role' => 'admin']);
    $page = communityProjectsPage();

    $upload = $this->actingAs($admin)->patch(route('admin.cms.pages.update', $page), [
        'title' => $page->title,
        'hero_title' => $page->hero_title,
        'community_engagement_cards' => [
            ['title' => 'Community training programme', 'icon' => 'academic-cap', 'visibility' => '1', 'image_file' => UploadedFile::fake()->image('engagement.jpg'), 'image_alt' => 'Training session'],
        ],
        'sitemap_include' => '1',
        'is_published' => '1',
    ]);

    $upload->assertRedirect(route('admin.cms.pages.edit', $page));

    $card = PageCommunityEngagementCard::where('page_id', $page->id)->where('order', 1)->first();
    expect($card->image_media_id)->not->toBeNull();
    expect($card->image_alt)->toBe('Training session');

    $removal = $this->actingAs($admin)->patch(route('admin.cms.pages.update', $page), [
        'title' => $page->title,
        'hero_title' => $page->hero_title,
        'community_engagement_cards' => [
            ['title' => 'Community training programme', 'icon' => 'academic-cap', 'visibility' => '1', 'remove_image' => '1'],
        ],
        'sitemap_include' => '1',
        'is_published' => '1',
    ]);

    $removal->assertRedirect(route('admin.cms.pages.edit', $page));
    expect($card->refresh()->image_media_id)->toBeNull();
});

test('community projects engagement card renders its image when present', function () {
    $page = communityProjectsPage();
    $media = Media::factory()->create(['alt_text' => 'Training session photo']);

    PageCommunityEngagementCard::factory()->create([
        'page_id' => $page->id,
        'order' => 1,
        'title' => 'Community training programme',
        'icon' => 'academic-cap',
        'image_media_id' => $media->id,
        'image_alt' => 'Training session photo',
        'visibility' => true,
    ]);

    $response = $this->get(route('community-projects'));

    $response->assertOk();
    $response->assertSee($media->url(), false);
    $response->assertSee('Training session photo', false);
});
