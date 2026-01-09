<x-layout>
    <x-slot:heading> Dashboard </x-slot:heading>

     @if (Auth::user()->role->permissions->contains('id', 13))
    <div class="ml-[35rem]">
        <a href="{{ route('users.create') }}">
            <div class="mt-12 flex justify-start">
                <button
                    type="button"
                    class="rounded-xl bg-indigo-600 px-8 py-3 text-lg font-semibold text-white shadow-md transition-all duration-200 hover:-translate-y-1 hover:bg-green-600 hover:shadow-xl"
                >
                    Create New User
                </button>
            </div>
        </a>
    </div>
    @endif

    <div class="ml-[36.25rem]">
        <a href="{{ route('menu.view') }}">
            <div class="mt-12 flex justify-start">
                <button
                    type="button"
                    class="rounded-xl bg-indigo-600 px-8 py-3 text-lg font-semibold text-white shadow-md transition-all duration-200 hover:-translate-y-1 hover:bg-green-600 hover:shadow-xl"
                >
                    Menu Order
                </button>
            </div>
        </a>
    </div>

    <div class="ml-[36.25rem]">
        <a href="{{ route('menu.refresh') }}">
            <div class="mt-12 flex justify-start">
                <button
                    type="button"
                    class="rounded-xl bg-indigo-600 px-8 py-3 text-lg font-semibold text-white shadow-md transition-all duration-200 hover:-translate-y-1 hover:bg-green-600 hover:shadow-xl"
                >
                    Menu Refresh
                </button>
            </div>
        </a>
    </div>

</x-layout>
