<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\ServiceGroup;
use App\Services\CMS\MediaService;
use App\Services\CMS\ServiceService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminServiceController extends Controller
{
    public function __construct(
        private ServiceService $serviceService,
        private MediaService $media,
    ) {}

    public function index(ServiceGroup $serviceGroup)
    {
        $items = $serviceGroup->services()->orderBy('display_order')->get();
        return view('admin.cms.services.items.index', compact('serviceGroup', 'items'));
    }

    public function create(ServiceGroup $serviceGroup)
    {
        return view('admin.cms.services.items.create', compact('serviceGroup'));
    }

    public function store(Request $request, ServiceGroup $serviceGroup)
    {
        $data = $request->validate([
            'title'         => ['required', 'string', 'max:255'],
            'summary'       => ['nullable', 'string', 'max:500'],
            'display_order' => ['nullable', 'integer'],
            'is_active'     => ['nullable', 'boolean'],
            'image_file'    => ['nullable', 'file', 'mimes:jpg,jpeg,png,webp', 'max:4096'],
        ]);

        unset($data['image_file']);

        $data['display_order'] = $data['display_order'] ?? 0;
        $data['service_group_id'] = $serviceGroup->id;
        $data['slug'] = Str::slug($data['title']);
        $data['is_active'] = $request->boolean('is_active', true);
        $data['created_by'] = auth()->id();
        $data['updated_by'] = auth()->id();

        if ($request->hasFile('image_file')) {
            $data['image_media_id'] = $this->media->store($request->file('image_file'), 'services', auth()->id())->id;
        }

        Service::create($data);
        $this->serviceService->flush($serviceGroup->slug);

        return redirect()->route('admin.cms.services.items.index', $serviceGroup)
            ->with('success', "Service item created.");
    }

    public function edit(ServiceGroup $serviceGroup, Service $service)
    {
        return view('admin.cms.services.items.edit', compact('serviceGroup', 'service'));
    }

    public function update(Request $request, ServiceGroup $serviceGroup, Service $service)
    {
        $data = $request->validate([
            'title'         => ['required', 'string', 'max:255'],
            'summary'       => ['nullable', 'string', 'max:500'],
            'display_order' => ['nullable', 'integer'],
            'is_active'     => ['nullable', 'boolean'],
            'image_file'    => ['nullable', 'file', 'mimes:jpg,jpeg,png,webp', 'max:4096'],
            'remove_image'  => ['nullable', 'boolean'],
        ]);

        unset($data['image_file'], $data['remove_image']);

        $data['display_order'] = $data['display_order'] ?? 0;
        $data['is_active'] = $request->boolean('is_active');
        $data['updated_by'] = auth()->id();

        if ($request->hasFile('image_file')) {
            $data['image_media_id'] = $this->media->store($request->file('image_file'), 'services', auth()->id())->id;
        } elseif ($request->boolean('remove_image')) {
            $data['image_media_id'] = null;
        }

        $this->serviceService->updateService($service, $data);

        return redirect()->route('admin.cms.services.items.index', $serviceGroup)
            ->with('success', "Service item updated.");
    }
}
