<?php

use App\Models\Page;
use App\Models\User;

/**
 * Renders each CMS-managed page's admin editor via GET and asserts 200.
 * This exists specifically to catch RouteNotFoundException-type bugs in the
 * "Managed Elsewhere" links and other route() calls inside each edit branch
 * — a broken route name in the About branch shipped undetected once because
 * no test rendered that view via GET (only a PATCH-redirect was covered).
 */
test('homepage admin editor renders without RouteNotFoundException', function () {
    $admin = User::factory()->create(['role' => 'admin']);
    $page = Page::factory()->create(['slug' => 'home']);

    $response = $this->actingAs($admin)->get(route('admin.cms.pages.edit', $page));

    $response->assertOk();
});

test('about admin editor renders without RouteNotFoundException', function () {
    $admin = User::factory()->create(['role' => 'admin']);
    $page = Page::factory()->create(['slug' => 'about']);

    $response = $this->actingAs($admin)->get(route('admin.cms.pages.edit', $page));

    $response->assertOk();
    $response->assertSee('Manage Team');
    $response->assertSee('Manage Accreditations');
});

test('services admin editor renders without RouteNotFoundException', function () {
    $admin = User::factory()->create(['role' => 'admin']);
    $page = Page::factory()->create(['slug' => 'services']);

    $response = $this->actingAs($admin)->get(route('admin.cms.pages.edit', $page));

    $response->assertOk();
    $response->assertSee('Manage Service Catalogue');
});
