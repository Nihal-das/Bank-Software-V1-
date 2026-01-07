

<nav
    class="relative z-50 bg-gray-800 after:pointer-events-none after:absolute after:inset-x-0 after:bottom-0 after:h-px after:bg-white/10 py-5"
>
    <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
        <div class="relative flex h-16 items-center justify-between">
            <!-- Logo -->
            

            <!-- Navigation -->
            <div
                class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between"
            >
                <!-- Left links -->
                <div class="flex space-x-4">
                    <a
                        href="/"
                        class="rounded-md px-3 py-2 text-lg font-medium hover:no-underline
                         {{ request()->is('/') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-white/5 hover:text-white' }}"
                    >
                        Home
                    </a>

                    <a
                        href="{{ route('dashboard') }}"
                        class="rounded-md px-3 py-2 text-lg font-medium hover:no-underline
                         {{ request()->is('dashboard') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-white/5 hover:text-white' }}"
                    >
                        Dashboard
                    </a>

                    <a
                        href="/loans/repay"
                        class="rounded-md px-3 py-2 text-lg font-medium hover:no-underline
                       {{ request()->is('loans/repay') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-white/5 hover:text-white' }}"
                    >
                       Loan Repay
                    </a>
                </div>

                @guest

                <!-- Right links -->
                <div class="flex space-x-4">
                    <a
                        href="/login"
                        class="rounded-md px-3 py-2 text-sm font-medium hover:no-underline
                       {{ request()->is('login') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-white/5 hover:text-white' }}"
                    >
                        Login
                    </a>
                    <a
                        href="/register"
                        class="rounded-md px-3 py-2 text-sm font-medium hover:no-underline
                       {{ request()->is('register') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-white/5 hover:text-white' }}"
                    >
                        Register
                    </a>
                </div>
                @endguest 
                @auth
                <div class="flex space-x-4">
                    <a
                        href="{{ route('customers.show_all') }}"
                        class="rounded-md px-3 py-2 text-lg font-medium hover:no-underline
                       {{ request()->is('customers') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-white/5 hover:text-white' }}"
                    >
                        Customers
                    </a>

                    <form action="/logout" method="post">
                        @csrf
                        <button
                            type="submit"
                            class="rounded-md px-3 py-2 text-lg font-medium text-gray-300 hover:bg-white/5 hover:text-white"
                        >
                            Log Out
                        </button>
                    </form>
                </div>
                @endauth
            </div>
        </div>
    </div>
</nav>


