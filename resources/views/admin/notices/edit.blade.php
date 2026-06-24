<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <p class="text-sm font-semibold uppercase tracking-[0.22em] text-[#c9a24d]">
                    Investor Notices
                </p>
                <h2 class="mt-1 font-serif text-2xl font-bold text-[#07172f]">
                    Edit Notice
                </h2>
            </div>

            <a href="{{ route('admin.notices.index') }}"
               class="rounded-full border border-[#d0d5dd] bg-white px-5 py-2 text-sm font-semibold text-[#07172f] shadow-sm hover:bg-[#f7f3ea]">
                Back to Notices
            </a>
        </div>
    </x-slot>

    <x-admin-dashboard-shell>
        <div class="overflow-hidden rounded-[2rem] bg-white shadow-sm ring-1 ring-[#e6e8ee]">
            <div class="border-b border-[#e6e8ee] p-6">
                <p class="text-sm font-bold uppercase tracking-[0.22em] text-[#123f8c]">
                    Existing Notice
                </p>

                <h1 class="mt-2 text-2xl font-bold text-[#07172f]">
                    Update Investor Notice
                </h1>

                <p class="mt-2 text-sm leading-6 text-[#667085]">
                    Edit the notice content and choose whether it should be published to investor dashboard users.
                </p>
            </div>

            <form method="POST" action="{{ route('admin.notices.update', $notice) }}" class="p-6">
                @csrf
                @method('PATCH')

                <div class="grid gap-6">
                    <div>
                        <label for="title" class="block text-sm font-semibold text-[#07172f]">
                            Notice Title
                        </label>

                        <input id="title"
                               name="title"
                               type="text"
                               value="{{ old('title', $notice->title) }}"
                               required
                               class="mt-2 block w-full rounded-2xl border-[#d0d5dd] shadow-sm focus:border-[#123f8c] focus:ring-[#123f8c]">

                        @error('title')
                            <p class="mt-2 text-sm font-semibold text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="body" class="block text-sm font-semibold text-[#07172f]">
                            Notice Body
                        </label>

                        <textarea id="body"
                                  name="body"
                                  rows="8"
                                  required
                                  class="mt-2 block w-full rounded-2xl border-[#d0d5dd] shadow-sm focus:border-[#123f8c] focus:ring-[#123f8c]">{{ old('body', $notice->body) }}</textarea>

                        @error('body')
                            <p class="mt-2 text-sm font-semibold text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <label class="flex items-start gap-3 rounded-2xl bg-[#f8fafc] p-4">
                        <input type="checkbox"
                               name="is_published"
                               value="1"
                               @checked(old('is_published', $notice->is_published))
                               class="mt-1 rounded border-[#d0d5dd] text-[#07172f] focus:ring-[#123f8c]">

                        <span>
                            <span class="block text-sm font-bold text-[#07172f]">
                                Publish Notice
                            </span>
                            <span class="mt-1 block text-sm leading-6 text-[#667085]">
                                Published notices will appear on investor dashboards. Uncheck to save this notice as draft.
                            </span>
                        </span>
                    </label>

                    <div class="rounded-2xl bg-[#f8fafc] p-5">
                        <p class="text-sm font-bold text-[#07172f]">
                            Notice Status
                        </p>

                        <p class="mt-2 text-sm leading-6 text-[#667085]">
                            Current status:
                            @if ($notice->is_published)
                                <span class="font-bold text-green-700">Published</span>
                            @else
                                <span class="font-bold text-slate-700">Draft</span>
                            @endif
                        </p>

                        <p class="mt-1 text-sm leading-6 text-[#667085]">
                            Published date:
                            {{ $notice->published_at ? $notice->published_at->format('M d, Y') : 'Not published yet' }}
                        </p>
                    </div>
                </div>

                <div class="mt-8 flex flex-col-reverse gap-3 sm:flex-row sm:items-center sm:justify-end">
                    <a href="{{ route('admin.notices.index') }}"
                       class="rounded-full border border-[#d0d5dd] bg-white px-6 py-3 text-center text-sm font-bold text-[#07172f] hover:bg-[#f7f3ea]">
                        Cancel
                    </a>

                    <button type="submit"
                            class="rounded-full bg-[#07172f] px-6 py-3 text-sm font-bold text-white hover:bg-[#123f8c]">
                        Update Notice
                    </button>
                </div>
            </form>
        </div>
    </x-admin-dashboard-shell>
</x-app-layout>
