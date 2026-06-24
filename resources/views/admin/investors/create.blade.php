<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <p class="text-sm font-semibold uppercase tracking-[0.22em] text-[#c9a24d]">
                    Investor Accounts
                </p>
                <h2 class="mt-1 font-serif text-2xl font-bold text-[#07172f]">
                    Add Investor Account
                </h2>
            </div>

            <a href="{{ route('admin.investors.index') }}"
               class="rounded-full border border-[#d0d5dd] bg-white px-5 py-2 text-sm font-semibold text-[#07172f] shadow-sm hover:bg-[#f7f3ea]">
                Back to Investors
            </a>
        </div>
    </x-slot>

    <x-admin-dashboard-shell>
        <div class="overflow-hidden rounded-[2rem] bg-white shadow-sm ring-1 ring-[#e6e8ee]">
            <div class="border-b border-[#e6e8ee] p-6">
                <p class="text-sm font-bold uppercase tracking-[0.22em] text-[#123f8c]">
                    New Investor
                </p>

                <h1 class="mt-2 text-2xl font-bold text-[#07172f]">
                    Create Investor Login
                </h1>

                <p class="mt-2 text-sm leading-6 text-[#667085]">
                    Create a secure investor account that can access the investor dashboard and be linked to investment records.
                </p>
            </div>

            <form method="POST" action="{{ route('admin.investors.store') }}" class="p-6">
                @csrf

                <div class="grid gap-6">
                    <div>
                        <label for="name" class="block text-sm font-semibold text-[#07172f]">
                            Full Name
                        </label>

                        <input id="name"
                               name="name"
                               type="text"
                               value="{{ old('name') }}"
                               required
                               class="mt-2 block w-full rounded-2xl border-[#d0d5dd] shadow-sm focus:border-[#123f8c] focus:ring-[#123f8c]"
                               placeholder="Investor full name">

                        @error('name')
                            <p class="mt-2 text-sm font-semibold text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-semibold text-[#07172f]">
                            Email Address
                        </label>

                        <input id="email"
                               name="email"
                               type="email"
                               value="{{ old('email') }}"
                               required
                               class="mt-2 block w-full rounded-2xl border-[#d0d5dd] shadow-sm focus:border-[#123f8c] focus:ring-[#123f8c]"
                               placeholder="investor@example.com">

                        @error('email')
                            <p class="mt-2 text-sm font-semibold text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="grid gap-6 md:grid-cols-2">
                        <div>
                            <label for="password" class="block text-sm font-semibold text-[#07172f]">
                                Password
                            </label>

                            <input id="password"
                                   name="password"
                                   type="password"
                                   required
                                   class="mt-2 block w-full rounded-2xl border-[#d0d5dd] shadow-sm focus:border-[#123f8c] focus:ring-[#123f8c]"
                                   placeholder="Minimum 8 characters">

                            @error('password')
                                <p class="mt-2 text-sm font-semibold text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="password_confirmation" class="block text-sm font-semibold text-[#07172f]">
                                Confirm Password
                            </label>

                            <input id="password_confirmation"
                                   name="password_confirmation"
                                   type="password"
                                   required
                                   class="mt-2 block w-full rounded-2xl border-[#d0d5dd] shadow-sm focus:border-[#123f8c] focus:ring-[#123f8c]"
                                   placeholder="Repeat password">
                        </div>
                    </div>

                    <div class="rounded-2xl bg-[#f8fafc] p-5">
                        <p class="text-sm font-bold text-[#07172f]">
                            Account Role
                        </p>
                        <p class="mt-2 text-sm leading-6 text-[#667085]">
                            This account will automatically be created as an investor account. It will not have access to the admin backend.
                        </p>
                    </div>
                </div>

                <div class="mt-8 flex flex-col-reverse gap-3 sm:flex-row sm:items-center sm:justify-end">
                    <a href="{{ route('admin.investors.index') }}"
                       class="rounded-full border border-[#d0d5dd] bg-white px-6 py-3 text-center text-sm font-bold text-[#07172f] hover:bg-[#f7f3ea]">
                        Cancel
                    </a>

                    <button type="submit"
                            class="rounded-full bg-[#07172f] px-6 py-3 text-sm font-bold text-white hover:bg-[#123f8c]">
                        Save Investor Account
                    </button>
                </div>
            </form>
        </div>
    </x-admin-dashboard-shell>
</x-app-layout>
