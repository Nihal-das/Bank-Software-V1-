<x-layout>
    <x-slot:heading>
        💳 Create Transaction
    </x-slot:heading>

    @if (session('success'))
        <div
            id="success-message"
            class="mx-auto mt-6 w-fit rounded-full bg-green-600/90 px-6 py-3 text-white shadow-lg transition-all duration-300"
        >
            {{ session('success') }}
        </div>
    @endif

     @if(session('error'))
        <div id="success-message" 
        class="mx-auto mt-6 w-fit rounded-full bg-red-600/90 px-6 py-3 text-white shadow-lg transition-all duration-300">
            {{ session('error') }}
        </div>
    @endif


    <script>
        setTimeout(() => {
            const el = document.getElementById('success-message');
            if (el) el.classList.add('opacity-0', 'translate-y-2');
        }, 3000);
    </script>



<div class="pt-8">
    <h2 class="text-3xl font-semibold text-white text-center">
        Enter Transaction Details
    </h2>

    <div class="max-w-xl rounded-xl border p-6 shadow alihn-center mx-auto mt-6 bg-gray-900 mb-35">
        <form method="POST" action="{{ route('transactions.store') }}" class="space-y-5">
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

            <!-- Type -->
            <div>
                <label class="block text-sm font-medium mb-1">Transaction Type</label>
                <select name="type"
                        required
                        class="w-full rounded-md border px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 text-white bg-gray-800">
                    <option value="DEPOSIT">Deposit</option>
                    <option value="WITHDRAW">Withdraw</option>
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
                    Save Transaction
                </button>
            </div>
        </form>
    </div>
    </div>
</x-layout>
