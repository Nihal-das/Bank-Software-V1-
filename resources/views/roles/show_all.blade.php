<x-layout>
    <x-slot:heading>Roles</x-slot:heading>

    <!-- Success Message -->
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

    <div class="mx-auto max-w-7xl px-6 lg:px-8 py-20 min-h-screen">
        <!-- Action Buttons -->
        <div class="flex justify-end mb-8">

            <a href="{{ url()->previous() }}" class="ml-4">
                <button
                    type="button"
                    class="rounded-xl bg-gray-600 px-6 py-3 text-lg font-semibold text-white shadow-md transition-all duration-200 hover:-translate-y-1 hover:bg-gray-700 hover:shadow-lg"
                >
                    Back
                </button>
            </a>
        </div>

        <!-- Roles Grid -->
        <div class="m-5 grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
            @foreach($roles as $role)
                <a href="{{ route('roles.view', $role->id) }}">
                    <div class="rounded-lg border border-gray-700 bg-gray-800 p-6 shadow transition-transform duration-200 hover:-translate-y-1 hover:shadow-lg hover:bg-gray-700 hover:text-blue-300 cursor-pointer">
                        <h2 class="text-xl font-semibold text-white mb-2">{{ $role->name }}</h2>
                        <p class="text-gray-300 mb-1">{{ $role->description }}</p>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</x-layout>
