<section class="rounded-[1.75rem] bg-white shadow-sm ring-1 ring-[#e6e8ee]">

    <div class="flex items-start gap-4 border-b border-[#e6e8ee] px-7 py-6">
        <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-2xl bg-[#07172f]">
            <svg class="h-5 w-5 text-white" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z"/>
            </svg>
        </div>
        <div>
            <h2 class="text-lg font-bold text-[#07172f]">Profile Information</h2>
            <p class="mt-1 text-sm text-[#667085]">Update your account's display name and email address.</p>
        </div>
    </div>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="px-7 py-6 space-y-5">
        @csrf
        @method('patch')

        <div>
            <label for="name" class="block text-sm font-semibold text-[#07172f]">Full Name</label>
            <input id="name"
                   name="name"
                   type="text"
                   required
                   autofocus
                   autocomplete="name"
                   value="{{ old('name', $user->name) }}"
                   class="mt-2 w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <label for="email" class="block text-sm font-semibold text-[#07172f]">Email Address</label>
            <input id="email"
                   name="email"
                   type="email"
                   required
                   autocomplete="username"
                   value="{{ old('email', $user->email) }}"
                   class="mt-2 w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="mt-3 rounded-2xl border border-amber-200 bg-amber-50 px-4 py-3">
                    <p class="text-sm text-amber-800">
                        Your email address is unverified.
                        <button form="send-verification"
                                class="font-semibold underline hover:text-amber-900">
                            Re-send verification email
                        </button>
                    </p>
                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 text-sm font-semibold text-emerald-700">
                            A new verification link has been sent to your email address.
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4 border-t border-[#e6e8ee] pt-5">
            <button type="submit"
                    class="rounded-full bg-[#07172f] px-6 py-2.5 text-sm font-bold text-white hover:bg-[#123f8c]">
                Save Changes
            </button>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }"
                   x-show="show"
                   x-transition
                   x-init="setTimeout(() => show = false, 2000)"
                   class="text-sm font-semibold text-emerald-700">
                    Profile updated.
                </p>
            @endif
        </div>
    </form>

</section>
