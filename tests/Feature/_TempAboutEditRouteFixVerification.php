<?php

use App\Models\Page;
use App\Models\User;

test('about admin editor renders without RouteNotFoundException', function () {
    $admin = User::factory()->create(['role' => 'admin']);
    $page = Page::factory()->create(['slug' => 'about']);

    $response = $this->actingAs($admin)->get(route('admin.cms.pages.edit', $page));

    $response->assertOk();
    $response->assertSee('Manage Team');
    $response->assertSee('Manage Accreditations');
});
