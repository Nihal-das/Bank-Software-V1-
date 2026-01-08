
<x-layout>
    <x-slot:heading>
        💳 Loan Create
    </x-slot:heading>

<x-success-message/>
<x-error-messsage/>
   


<div class="pt-8 pb-56">
    <h2 class="text-3xl font-semibold text-white text-center">
        Create Loan 
    </h2>

    <div class="max-w-xl rounded-xl border p-6 shadow align-center mx-auto mt-6 bg-gray-900 ">

        <form method="POST" action="{{ route('loans.store') }}" class="space-y-5">
            @csrf

            <!-- Customer -->
            <div>
                <label class="block text-sm font-medium mb-1">Customer</label>
                <select name="customer_id"
                        required
                        class="w-full rounded-md border px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 text-white bg-gray-800">
                    <option value="">-- Select Customer --</option>
                    @foreach($customers as $customer)
                        <option value="{{ $customer->id }}">
                            {{ $customer->name }} ({{ $customer->account_number }})
                        </option>
                    @endforeach
                </select>
            </div>


            <!-- Amount -->
            <div>
                <label class="block text-sm font-medium mb-1">Amount</label>
                <input type="number"
                       name="amount"
                       step="0.01"
                       required
                       placeholder="₹ 0.00"
                       class="w-full rounded-md border px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Mode -->
            <div>
                <label class="block text-sm font-medium mb-1">Payment Mode</label>
                <select name="mode"
                        required
                        class="w-full rounded-md border px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 text-white bg-gray-800">
                    <option value="CASH">Cash</option>
                    <option value="BANK">Bank</option>
                </select>
            </div>

            <!-- Button -->
            <div class="pt-2">
                <button type="submit"
                        class="w-full rounded-lg bg-blue-600 px-4 py-2 text-white font-semibold hover:bg-blue-700 transition">
                    Give Loan
                </button>
            </div>
        </form>
    </div>
    </div>
</x-layout>
