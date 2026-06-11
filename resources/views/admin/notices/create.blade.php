<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <p class="text-sm font-semibold uppercase tracking-[0.22em] text-[#c9a24d]">
                    Investor Notices
                </p>
                <h2 class="mt-1 font-serif text-2xl font-bold text-[#07172f]">
                    Add Notice
                </h2>
            </div>

            <div class="flex flex-wrap gap-3">
                <a href="{{ route('admin.notices.index') }}"
                   class="rounded-full border border-[#d0d5dd] bg-white px-5 py-2 text-sm font-semibold text-[#07172f] shadow-sm hover:bg-[#f7f3ea]">
                    Back to Notices
                </a>
            </div>
        </div>
    </x-slot>

    <div class="bg-[#f7f3ea] py-10">
        <div class="mx-auto max-w-4xl px-6">
            <div class="overflow-hidden rounded-[2rem] bg-white shadow-sm ring-1 ring-[#e6e8ee]">
                <div class="border-b border-[#e6e8ee] p-6">
                    <p class="text-sm font-bold uppercase tracking-[0.22em] text-[#123f8c]">
                        New Notice
                    </p>

                    <h1 class="mt-2 text-2xl font-bold text-[#07172f]">
                        Create Investor Notice
                    </h1>

                    <p class="mt-2 text-sm leading-6 text-[#667085]">
                        Create a notice that can be published to investor dashboard users.
                    </p>
                </div>

                <form method="POST" action="{{ route('admin.notices.store') }}" class="p-6">
                    @csrf

                    <div class="grid gap-6">
                        <div>
                            <label for="title" class="block text-sm font-semibold text-[#07172f]">
                                Notice Title
                            </label>

                            <input id="title"
                                   name="title"
                                   type="text"
                                   value="{{ old('title') }}"
                                   required
                                   class="mt-2 block w-full rounded-2xl border-[#d0d5dd] shadow-sm focus:border-[#123f8c] focus:ring-[#123f8c]"
                                   placeholder="e.g. Investment update notice">

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
                                      class="mt-2 block w-full rounded-2xl border-[#d0d5dd] shadow-sm focus:border-[#123f8c] focus:ring-[#123f8c]"
                                      placeholder="Write the full notice message here.">{{ old('body') }}</textarea>

                            @error('body')
                                <p class="mt-2 text-sm font-semibold text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <label class="flex items-start gap-3 rounded-2xl bg-[#f8fafc] p-4">
                            <input type="checkbox"
                                   name="is_published"
                                   value="1"
                                   class="mt-1 rounded border-[#d0d5dd] text-[#07172f] focus:ring-[#123f8c]">

                            <span>
                                <span class="block text-sm font-bold text-[#07172f]">
                                    Publish Notice
                                </span>
                                <span class="mt-1 block text-sm leading-6 text-[#667085]">
                                    Published notices will appear on investor dashboards. Leave unchecked to save as draft.
                                </span>
                            </span>
                        </label>
                    </div>

                    <div class="mt-8 flex flex-col-reverse gap-3 sm:flex-row sm:items-center sm:justify-end">
                        <a href="{{ route('admin.notices.index') }}"
                           class="rounded-full border border-[#d0d5dd] bg-white px-6 py-3 text-center text-sm font-bold text-[#07172f] hover:bg-[#f7f3ea]">
                            Cancel
                        </a>

                        <button type="submit"
                                class="rounded-full bg-[#07172f] px-6 py-3 text-sm font-bold text-white hover:bg-[#123f8c]">
                            Save Notice
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
