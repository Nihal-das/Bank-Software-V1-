<x-layout>
     <x-slot:heading> Roles </x-slot:heading>

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
        <div>
            <a href="{{ route('roles.create') }}">
                <div class="mr-[80rem] flex justify-end">
                    <button
                        type="button"
                        class="rounded-xl bg-indigo-600 px-8 py-3 text-lg font-semibold text-white shadow-md transition-all duration-200 hover:-translate-y-1 hover:bg-green-600 hover:shadow-xl"
                    >
                        Back
                    </button>
                </div>
            </a>
        </div>

        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
            @foreach($roles as $role)
            
            <div class="rounded-lg border border-gray-700 bg-gray-800 p-6 shadow transition transform duration-200 hover:-translate-y-1 hover:shadow-lg hover:bg-gray-700 hover:cursor-pointer hover:text-blue-300">
                <a href="{{ route('roles.view', $role->id) }}">
                    <h2 class="text-xl font-semibold text-white mb-2">{{ $role->name }}</h2>
                    <p class="text-gray-300 mb-1">{{ $role->description }}</p>
                </a>
            </div>
            @endforeach
        </div>

         

    </div>
    </x-layout>
   