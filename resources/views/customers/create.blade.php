<x-layout>
    <x-slot:heading> Create Customer </x-slot:heading>

    
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

    <div class="mx-auto mt-16 max-w-3xl rounded-2xl bg-white/5 p-10 shadow-xl backdrop-blur mb-28">
        <form action="{{ route('customers.store') }}" method="POST">
            @csrf

            
            <div class="mb-10 text-center">
                <h2 class="text-4xl font-bold text-white">
                    New Customer
                </h2>
                <p class="mt-2 text-gray-400">
                    Enter customer details below
                </p>
            </div>

            
            <div class="space-y-8">
                
                <div>
                    <label class="block text-lg font-medium text-white">
                        Customer Name
                    </label>
                    <input
                        type="text"
                        name="name"
                        placeholder="Raj Ram"
                        value="{{ old('name') }}"
                        class="mt-2 w-full rounded-lg border border-white/10 bg-transparent px-4 py-3 text-white placeholder-gray-500 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500/30"
                    />
                    @error('name')
                        <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

               
                <div>
                    <label class="block text-lg font-medium text-white">
                        Phone Number
                    </label>
                    <input
                        type="text"
                        name="Phone"
                        placeholder="9876543210"
                        value="{{ old('Phone') }}"
                        class="mt-2 w-full rounded-lg border border-white/10 bg-transparent px-4 py-3 text-white placeholder-gray-500 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500/30"
                    />
                    @error('Phone')
                        <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            
            <div class="mt-12 flex justify-end">
                <button
                    type="submit"
                    class="rounded-xl bg-indigo-600 px-8 py-3 text-lg font-semibold text-white shadow-md transition-all duration-200 hover:-translate-y-1 hover:bg-green-600 hover:shadow-xl"
                >
                    Save Customer
                </button>
            </div>
        </form>
    </div>
</x-layout>
