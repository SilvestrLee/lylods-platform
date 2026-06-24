<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-4">
            <div>
                <p class="text-sm font-semibold uppercase tracking-[0.2em] text-[#c9a24d]">Investor Portal</p>
                <h2 class="mt-1 font-serif text-2xl font-bold text-[#07172f]">Profile &amp; Security</h2>
            </div>
        </div>
    </x-slot>

    <x-user-dashboard-shell :notice-count="0">
        <div class="space-y-5">
            @include('profile.partials.update-profile-information-form')
            @include('profile.partials.update-password-form')
            @include('profile.partials.delete-user-form')
        </div>
    </x-user-dashboard-shell>
</x-app-layout>
