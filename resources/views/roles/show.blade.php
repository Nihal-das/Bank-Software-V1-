<x-layout>
    <x-slot:heading> Role Details </x-slot:heading>

    <div class="mx-auto max-w-7xl px-6 py-20 lg:px-8">
        <div class="rounded-lg border border-gray-700 bg-gray-800 p-6 shadow">
            <h2 class="mb-4 text-2xl font-semibold text-white">{{ $role->name }}</h2>
            <p class="mb-2 text-gray-300">{{ $role->description }}</p>
        </div>
    </div>

    <div class="grid grid-cols-8 pb-70">
        <div>
            <a href="{{ route('roles.edit_form', $role->id) }}">
                <button
                    type="button"
                    class="mt-10 ml-[80rem] rounded-xl bg-indigo-600 px-8 py-3 text-lg font-semibold text-white shadow-md transition-all duration-200 hover:-translate-y-1 hover:bg-green-600 hover:shadow-xl"
                >
                    Edit
                </button>
            </a>
        </div>
        <div>
            <a href="{{ route('roles.view_all') }}">
                <div class="mt-12 mr-35 flex justify-end">
                    <button
                        type="button"
                        class="rounded-xl bg-indigo-600 px-8 py-3 text-lg font-semibold text-white shadow-md transition-all duration-200 hover:-translate-y-1 hover:bg-green-600 hover:shadow-xl"
                    >
                        Back
                    </button>
                </div>
            </a>
        </div>
    </div>
</x-layout>
