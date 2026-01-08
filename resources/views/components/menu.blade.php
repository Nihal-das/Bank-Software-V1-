<x-layout>

    <x-error-messsage/>
    <x-success-message/>

<form method="POST" action="{{ route('menu.order.update') }}">
    @csrf

    <div class="m-10 space-y-8">

        @foreach($modules as $module)
            <div class="bg-white/10 border border-gray-700 rounded-lg p-4">

                {{-- MODULE ORDER --}}
                <div class="flex items-center justify-start mb-4 ">
                    <h4 class="text-lg font-semibold text-white mr-4">
                        {{ $module->name }}
                    </h4>

                    <input
                        type="number"
                        name="modules[{{ $module->id }}]"
                        value="{{ $module->sort_order }}"
                        min="1"
                        max="{{ count($modules) }}"
                        class="w-20 rounded bg-black/40 text-white border border-gray-600 px-2 py-1"
                    >
                </div>

                {{-- PERMISSIONS ORDER --}}
                <div class="grid grid-cols-2 md:grid-cols-3 gap-3">
                    @foreach($module->permissions as $permission)
                        <div class="flex items-center justify-between p-2 rounded bg-white/5">
                            <span class="text-white text-sm">
                                {{ $permission->name }}
                            </span>

                            <input
                                type="number"
                                name="permissions[{{ $permission->id }}]"
                                value="{{ $permission->sort_order }}"
                                min="1"
                                max="{{ count($module->permissions) }}"
                                class="w-16 rounded bg-black/40 text-white border border-gray-600 px-2 py-1"
                            >
                        </div>
                    @endforeach
                </div>

            </div>
        @endforeach

        <button
            type="submit"
            class="px-6 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg font-medium"
        >
            Save Order
        </button>
    </div>
</form>
</x-layout>
