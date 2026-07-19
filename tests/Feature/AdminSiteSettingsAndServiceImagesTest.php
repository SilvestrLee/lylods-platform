<?php

use App\Models\Service;
use App\Models\ServiceGroup;
use App\Models\SiteSetting;
use App\Models\User;
use Illuminate\Http\UploadedFile;

test('admin site settings edit page renders with contact fields', function () {
    $admin = User::factory()->create(['role' => 'admin']);
    SiteSetting::firstOrCreate([], ['site_name' => 'The Lylods Group']);

    $response = $this->actingAs($admin)->get(route('admin.cms.site-settings.edit'));

    $response->assertOk();
    $response->assertSee('Site Settings');
    $response->assertSee('name="primary_email"', false);
    $response->assertSee('name="support_email"', false);
    $response->assertSee('name="enquiries_email"', false);
    $response->assertSee('name="phone"', false);
    $response->assertSee('name="alternative_phone"', false);
});

test('admin can update the new site settings contact fields', function () {
    $admin = User::factory()->create(['role' => 'admin']);
    $setting = SiteSetting::firstOrCreate([], ['site_name' => 'The Lylods Group']);

    $response = $this->actingAs($admin)->patch(route('admin.cms.site-settings.update'), [
        'site_name'         => 'The Lylods Group',
        'primary_email'     => 'sample@thelylodsgroup.com',
        'support_email'     => 'support@thelylodsgroup.com',
        'enquiries_email'   => 'info@thelylodsgroup.com',
        'phone'             => '012345678',
        'alternative_phone' => '098765432',
        'address'           => 'The Lylods Group, Business District, United Kingdom',
        'office_hours'      => 'Monday - Friday, 9:00 AM - 5:00 PM',
    ]);

    $response->assertRedirect(route('admin.cms.site-settings.edit'));
    $response->assertSessionHas('success');

    $setting->refresh();
    expect($setting->support_email)->toBe('support@thelylodsgroup.com');
    expect($setting->enquiries_email)->toBe('info@thelylodsgroup.com');
    expect($setting->alternative_phone)->toBe('098765432');
});

test('admin service item create and edit pages render with the image field', function () {
    $admin = User::factory()->create(['role' => 'admin']);
    $group = ServiceGroup::create(['name' => 'Business & Technology', 'slug' => 'business-technology', 'display_order' => 1, 'is_active' => true]);
    $service = Service::create(['service_group_id' => $group->id, 'title' => 'Digital Transformation', 'slug' => 'digital-transformation', 'display_order' => 1, 'is_active' => true]);

    $createResponse = $this->actingAs($admin)->get(route('admin.cms.services.items.create', $group));
    $createResponse->assertOk();
    $createResponse->assertSee('Thumbnail Image');

    $editResponse = $this->actingAs($admin)->get(route('admin.cms.services.items.edit', [$group, $service]));
    $editResponse->assertOk();
    $editResponse->assertSee('Thumbnail Image');
});

test('admin can upload and remove a service item image', function () {
    $admin = User::factory()->create(['role' => 'admin']);
    $group = ServiceGroup::create(['name' => 'Business & Technology', 'slug' => 'business-technology', 'display_order' => 1, 'is_active' => true]);
    $service = Service::create(['service_group_id' => $group->id, 'title' => 'Digital Transformation', 'slug' => 'digital-transformation', 'display_order' => 1, 'is_active' => true]);

    $upload = $this->actingAs($admin)->patch(route('admin.cms.services.items.update', [$group, $service]), [
        'title'         => $service->title,
        'display_order' => 1,
        'is_active'     => '1',
        'image_file'    => UploadedFile::fake()->image('service.jpg', 400, 300),
    ]);

    $upload->assertRedirect(route('admin.cms.services.items.index', $group));
    $service->refresh();
    expect($service->image_media_id)->not->toBeNull();

    $remove = $this->actingAs($admin)->patch(route('admin.cms.services.items.update', [$group, $service]), [
        'title'         => $service->title,
        'display_order' => 1,
        'is_active'     => '1',
        'remove_image'  => '1',
    ]);

    $remove->assertRedirect(route('admin.cms.services.items.index', $group));
    $service->refresh();
    expect($service->image_media_id)->toBeNull();
});

test('a non-admin cannot access service item admin screens', function () {
    $user = User::factory()->create(['role' => 'investor']);
    $group = ServiceGroup::create(['name' => 'Business & Technology', 'slug' => 'business-technology', 'display_order' => 1, 'is_active' => true]);

    $response = $this->actingAs($user)->get(route('admin.cms.services.items.create', $group));

    $response->assertForbidden();
});
