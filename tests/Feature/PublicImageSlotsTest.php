<?php

use App\Models\PublicImageSlot;
use App\Support\PublicImageSlots;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('registers all editorial image slots on migration', function () {
    expect(PublicImageSlot::count())->toBe(count(PublicImageSlots::definitions()));
    expect(PublicImageSlot::where('key', 'insights.featured')->exists())->toBeTrue();
    expect(PublicImageSlot::where('key', 'services.group.1')->exists())->toBeTrue();
});

it('leaves empty media slots without any broken image url', function () {
    expect(PublicImageSlots::url('case-studies.example.1'))->toBeNull();
});

it('protects public image slot management from unauthenticated visitors', function () {
    $this->get(route('admin.cms.image-slots.index'))->assertRedirect();
});
