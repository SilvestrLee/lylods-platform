<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <p class="text-sm font-semibold uppercase tracking-[0.22em] text-[#c9a24d]">Investor Accounts</p>
                <h2 class="mt-1 font-serif text-2xl font-bold text-[#07172f]">Edit Investor Account</h2>
            </div>
            <a href="{{ route('admin.investors.index') }}"
               class="inline-flex items-center gap-2 rounded-full border border-[#d0d5dd] bg-white px-5 py-2 text-sm font-semibold text-[#07172f] shadow-sm hover:bg-[#f7f3ea]">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18"/>
                </svg>
                Back to Investors
            </a>
        </div>
    </x-slot>

    <x-admin-dashboard-shell>
        <x-slot name="breadcrumbs">
            <x-breadcrumbs :crumbs="[
                ['label' => 'Investors', 'url' => route('admin.investors.index')],
                ['label' => 'Edit Investor'],
            ]" />
        </x-slot>

        <div class="overflow-hidden rounded-[2rem] bg-white shadow-sm ring-1 ring-[#e6e8ee]">
            <div class="border-b border-[#e6e8ee] p-6">
                <p class="text-sm font-bold uppercase tracking-[0.22em] text-[#123f8c]">Existing Investor</p>
                <h1 class="mt-2 text-2xl font-bold text-[#07172f]">Update Investor Login</h1>
                <p class="mt-2 text-sm leading-6 text-[#667085]">
                    Update investor account details. Leave the password fields empty to keep the current password.
                </p>
            </div>

            <form method="POST"
                  action="{{ route('admin.investors.update', $investor) }}"
                  class="p-6"
                  x-data="{ loading: false }"
                  @submit="loading = true">
                @csrf
                @method('PATCH')

                <div class="grid gap-6">
                    <div>
                        <label for="name" class="block text-sm font-semibold text-[#07172f]">Full Name</label>
                        <input id="name" name="name" type="text" value="{{ old('name', $investor->name) }}" required
                               class="mt-2 block w-full rounded-2xl border-[#d0d5dd] shadow-sm focus:border-[#123f8c] focus:ring-[#123f8c]">
                        @error('name')
                            <p class="mt-2 text-sm font-semibold text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-semibold text-[#07172f]">Email Address</label>
                        <input id="email" name="email" type="email" value="{{ old('email', $investor->email) }}" required
                               class="mt-2 block w-full rounded-2xl border-[#d0d5dd] shadow-sm focus:border-[#123f8c] focus:ring-[#123f8c]">
                        @error('email')
                            <p class="mt-2 text-sm font-semibold text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="rounded-2xl bg-[#f8fafc] p-5">
                        <p class="text-sm font-bold text-[#07172f]">Password Update</p>
                        <p class="mt-2 text-sm leading-6 text-[#667085]">Only fill these fields if you want to reset this investor account password.</p>
                    </div>

                    <div class="grid gap-6 md:grid-cols-2">
                        <div>
                            <label for="password" class="block text-sm font-semibold text-[#07172f]">New Password</label>
                            <input id="password" name="password" type="password"
                                   class="mt-2 block w-full rounded-2xl border-[#d0d5dd] shadow-sm focus:border-[#123f8c] focus:ring-[#123f8c]"
                                   placeholder="Leave empty to keep current password">
                            @error('password')
                                <p class="mt-2 text-sm font-semibold text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="password_confirmation" class="block text-sm font-semibold text-[#07172f]">Confirm New Password</label>
                            <input id="password_confirmation" name="password_confirmation" type="password"
                                   class="mt-2 block w-full rounded-2xl border-[#d0d5dd] shadow-sm focus:border-[#123f8c] focus:ring-[#123f8c]"
                                   placeholder="Repeat new password">
                        </div>
                    </div>

                    <div class="rounded-2xl bg-[#f8fafc] p-5">
                        <p class="text-sm font-bold text-[#07172f]">Account Role</p>
                        <p class="mt-2 text-sm leading-6 text-[#667085]">This account remains locked to the investor role. It will not have access to the admin backend.</p>
                    </div>
                </div>

                <div class="mt-8 flex flex-col-reverse gap-3 sm:flex-row sm:items-center sm:justify-end">
                    <a href="{{ route('admin.investors.index') }}"
                       class="rounded-full border border-[#d0d5dd] bg-white px-6 py-3 text-center text-sm font-bold text-[#07172f] hover:bg-[#f7f3ea]">
                        Cancel
                    </a>

                    <button type="submit"
                            :disabled="loading"
                            class="inline-flex items-center justify-center gap-2 rounded-full bg-[#07172f] px-6 py-3 text-sm font-bold text-white hover:bg-[#123f8c] disabled:opacity-60">
                        <svg x-show="loading" class="h-4 w-4 animate-spin" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path>
                        </svg>
                        <span x-text="loading ? 'Saving…' : 'Update Investor Account'">Update Investor Account</span>
                    </button>
                </div>
            </form>
        </div>
    </x-admin-dashboard-shell>
</x-app-layout>
