<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <p class="text-sm font-semibold uppercase tracking-[0.2em] text-[#c9a24d]">
                    Admin Dashboard
                </p>
                <h2 class="mt-1 font-serif text-2xl font-bold text-[#07172f]">
                    Edit Investment Record
                </h2>
            </div>

            <a href="{{ route('admin.investments.index') }}"
               class="rounded-full bg-[#07172f] px-5 py-2 text-sm font-semibold text-white">
                Back to Records
            </a>
        </div>
    </x-slot>

    <div class="min-h-screen bg-[#f7f3ea] py-10">
        <div class="mx-auto max-w-4xl px-6">
            <div class="rounded-[2rem] bg-white p-8 shadow-sm ring-1 ring-[#e6e8ee]">
                <div class="mb-8">
                    <p class="text-sm font-bold uppercase tracking-[0.2em] text-[#c9a24d]">
                        Investment Update
                    </p>

                    <h3 class="mt-2 text-2xl font-bold text-[#07172f]">
                        Update Investor Investment Record
                    </h3>

                    <p class="mt-2 text-sm leading-6 text-[#667085]">
                        Update the selected GBP investment record. Changes will reflect on the investor dashboard after saving.
                    </p>
                </div>

                @if ($errors->any())
                    <div class="mb-6 rounded-2xl bg-red-50 px-5 py-4 text-sm text-red-700">
                        <p class="font-semibold">Please correct the errors below:</p>
                        <ul class="mt-2 list-disc space-y-1 pl-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('admin.investments.update', $investment) }}" class="space-y-6">
                    @csrf
                    @method('PATCH')

                    <div class="grid gap-6 md:grid-cols-2">
                        <div>
                            <label for="user_id" class="block text-sm font-semibold text-[#07172f]">
                                Investor
                            </label>

                            <select id="user_id" name="user_id" required
                                    class="mt-2 w-full rounded-2xl border-[#d0d5dd] bg-white px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:ring-[#123f8c]">
                                <option value="">Select investor</option>
                                @foreach ($investors as $investor)
                                    <option value="{{ $investor->id }}" @selected(old('user_id', $investment->user_id) == $investor->id)>
                                        {{ $investor->investor_number ? $investor->investor_number . ' - ' : '' }}{{ $investor->name }} - {{ $investor->email }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label for="investment_plan_id" class="block text-sm font-semibold text-[#07172f]">
                                Investment Plan
                            </label>

                            <select id="investment_plan_id" name="investment_plan_id"
                                    class="mt-2 w-full rounded-2xl border-[#d0d5dd] bg-white px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:ring-[#123f8c]">
                                <option value="" data-rate="0">No plan selected</option>
                                @foreach ($plans as $plan)
                                    <option
                                        value="{{ $plan->id }}"
                                        data-rate="{{ $plan->expected_return_rate ?? 0 }}"
                                        @selected(old('investment_plan_id', $investment->investment_plan_id) == $plan->id)
                                    >
                                        {{ $plan->name }}
                                        @if (! is_null($plan->expected_return_rate))
                                            — {{ rtrim(rtrim(number_format($plan->expected_return_rate, 2), '0'), '.') }}% ROI
                                        @endif
                                    </option>
                                @endforeach
                            </select>

                            <p id="plan_rate_hint" class="mt-2 text-xs font-semibold text-[#667085]">
                                Select a plan to calculate expected return automatically.
                            </p>
                        </div>
                    </div>

                    <div class="grid gap-6 md:grid-cols-2">
                        <div>
                            <label for="amount" class="block text-sm font-semibold text-[#07172f]">
                                Amount (&#163;)
                            </label>

                            <input id="amount" name="amount" type="number" min="0" step="0.01" required
                                   value="{{ old('amount', $investment->amount) }}"
                                   class="mt-2 w-full rounded-2xl border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:ring-[#123f8c]"
                                   placeholder="25000">
                        </div>

                        <div>
                            <label for="expected_return" class="block text-sm font-semibold text-[#07172f]">
                                Expected Return (&#163;)
                            </label>

                            <input id="expected_return" name="expected_return" type="number" min="0" step="0.01"
                                   value="{{ old('expected_return', $investment->expected_return) }}"
                                   class="mt-2 w-full rounded-2xl border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:ring-[#123f8c]"
                                   placeholder="Auto-calculated from selected plan">

                            <p class="mt-2 text-xs text-[#667085]">
                                You can still adjust this manually before saving.
                            </p>
                        </div>
                    </div>

                    <div class="grid gap-6 md:grid-cols-3">
                        <div>
                            <label for="status" class="block text-sm font-semibold text-[#07172f]">
                                Status
                            </label>

                            <select id="status" name="status" required
                                    class="mt-2 w-full rounded-2xl border-[#d0d5dd] bg-white px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:ring-[#123f8c]">
                                <option value="pending" @selected(old('status', $investment->status) === 'pending')>Pending</option>
                                <option value="active" @selected(old('status', $investment->status) === 'active')>Active</option>
                                <option value="matured" @selected(old('status', $investment->status) === 'matured')>Matured</option>
                                <option value="withdrawn" @selected(old('status', $investment->status) === 'withdrawn')>Withdrawn</option>
                                <option value="cancelled" @selected(old('status', $investment->status) === 'cancelled')>Cancelled</option>
                            </select>
                        </div>

                        <div>
                            <label for="start_date" class="block text-sm font-semibold text-[#07172f]">
                                Start Date
                            </label>

                            <input id="start_date" name="start_date" type="date"
                                   value="{{ old('start_date', $investment->start_date?->format('Y-m-d')) }}"
                                   class="mt-2 w-full rounded-2xl border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:ring-[#123f8c]">
                        </div>

                        <div>
                            <label for="maturity_date" class="block text-sm font-semibold text-[#07172f]">
                                Maturity Date
                            </label>

                            <input id="maturity_date" name="maturity_date" type="date"
                                   value="{{ old('maturity_date', $investment->maturity_date?->format('Y-m-d')) }}"
                                   class="mt-2 w-full rounded-2xl border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:ring-[#123f8c]">
                        </div>
                    </div>

                    <div>
                        <label for="notes" class="block text-sm font-semibold text-[#07172f]">
                            Notes
                        </label>

                        <textarea id="notes" name="notes" rows="5"
                                  class="mt-2 w-full rounded-2xl border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:ring-[#123f8c]"
                                  placeholder="Optional internal note for this investment record.">{{ old('notes', $investment->notes) }}</textarea>
                    </div>

                    <div class="flex flex-col gap-3 border-t border-[#e6e8ee] pt-6 sm:flex-row sm:items-center sm:justify-end">
                        <a href="{{ route('admin.investments.index') }}"
                           class="rounded-full border border-[#d0d5dd] px-6 py-3 text-center text-sm font-semibold text-[#07172f]">
                            Cancel
                        </a>

                        <button type="submit"
                                class="rounded-full bg-[#07172f] px-6 py-3 text-sm font-semibold text-white">
                            Update Investment Record
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        const planSelect = document.getElementById('investment_plan_id');
        const amountInput = document.getElementById('amount');
        const expectedReturnInput = document.getElementById('expected_return');
        const planRateHint = document.getElementById('plan_rate_hint');

        function formatRate(rate) {
            return Number(rate).toLocaleString(undefined, {
                minimumFractionDigits: 0,
                maximumFractionDigits: 2
            });
        }

        function calculateExpectedReturn() {
            const selectedOption = planSelect.options[planSelect.selectedIndex];
            const rate = parseFloat(selectedOption?.dataset?.rate || 0);
            const amount = parseFloat(amountInput.value || 0);

            if (rate > 0) {
                planRateHint.textContent = `Selected plan ROI: ${formatRate(rate)}%. Expected return will auto-calculate from amount.`;
            } else {
                planRateHint.textContent = 'Select a plan to calculate expected return automatically.';
            }

            if (amount > 0 && rate > 0) {
                expectedReturnInput.value = ((amount * rate) / 100).toFixed(2);
            }
        }

        planSelect?.addEventListener('change', calculateExpectedReturn);
        amountInput?.addEventListener('input', calculateExpectedReturn);

        calculateExpectedReturn();
    </script>
</x-app-layout>