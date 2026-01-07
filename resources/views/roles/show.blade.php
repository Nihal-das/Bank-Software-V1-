<x-layout>
    <x-slot:heading> Role Details </x-slot:heading>

    <div class="mx-auto max-w-3xl px-6 py-20 lg:px-8">
        <!-- Role Card -->
        <div class="rounded-lg border border-gray-700 bg-gray-800 p-6 shadow">
            <h2 class="mb-4 text-2xl font-semibold text-white">{{ $role->name }}</h2>
            <p class="text-gray-300">{{ $role->description }}</p>
        </div>


        <!-- Action Buttons -->
        <div class="mt-10 flex flex-wrap justify-end gap-4">
            <!-- Edit Button -->
             @if (Auth::user()->role->permissions->contains('id', 11))
            <a href="{{ route('roles.edit_form', $role->id) }}">
                <button
                    type="button"
                    class="rounded-xl bg-indigo-600 px-8 py-3 text-lg font-semibold text-white shadow-md transition-all duration-200 hover:-translate-y-1 hover:bg-green-600 hover:shadow-xl"
                >
                    Edit
                </button>
            </a>
            @endif

            <!-- Back Button -->
            <a href="{{ route('roles.view_all') }}">
                <button
                    type="button"
                    class="rounded-xl bg-indigo-600 px-8 py-3 text-lg font-semibold text-white shadow-md transition-all duration-200 hover:-translate-y-1 hover:bg-green-600 hover:shadow-xl"
                >
                    Back
                </button>
            </a>
        </div>
    </div>
</x-layout>
