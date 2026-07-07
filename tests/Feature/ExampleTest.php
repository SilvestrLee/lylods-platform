<?php

use App\Models\Page;

it('returns a successful response', function () {
    Page::factory()->create([
        'slug' => 'home',
    ]);

    $response = $this->get('/');

    $response->assertStatus(200);
});
