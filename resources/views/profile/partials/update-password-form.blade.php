<section class="rounded-[1.75rem] bg-white shadow-sm ring-1 ring-[#e6e8ee]">

    <div class="flex items-start gap-4 border-b border-[#e6e8ee] px-7 py-6">
        <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-2xl bg-[#123f8c]">
            <svg class="h-5 w-5 text-white" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z"/>
            </svg>
        </div>
        <div>
            <h2 class="text-lg font-bold text-[#07172f]">Update Password</h2>
            <p class="mt-1 text-sm text-[#667085]">Ensure your account uses a strong, unique password to stay secure.</p>
        </div>
    </div>

    <form method="post" action="{{ route('password.update') }}" class="px-7 py-6 space-y-5">
        @csrf
        @method('put')

        <div>
            <label for="update_password_current_password" class="block text-sm font-semibold text-[#07172f]">Current Password</label>
            <input id="update_password_current_password"
                   name="current_password"
                   type="password"
                   autocomplete="current-password"
                   class="mt-2 w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <div>
            <label for="update_password_password" class="block text-sm font-semibold text-[#07172f]">New Password</label>
            <input id="update_password_password"
                   name="password"
                   type="password"
                   autocomplete="new-password"
                   class="mt-2 w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div>
            <label for="update_password_password_confirmation" class="block text-sm font-semibold text-[#07172f]">Confirm New Password</label>
            <input id="update_password_password_confirmation"
                   name="password_confirmation"
                   type="password"
                   autocomplete="new-password"
                   class="mt-2 w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4 border-t border-[#e6e8ee] pt-5">
            <button type="submit"
                    class="rounded-full bg-[#07172f] px-6 py-2.5 text-sm font-bold text-white hover:bg-[#123f8c]">
                Update Password
            </button>

            @if (session('status') === 'password-updated')
                <p x-data="{ show: true }"
                   x-show="show"
                   x-transition
                   x-init="setTimeout(() => show = false, 2000)"
                   class="text-sm font-semibold text-emerald-700">
                    Password updated.
                </p>
            @endif
        </div>
    </form>

</section>
