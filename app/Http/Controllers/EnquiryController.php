<?php

namespace App\Http\Controllers;

use App\Mail\NewEnquiryReceived;
use App\Models\Enquiry;
use App\Services\CMS\SiteSettingService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;

class EnquiryController extends Controller
{
    public function __construct(private SiteSettingService $siteSettingService)
    {
    }

    public function store(Request $request): RedirectResponse
    {
        // Honeypot: a hidden field real visitors never see or fill. If it arrives
        // non-empty, silently pretend success without persisting or emailing.
        if (filled($request->input('website'))) {
            return redirect()->route('contact')->with('enquiry_sent', true);
        }

        $validated = $request->validate([
            'name'          => ['required', 'string', 'max:150'],
            'email'         => ['required', 'email', 'max:255'],
            'enquiry_type'  => ['required', Rule::in(Enquiry::TYPES)],
            'organisation'  => ['nullable', 'string', 'max:150'],
            'message'       => ['required', 'string', 'max:5000'],
        ]);

        $enquiry = Enquiry::create([
            ...$validated,
            'ip_address' => $request->ip(),
        ]);

        $adminEmail = $this->siteSettingService->current()->primary_email
            ?? config('mail.from.address');

        try {
            Mail::to($adminEmail)->send(new NewEnquiryReceived($enquiry));
            $enquiry->update(['email_sent_at' => now()]);
        } catch (\Throwable $e) {
            Log::error('Enquiry notification email failed to send.', [
                'enquiry_id' => $enquiry->id,
                'error'      => $e->getMessage(),
            ]);
        }

        return redirect()->route('contact')->with('enquiry_sent', true);
    }
}
