<x-layout>
     <x-slot:heading> Customers </x-slot:heading>

      @if (session('success'))
        <div
            id="success-message"
            class="mx-auto mt-6 w-fit rounded-full bg-green-600/90 px-6 py-3 text-white shadow-lg transition-all duration-300"
        >
            {{ session('success') }}
        </div>
    @endif

    <script>
        setTimeout(() => {
            const el = document.getElementById('success-message');
            if (el) el.classList.add('opacity-0', 'translate-y-2');
        }, 3000);
    </script>
    

    <div class="mx-auto min-h-screen max-w-7xl px-6 lg:px-8 py-20">
        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
            @foreach($customers as $customer)
            
            <div class="rounded-lg border border-gray-700 bg-gray-800 p-6 shadow transition transform duration-200 hover:-translate-y-1 hover:shadow-lg hover:bg-gray-700 hover:cursor-pointer hover:text-blue-300">
                <a href="{{ route('customers.show', $customer->id) }}">
                    <h2 class="text-xl font-semibold text-white mb-2">{{ $customer->name }}</h2>
                    <p class="text-gray-300 mb-1">Account Number: {{ $customer->account_number }}</p>
                </a>
            </div>
            @endforeach
        </div>

        <div class="mx-auto mt-8 justify-around max-w-7xl px-6 lg:px-8 pb-10">
            {{ $customers->links() }}
        </div>

    </div>

    

    </x-layout>
   