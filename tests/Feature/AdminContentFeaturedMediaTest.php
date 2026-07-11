<?php

use App\Models\CaseStudy;
use App\Models\Insight;
use App\Models\Media;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

function draftCaseStudy(array $overrides = []): CaseStudy
{
    return CaseStudy::create(array_merge([
        'title' => 'A Draft Case Study',
        'slug' => 'a-draft-case-study',
        'status' => 'draft',
    ], $overrides));
}

function draftInsight(array $overrides = []): Insight
{
    return Insight::create(array_merge([
        'title' => 'A Draft Insight',
        'slug' => 'a-draft-insight',
        'status' => 'draft',
    ], $overrides));
}

test('case study admin editor renders the featured image panel', function () {
    $admin = User::factory()->create(['role' => 'admin']);
    $caseStudy = draftCaseStudy();

    $response = $this->actingAs($admin)->get(route('admin.cms.content.case-studies.edit', $caseStudy));

    $response->assertOk();
    $response->assertSee('Featured Image');
    $response->assertSee('action="' . route('admin.cms.content.case-studies.update', $caseStudy) . '"', false);
});

test('admin can upload and remove a case study featured image', function () {
    Storage::fake('public');

    $admin = User::factory()->create(['role' => 'admin']);
    $caseStudy = draftCaseStudy();

    $upload = $this->actingAs($admin)->patch(route('admin.cms.content.case-studies.update', $caseStudy), [
        'title' => $caseStudy->title,
        'slug' => $caseStudy->slug,
        'featured_media_file' => UploadedFile::fake()->image('case-study.jpg'),
        'sitemap_include' => '1',
    ]);

    $upload->assertRedirect(route('admin.cms.content.case-studies.edit', $caseStudy));

    $caseStudy->refresh();
    expect($caseStudy->featured_media_id)->not->toBeNull();

    $removal = $this->actingAs($admin)->patch(route('admin.cms.content.case-studies.update', $caseStudy), [
        'title' => $caseStudy->title,
        'slug' => $caseStudy->slug,
        'remove_featured_media' => '1',
        'sitemap_include' => '1',
    ]);

    $removal->assertRedirect(route('admin.cms.content.case-studies.edit', $caseStudy));
    expect($caseStudy->refresh()->featured_media_id)->toBeNull();
});

test('insight admin editor renders the featured image panel', function () {
    $admin = User::factory()->create(['role' => 'admin']);
    $insight = draftInsight();

    $response = $this->actingAs($admin)->get(route('admin.cms.content.insights.edit', $insight));

    $response->assertOk();
    $response->assertSee('Featured Image');
    $response->assertSee('action="' . route('admin.cms.content.insights.update', $insight) . '"', false);
});

test('admin can upload and remove an insight featured image', function () {
    Storage::fake('public');

    $admin = User::factory()->create(['role' => 'admin']);
    $insight = draftInsight();

    $upload = $this->actingAs($admin)->patch(route('admin.cms.content.insights.update', $insight), [
        'title' => $insight->title,
        'slug' => $insight->slug,
        'featured_media_file' => UploadedFile::fake()->image('insight.jpg'),
        'sitemap_include' => '1',
    ]);

    $upload->assertRedirect(route('admin.cms.content.insights.edit', $insight));

    $insight->refresh();
    expect($insight->featured_media_id)->not->toBeNull();

    $removal = $this->actingAs($admin)->patch(route('admin.cms.content.insights.update', $insight), [
        'title' => $insight->title,
        'slug' => $insight->slug,
        'remove_featured_media' => '1',
        'sitemap_include' => '1',
    ]);

    $removal->assertRedirect(route('admin.cms.content.insights.edit', $insight));
    expect($insight->refresh()->featured_media_id)->toBeNull();
});
