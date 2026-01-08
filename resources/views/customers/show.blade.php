<x-layout>
    <x-slot:heading> Customer Details </x-slot:heading>

    @if (session('error'))
        <div
            id="error-message"
            class="mx-auto mt-6 w-fit rounded-full bg-red-600/90 px-6 py-3 text-white shadow-lg transition-all duration-300"
        >
            {{ session('error') }}
        </div>
    @endif

    <script>
        setTimeout(() => {
            const el = document.getElementById('error-message');
            if (el) el.classList.add('opacity-0', 'translate-y-2');
        }, 3000);
    </script>

    <div class="ml-8 mx-auto max-w-7xl px-6 lg:px-8 py-20">
        <div class="rounded-lg border border-gray-700 bg-gray-800 p-6 shadow">
            <h2 class="text-2xl font-semibold text-white mb-4">{{ $customer->name }}</h2>
            <p class="text-gray-300 mb-2">Account Number: {{ $customer->account_number }}</p>
            <p class="text-gray-300 mb-2">Phone: {{ $customer->phone_number }}</p>
            
            <p class="text-gray-300 mb-2">Balance: {{ $customerBalance }}</p>
        </div>
    </div>

     @if (Auth::user()->role->permissions->contains('id', 3))
    <div class="ml-[40rem] py-10">
        <form action="{{ route('customers.delete', $customer->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this customer?');">
            @csrf
            <button
                type="submit"
                class="rounded-xl bg-red-600 px-8 py-3 text-lg font-semibold text-white shadow-md transition-all duration-200 hover:-translate-y-1 hover:bg-red-800 hover:shadow-xl"
            >
                Delete Customer
            </button>
        </form>
    </div>
    @endif
    </x-layout>