<?php

namespace App\Http\Controllers;

use App\Models\SiteSetting;
use App\Services\CMS\MediaService;
use App\Services\CMS\SiteSettingService;
use Illuminate\Http\Request;

class AdminSiteSettingController extends Controller
{
    private const LOGO_FILES = [
        'logo_file'          => 'logo_media_id',
        'logo_inverse_file'  => 'logo_inverse_media_id',
        'logo_dark_file'     => 'logo_dark_media_id',
        'logo_footer_file'   => 'logo_footer_media_id',
        'logo_email_file'    => 'logo_email_media_id',
        'logo_login_file'    => 'logo_login_media_id',
        'favicon_file'       => 'favicon_media_id',
        'apple_touch_file'   => 'apple_touch_media_id',
        'og_image_file'      => 'default_og_media_id',
        'twitter_card_file'  => 'twitter_card_media_id',
    ];

    public function __construct(
        private SiteSettingService $service,
        private MediaService $media,
    ) {}

    public function edit()
    {
        $setting = SiteSetting::with([
            'logo', 'logoInverse', 'logoDark', 'logoFooter', 'logoEmail', 'logoLogin',
            'favicon', 'appleTouch', 'defaultOgImage', 'twitterCard',
        ])->firstOrFail();

        return view('admin.cms.site-settings.edit', compact('setting'));
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'site_name'                => 'required|string|max:255',
            'short_name'               => 'nullable|string|max:100',
            'tagline'                  => 'nullable|string|max:500',
            'primary_email'            => 'nullable|email|max:255',
            'support_email'            => 'nullable|email|max:255',
            'enquiries_email'          => 'nullable|email|max:255',
            'phone'                    => 'nullable|string|max:50',
            'alternative_phone'        => 'nullable|string|max:50',
            'whatsapp'                 => 'nullable|string|max:50',
            'address'                  => 'nullable|string|max:500',
            'office_hours'             => 'nullable|string|max:255',
            'linkedin'                 => 'nullable|url|max:255',
            'facebook'                 => 'nullable|url|max:255',
            'instagram'                => 'nullable|url|max:255',
            'youtube'                  => 'nullable|url|max:255',
            'footer_text'              => 'nullable|string|max:1000',
            'copyright'                => 'nullable|string|max:255',
            'default_meta_title'       => 'nullable|string|max:255',
            'default_meta_description' => 'nullable|string|max:500',
            'logo_file'                => 'nullable|file|mimes:jpg,jpeg,png,webp,svg|max:2048',
            'logo_inverse_file'        => 'nullable|file|mimes:jpg,jpeg,png,webp,svg|max:2048',
            'logo_dark_file'           => 'nullable|file|mimes:jpg,jpeg,png,webp,svg|max:2048',
            'logo_footer_file'         => 'nullable|file|mimes:jpg,jpeg,png,webp,svg|max:2048',
            'logo_email_file'          => 'nullable|file|mimes:jpg,jpeg,png,webp,svg|max:2048',
            'logo_login_file'          => 'nullable|file|mimes:jpg,jpeg,png,webp,svg|max:2048',
            'favicon_file'             => 'nullable|file|mimes:ico,png,svg|max:512',
            'apple_touch_file'         => 'nullable|file|mimes:png|max:512',
            'og_image_file'            => 'nullable|file|mimes:jpg,jpeg,png,webp|max:4096',
            'twitter_card_file'        => 'nullable|file|mimes:jpg,jpeg,png,webp|max:4096',
        ]);

        $setting = SiteSetting::firstOrFail();

        foreach (self::LOGO_FILES as $field => $column) {
            if ($request->hasFile($field)) {
                $media         = $this->media->store($request->file($field), 'logos', auth()->id());
                $data[$column] = $media->id;
            }
            unset($data[$field]);
        }

        $this->service->update($setting, $data);

        return redirect()->route('admin.cms.site-settings.edit')
            ->with('success', 'Site settings updated.');
    }
}
