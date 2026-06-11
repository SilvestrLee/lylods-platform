<?php

namespace App\Http\Controllers;

use App\Models\Notice;
use Illuminate\Http\Request;

class AdminNoticeController extends Controller
{
    public function index()
    {
        $notices = Notice::with('creator')
            ->latest()
            ->get();

        return view('admin.notices.index', [
            'notices' => $notices,
        ]);
    }

    public function create()
    {
        return view('admin.notices.create');
    }

    public function store(Request $request)
    {
        $validated = $this->validateNotice($request);

        $validated['created_by'] = auth()->id();
        $validated['is_published'] = $request->boolean('is_published');
        $validated['published_at'] = $validated['is_published'] ? now() : null;

        Notice::create($validated);

        return redirect()
            ->route('admin.notices.index')
            ->with('success', 'Notice created successfully.');
    }

    public function edit(Notice $notice)
    {
        return view('admin.notices.edit', [
            'notice' => $notice,
        ]);
    }

    public function update(Request $request, Notice $notice)
    {
        $validated = $this->validateNotice($request);

        $wasPublished = $notice->is_published;
        $validated['is_published'] = $request->boolean('is_published');

        if ($validated['is_published'] && ! $wasPublished) {
            $validated['published_at'] = now();
        }

        if (! $validated['is_published']) {
            $validated['published_at'] = null;
        }

        $notice->update($validated);

        return redirect()
            ->route('admin.notices.index')
            ->with('success', 'Notice updated successfully.');
    }

    private function validateNotice(Request $request): array
    {
        return $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'body' => ['required', 'string'],
            'is_published' => ['nullable', 'boolean'],
        ]);
    }
}