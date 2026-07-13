<?php

use App\Mail\NewEnquiryReceived;
use App\Models\Enquiry;
use App\Models\Page;
use App\Models\SiteSetting;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Mail;

beforeEach(function () {
    SiteSetting::query()->delete();
    SiteSetting::create(['site_name' => 'The Lylods Group', 'primary_email' => 'admin@example.com']);
    Cache::forget('cms.site_settings');
});

function validEnquiryPayload(array $overrides = []): array
{
    return array_merge([
        'name'          => 'Jane Client',
        'email'         => 'jane@example.com',
        'enquiry_type'  => 'business-consultancy',
        'organisation'  => 'Acme Ltd',
        'message'       => 'We would like to discuss a project.',
        'website'       => '',
    ], $overrides);
}

test('a valid enquiry is persisted and queues a notification email', function () {
    Mail::fake();

    $response = $this->post(route('contact.store'), validEnquiryPayload());

    $response->assertRedirect(route('contact'));
    $response->assertSessionHas('enquiry_sent', true);

    $this->assertDatabaseHas('enquiries', [
        'name'  => 'Jane Client',
        'email' => 'jane@example.com',
    ]);

    Mail::assertQueued(NewEnquiryReceived::class);
});

test('validation failure re-displays the form with errors and does not persist', function () {
    $response = $this->post(route('contact.store'), validEnquiryPayload(['email' => 'not-an-email']));

    $response->assertSessionHasErrors('email');
    $this->assertDatabaseCount('enquiries', 0);
});

test('missing required fields are rejected', function () {
    $response = $this->post(route('contact.store'), validEnquiryPayload(['name' => '', 'message' => '']));

    $response->assertSessionHasErrors(['name', 'message']);
    $this->assertDatabaseCount('enquiries', 0);
});

test('an invalid enquiry_type is rejected', function () {
    $response = $this->post(route('contact.store'), validEnquiryPayload(['enquiry_type' => 'not-a-real-type']));

    $response->assertSessionHasErrors('enquiry_type');
    $this->assertDatabaseCount('enquiries', 0);
});

test('an overly long message is rejected', function () {
    $response = $this->post(route('contact.store'), validEnquiryPayload(['message' => str_repeat('a', 5001)]));

    $response->assertSessionHasErrors('message');
    $this->assertDatabaseCount('enquiries', 0);
});

test('a message at the maximum allowed length is accepted', function () {
    Mail::fake();

    $response = $this->post(route('contact.store'), validEnquiryPayload(['message' => str_repeat('a', 5000)]));

    $response->assertSessionHasNoErrors();
    $this->assertDatabaseCount('enquiries', 1);
});

test('submitting the honeypot field silently no-ops without persisting or emailing', function () {
    Mail::fake();

    $response = $this->post(route('contact.store'), validEnquiryPayload(['website' => 'http://spambot.example']));

    $response->assertRedirect(route('contact'));
    $response->assertSessionHas('enquiry_sent', true);
    $this->assertDatabaseCount('enquiries', 0);
    Mail::assertNothingSent();
});

test('two separate submissions from the same visitor are both recorded as distinct enquiries', function () {
    Mail::fake();

    $this->post(route('contact.store'), validEnquiryPayload());
    $this->post(route('contact.store'), validEnquiryPayload());

    $this->assertDatabaseCount('enquiries', 2);
});

test('the enquiry is still persisted even if email delivery fails', function () {
    Mail::shouldReceive('to->send')->andThrow(new \Exception('SMTP connection failed'));

    $response = $this->post(route('contact.store'), validEnquiryPayload());

    $response->assertRedirect(route('contact'));
    $response->assertSessionHas('enquiry_sent', true);
    $this->assertDatabaseCount('enquiries', 1);

    $enquiry = Enquiry::first();
    expect($enquiry->email_sent_at)->toBeNull();
});

test('the contact page reflects a successful submission via the session flag', function () {
    Page::factory()->create(['slug' => 'contact']);

    $response = $this->withSession(['enquiry_sent' => true])->get(route('contact'));

    $response->assertOk();
    $response->assertSee('submitted: true', false);
});

test('rate limiting throttles rapid repeated submissions', function () {
    Mail::fake();

    for ($i = 0; $i < 5; $i++) {
        $this->post(route('contact.store'), validEnquiryPayload());
    }

    $response = $this->post(route('contact.store'), validEnquiryPayload());

    $response->assertStatus(429);
});
