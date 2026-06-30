<?php

namespace App\Http\Controllers;

use App\Models\SiteSetting;
use App\Services\CMS\SiteSettingService;
use Illuminate\Http\Request;

class AdminSiteSettingController extends Controller
{
    public function __construct(private SiteSettingService $service) {}

    public function edit()
    {
        $setting = SiteSetting::firstOrFail();
        return view('admin.cms.site-settings.edit', compact('setting'));
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'site_name'                => 'required|string|max:255',
            'tagline'                  => 'nullable|string|max:500',
            'primary_email'            => 'nullable|email|max:255',
            'phone'                    => 'nullable|string|max:50',
            'address'                  => 'nullable|string|max:500',
            'office_hours'             => 'nullable|string|max:255',
            'footer_text'              => 'nullable|string|max:1000',
            'copyright'                => 'nullable|string|max:255',
            'default_meta_title'       => 'nullable|string|max:255',
            'default_meta_description' => 'nullable|string|max:500',
        ]);

        $setting = SiteSetting::firstOrFail();
        $this->service->update($setting, $data);

        return redirect()->route('admin.cms.site-settings.edit')
            ->with('success', 'Site settings updated.');
    }
}
