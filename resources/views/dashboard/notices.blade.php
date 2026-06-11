<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-[#07172f]">
            Notices
        </h2>
    </x-slot>

    <div class="py-10 bg-[#f7f3ea] min-h-screen">
        <div class="mx-auto max-w-5xl px-6">

            <div class="space-y-6">

                @forelse($notices as $notice)

                    <div class="rounded-3xl bg-white p-8 shadow-sm ring-1 ring-[#e6e8ee]">

                        <div class="flex items-center justify-between">

                            <h3 class="text-xl font-bold text-[#07172f]">
                                {{ $notice->title }}
                            </h3>

                            <span class="text-sm font-semibold text-[#c9a24d]">
                                {{ optional($notice->published_at)->format('M d, Y') }}
                            </span>

                        </div>

                        <div class="mt-4 leading-8 text-[#667085]">
                            {{ $notice->body }}
                        </div>

                    </div>

                @empty

                    <div class="rounded-3xl bg-white p-8 shadow-sm">
                        No notices available.
                    </div>

                @endforelse

            </div>

            <div class="mt-8">
                {{ $notices->links() }}
            </div>

        </div>
    </div>
</x-app-layout>