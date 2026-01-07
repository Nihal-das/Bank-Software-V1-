<aside class="fixed inset-y-0 left-0 z-50 w-72 bg-gradient-to-b from-gray-900 to-gray-950 border-r border-white/10">
    <div class="flex h-full flex-col px-5 py-6">

        {{-- COMPANY BRAND --}}
        <div class="mb-10 text-center select-none">
            <h1 class="text-2xl font-extrabold tracking-wide text-white">
                ND Bank
            </h1>
            <p class="mt-1 text-xs uppercase tracking-widest text-gray-400">
                Secure • Simple • Smart
            </p>
        </div>

        {{-- NAVIGATION --}}
        <nav class="flex-1 space-y-6 overflow-y-auto pr-1">

    {{-- HOME (ALWAYS VISIBLE) --}}
    <a
        href="{{ url('/') }}"
        class="block rounded-lg px-4 py-3 text-sm font-semibold tracking-wide
        transition-all duration-150
        {{ request()->is('/')
            ? 'bg-white/10 text-white'
            : 'text-gray-300 hover:bg-white/5 hover:text-white' }}"
    >
        Home
    </a>

    {{-- AUTHENTICATED USER MODULES --}}
    @auth
        <div class="space-y-2">
            @foreach($modules as $module)

                <div x-data="{ open: false }" class="space-y-1">

                    <button
                        @click="open = !open"
                        class="group flex w-full items-center justify-between rounded-lg px-4 py-3 text-sm font-semibold
                        text-gray-300 transition-all duration-200
                        hover:bg-white/10 hover:text-white"
                    >
                        <span>{{ $module->name }}</span>

                        <svg
                            :class="open ? 'rotate-180 text-white' : 'text-gray-400'"
                            class="h-4 w-4 transform transition-transform duration-200 group-hover:text-white"
                            fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24"
                        >
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    <div x-show="open" x-collapse
                         class="ml-3 space-y-1 border-l border-white/10 pl-3">
                        @foreach($module->permissions as $permission)
                            <a
                                href="{{ url($permission->route) }}"
                                class="block rounded-md px-3 py-2 text-sm font-medium
                                transition-all duration-150
                                {{ request()->routeIs($permission->route)
                                    ? 'bg-white/10 text-white'
                                    : 'text-gray-400 hover:bg-white/5 hover:text-white' }}"
                            >
                                {{ $permission->name }}
                            </a>
                        @endforeach
                    </div>

                </div>

            @endforeach
        </div>
    @endauth

</nav>


<div class="mt-6 border-t border-white/10 pt-4 space-y-2">

    @guest
        <a
            href="{{ route('login') }}"
            class="block rounded-md px-4 py-2 text-sm font-medium text-gray-300
            hover:bg-white/5 hover:text-white transition"
        >
            Login
        </a>

        <a
            href="{{ route('register') }}"
            class="block rounded-md px-4 py-2 text-sm font-medium text-gray-300
            hover:bg-white/5 hover:text-white transition"
        >
            Register
        </a>
    @endguest

    @auth
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button
                type="submit"
                class="w-full rounded-md px-4 py-2 text-left text-sm font-medium
                text-gray-300 hover:bg-red-500/10 hover:text-red-400 transition"
            >
                Logout
            </button>
        </form>
    @endauth

</div>





        {{-- FOOTER --}}
        <div class="mt-6 border-t border-white/10 pt-4 text-center">
            <p class="text-xs text-gray-500">
                © {{ date('Y') }} ND Bank
            </p>
        </div>

    </div>
</aside>
