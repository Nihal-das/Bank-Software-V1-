<x-layout>
    <x-slot:heading> Update Role </x-slot:heading>

    
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
    <div class="grid grid-cols-[3fr_1fr]">

    <div class="mt-16 mx-auto min-w-3xl rounded-2xl bg-white/5 p-10 shadow-xl backdrop-blur mb-28">
        
        <form action="{{ route('roles.update' , $role->id) }}" method="POST">
            @csrf
            @method('PATCH')

            
            <div class="mb-10 text-center">
                <h2 class="text-4xl font-bold text-white">
                    Update Role
                </h2>
                <p class="mt-2 text-gray-400">
                    Update role details below
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
                        value="{{ $role->name }}"
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
                        value="{{ $role->description }}"
                        class="mt-2 w-full rounded-lg border border-white/10 bg-transparent px-4 py-3 text-white placeholder-gray-500 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500/30"
                    />
                    @error('description')
                        <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            </div>

           <div class="mt-8 space-y-6">
    @foreach($groupedPermissions as $moduleName => $permissions)
        <div class="bg-white/10 border border-gray-700 rounded-lg p-4 shadow-sm">
            <h4 class="text-lg font-semibold text-white mb-3">{{ $moduleName }}</h4>

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3">
                @foreach($permissions as $permission)
                    <label class="flex items-center space-x-2 p-2 rounded cursor-pointer hover:bg-white/20 transition">
                        <input 
                            type="checkbox" 
                            name="permissions[]" 
                            value="{{ $permission->id }}" 
                            @if(in_array($permission->id, $rolePermissionIds)) checked @endif
                            class="h-4 w-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500"
                        >
                        <span class="text-white">{{ $permission->name }}</span>
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
                   Update role
                </button>
            </div>
        </form>                
    </div>

    <div class="grid grid-cols-2">
        <div class="">
        <a href="{{ route('roles.view', $role->id) }}">
            <div class="mt-12 flex justify-start">
                <button
                    type="button"
                    class="rounded-xl bg-indigo-600 px-8 py-3 text-lg font-semibold text-white shadow-md transition-all duration-200 hover:-translate-y-1 hover:bg-green-600 hover:shadow-xl"
                >
                   Back
                </button>
            </div>
        </a>
        </div>
        <div>
           @if (Auth::user()->role->permissions->contains('id', 10))
        <form action="{{ route('roles.delete', $role->id) }}" method="post" onsubmit="return confirm('Are you sure you want to delete this role?');">
        @csrf
        @method('DELETE')
         <div class="mt-12 flex justify-start">
        <button
                    type="submit"
                    class="rounded-xl bg-indigo-600 px-8 py-3 text-lg font-semibold text-white shadow-md transition-all duration-200 hover:-translate-y-1 hover:bg-green-600 hover:shadow-xl"
                >
                   Delete
                </button>
            </div>
    </form>
    @endif
    </div>
    </div>
    </div>

    

    
</x-layout>
