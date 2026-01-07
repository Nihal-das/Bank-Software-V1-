<x-layout>
    <x-slot:heading> Create Role </x-slot:heading>

    
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

    <div>
        <a href="{{ route('roles.view_all') }}">
                <button
                    type="button"
                    class="ml-[80rem] mt-10 rounded-xl bg-indigo-600 px-8 py-3 text-lg font-semibold text-white shadow-md transition-all duration-200 hover:-translate-y-1 hover:bg-green-600 hover:shadow-xl"
                >
                    View
                </button>
                </a>
    </div>

    <div class="mx-auto max-w-3xl rounded-2xl bg-white/5 p-10 shadow-xl backdrop-blur mb-28">
        
        <form action="{{ route('roles.store') }}" method="POST">
            @csrf

            
            <div class="mb-10 text-center">
                <h2 class="text-4xl font-bold text-white">
                    New Role
                </h2>
                <p class="mt-2 text-gray-400">
                    Enter role details below
                </p>
            </div>

            
            <div class="space-y-8">
                
                <div>
                    <label class="block text-lg font-medium text-white">
                        Role Name
                    </label>
                    <input
                        type="text"
                        name="name"
                        placeholder="Manager"
                        value="{{ old('name') }}"
                        class="mt-2 w-full rounded-lg border border-white/10 bg-transparent px-4 py-3 text-white placeholder-gray-500 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500/30"
                    />
                    @error('name')
                        <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

               
                <div>
                    <label class="block text-lg font-medium text-white">
                        
                        Description
                    </label>
                    <input
                        type="text"
                        name="description"
                        placeholder="Manager of the company"
                        value="{{ old('description') }}"
                        class="mt-2 w-full rounded-lg border border-white/10 bg-transparent px-4 py-3 text-white placeholder-gray-500 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500/30"
                    />
                    @error('description')
                        <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            </div>

           <div class="space-y-6 mt-8">
    @foreach($modules as $module)
        <div class="border rounded-lg p-4 shadow-sm bg-white/10">
            <h4 class="text-lg font-semibold text-white mb-3">
                {{ $module->name }}
            </h4>

            <div class="grid grid-cols-2 gap-3">
                @foreach($module->permissions as $permission)
                    <label class="flex items-center space-x-2 p-2 rounded cursor-pointer">
                        <input type="checkbox"
                               name="permissions[]"
                               value="{{ $permission->id }}"
                               class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                        <span class="text-white  ">{{ $permission->name }}</span>
                    </label>
                @endforeach
                        </div>
        </div>
    @endforeach
                </div>

            
            <div class="mt-12 flex justify-end">
                <button
                    type="submit"
                    class="rounded-xl bg-indigo-600 px-8 py-3 text-lg font-semibold text-white shadow-md transition-all duration-200 hover:-translate-y-1 hover:bg-green-600 hover:shadow-xl"
                >
                    Save role
                </button>
            </div>
        </form>


                
    </div>

    
</x-layout>
