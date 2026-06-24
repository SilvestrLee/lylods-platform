<section class="rounded-[1.75rem] border border-red-100 bg-white shadow-sm">

    <div class="flex items-start gap-4 border-b border-red-100 px-7 py-6">
        <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-2xl bg-red-50">
            <svg class="h-5 w-5 text-red-600" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z"/>
            </svg>
        </div>
        <div>
            <h2 class="text-lg font-bold text-red-700">Delete Account</h2>
            <p class="mt-1 text-sm text-[#667085]">Permanently remove your investor account and all associated data. This action cannot be undone.</p>
        </div>
    </div>

    <div class="px-7 py-6">
        <p class="max-w-2xl text-sm leading-6 text-[#667085]">
            Before deleting your account, please download any investment records or data you wish to retain. Once deleted, all resources and account data will be permanently removed from the platform.
        </p>

        <button type="button"
                x-data=""
                x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
                class="mt-5 rounded-full border border-red-300 px-6 py-2.5 text-sm font-bold text-red-600 hover:bg-red-50 hover:border-red-400 transition">
            Delete Account
        </button>
    </div>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-7">
            @csrf
            @method('delete')

            <div class="flex items-start gap-4">
                <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-2xl bg-red-50">
                    <svg class="h-5 w-5 text-red-600" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z"/>
                    </svg>
                </div>
                <div>
                    <h2 class="text-lg font-bold text-[#07172f]">Are you sure you want to delete your account?</h2>
                    <p class="mt-2 text-sm leading-6 text-[#667085]">
                        Once your account is deleted, all investment records and data will be permanently removed. Please enter your password to confirm this action.
                    </p>
                </div>
            </div>

            <div class="mt-6">
                <label for="password" class="sr-only">Password</label>
                <input id="password"
                       name="password"
                       type="password"
                       placeholder="Enter your password to confirm"
                       class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-red-400 focus:outline-none focus:ring-1 focus:ring-red-400">
                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex items-center justify-end gap-3">
                <button type="button"
                        x-on:click="$dispatch('close')"
                        class="rounded-full border border-[#d0d5dd] px-5 py-2.5 text-sm font-semibold text-[#07172f] hover:bg-[#f7f3ea] transition">
                    Cancel
                </button>
                <button type="submit"
                        class="rounded-full bg-red-600 px-5 py-2.5 text-sm font-bold text-white hover:bg-red-700 transition">
                    Delete Account
                </button>
            </div>
        </form>
    </x-modal>

</section>
