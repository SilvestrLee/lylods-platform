<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <p class="text-sm font-semibold uppercase tracking-[0.22em] text-[#c9a24d]">
                    Investment Plans
                </p>
                <h2 class="mt-1 font-serif text-2xl font-bold text-[#07172f]">
                    Edit Investment Plan
                </h2>
            </div>

            <a href="{{ route('admin.investment-plans.index') }}"
               class="rounded-full border border-[#d0d5dd] bg-white px-5 py-2 text-sm font-semibold text-[#07172f] shadow-sm hover:bg-[#f7f3ea]">
                Back to Plans
            </a>
        </div>
    </x-slot>

    <x-admin-dashboard-shell>
        <div class="overflow-hidden rounded-[2rem] bg-white shadow-sm ring-1 ring-[#e6e8ee]">
            <div class="border-b border-[#e6e8ee] p-6">
                <p class="text-sm font-bold uppercase tracking-[0.22em] text-[#123f8c]">
                    Existing Plan
                </p>

                <h1 class="mt-2 text-2xl font-bold text-[#07172f]">
                    Update Investment Plan
                </h1>

                <p class="mt-2 text-sm leading-6 text-[#667085]">
                    Update the plan details used when creating investor investment records.
                </p>
            </div>

            <form method="POST" action="{{ route('admin.investment-plans.update', $plan) }}" class="p-6">
                @csrf
                @method('PATCH')

                <div class="grid gap-6">
                    <div>
                        <label for="name" class="block text-sm font-semibold text-[#07172f]">
                            Plan Name
                        </label>

                        <input id="name"
                               name="name"
                               type="text"
                               value="{{ old('name', $plan->name) }}"
                               required
                               class="mt-2 block w-full rounded-2xl border-[#d0d5dd] shadow-sm focus:border-[#123f8c] focus:ring-[#123f8c]">

                        @error('name')
                            <p class="mt-2 text-sm font-semibold text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="description" class="block text-sm font-semibold text-[#07172f]">
                            Description
                        </label>

                        <textarea id="description"
                                  name="description"
                                  rows="4"
                                  class="mt-2 block w-full rounded-2xl border-[#d0d5dd] shadow-sm focus:border-[#123f8c] focus:ring-[#123f8c]">{{ old('description', $plan->description) }}</textarea>

                        @error('description')
                            <p class="mt-2 text-sm font-semibold text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="grid gap-6 md:grid-cols-3">
                        <div>
                            <label for="minimum_amount" class="block text-sm font-semibold text-[#07172f]">
                                Minimum Amount (&#163;)
                            </label>

                            <input id="minimum_amount"
                                   name="minimum_amount"
                                   type="number"
                                   step="0.01"
                                   min="0"
                                   value="{{ old('minimum_amount', $plan->minimum_amount) }}"
                                   required
                                   class="mt-2 block w-full rounded-2xl border-[#d0d5dd] shadow-sm focus:border-[#123f8c] focus:ring-[#123f8c]">

                            @error('minimum_amount')
                                <p class="mt-2 text-sm font-semibold text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="expected_return_rate" class="block text-sm font-semibold text-[#07172f]">
                                Expected Return (%)
                            </label>

                            <input id="expected_return_rate"
                                   name="expected_return_rate"
                                   type="number"
                                   step="0.01"
                                   min="0"
                                   value="{{ old('expected_return_rate', $plan->expected_return_rate) }}"
                                   class="mt-2 block w-full rounded-2xl border-[#d0d5dd] shadow-sm focus:border-[#123f8c] focus:ring-[#123f8c]">

                            @error('expected_return_rate')
                                <p class="mt-2 text-sm font-semibold text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="duration" class="block text-sm font-semibold text-[#07172f]">
                                Duration
                            </label>

                            <input id="duration"
                                   name="duration"
                                   type="text"
                                   value="{{ old('duration', $plan->duration) }}"
                                   class="mt-2 block w-full rounded-2xl border-[#d0d5dd] shadow-sm focus:border-[#123f8c] focus:ring-[#123f8c]">

                            @error('duration')
                                <p class="mt-2 text-sm font-semibold text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <label class="flex items-start gap-3 rounded-2xl bg-[#f8fafc] p-4">
                        <input type="checkbox"
                               name="is_active"
                               value="1"
                               @checked(old('is_active', $plan->is_active))
                               class="mt-1 rounded border-[#d0d5dd] text-[#07172f] focus:ring-[#123f8c]">

                        <span>
                            <span class="block text-sm font-bold text-[#07172f]">
                                Active Plan
                            </span>
                            <span class="mt-1 block text-sm leading-6 text-[#667085]">
                                Active plans can be selected when creating investor investment records.
                            </span>
                        </span>
                    </label>
                </div>

                <div class="mt-8 flex flex-col-reverse gap-3 sm:flex-row sm:items-center sm:justify-end">
                    <a href="{{ route('admin.investment-plans.index') }}"
                       class="rounded-full border border-[#d0d5dd] bg-white px-6 py-3 text-center text-sm font-bold text-[#07172f] hover:bg-[#f7f3ea]">
                        Cancel
                    </a>

                    <button type="submit"
                            class="rounded-full bg-[#07172f] px-6 py-3 text-sm font-bold text-white hover:bg-[#123f8c]">
                        Update Investment Plan
                    </button>
                </div>
            </form>
        </div>
    </x-admin-dashboard-shell>
</x-app-layout>
