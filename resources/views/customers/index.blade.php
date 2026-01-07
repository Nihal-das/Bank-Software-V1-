<x-layout>
    <x-slot:heading> Home </x-slot:heading>
    <div class="ml-10 relative isolate overflow-hidden bg-gray-900 py-24 sm:py-32">
        <img
            src="https://images.unsplash.com/photo-1521737604893-d14cc237f11d?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&crop=focalpoint&fp-y=.8&w=2830&h=1500&q=80&blend=111827&sat=-100&exp=15&blend-mode=multiply"
            alt=""
            class="absolute inset-0 -z-10 size-full object-cover object-right md:object-center"
        />
        <div aria-hidden="true" class="hidden sm:absolute sm:-top-10 sm:right-1/2 sm:-z-10 sm:mr-10 sm:block sm:transform-gpu sm:blur-3xl">
            <div
                style="
                    clip-path: polygon(
                        74.1% 44.1%,
                        100% 61.6%,
                        97.5% 26.9%,
                        85.5% 0.1%,
                        80.7% 2%,
                        72.5% 32.5%,
                        60.2% 62.4%,
                        52.4% 68.1%,
                        47.5% 58.3%,
                        45.2% 34.5%,
                        27.5% 76.7%,
                        0.1% 64.9%,
                        17.9% 100%,
                        27.6% 76.8%,
                        76.1% 97.7%,
                        74.1% 44.1%
                    );
                "
                class="aspect-1097/845 w-274.25 bg-linear-to-tr from-[#ff4694] to-[#776fff] opacity-20"
            ></div>
        </div>
        <div aria-hidden="true" class="absolute -top-52 left-1/2 -z-10 -translate-x-1/2 transform-gpu blur-3xl sm:-top-112 sm:ml-16 sm:translate-x-0">
            <div
                style="
                    clip-path: polygon(
                        74.1% 44.1%,
                        100% 61.6%,
                        97.5% 26.9%,
                        85.5% 0.1%,
                        80.7% 2%,
                        72.5% 32.5%,
                        60.2% 62.4%,
                        52.4% 68.1%,
                        47.5% 58.3%,
                        45.2% 34.5%,
                        27.5% 76.7%,
                        0.1% 64.9%,
                        17.9% 100%,
                        27.6% 76.8%,
                        76.1% 97.7%,
                        74.1% 44.1%
                    );
                "
                class="aspect-1097/845 w-274.25 bg-linear-to-tr from-[#ff4694] to-[#776fff] opacity-20"
            ></div>
        </div>

        <div class="mx-auto mb-20 grid max-w-7xl grid-cols-2 justify-between px-6 align-middle lg:px-8 gap-8">
            <div class="border-2 border-white rounded-3xl">

                <p class="bg-white/15 rounded-xl font-sans text-3xl font-extrabold text-center py-10">Bank Balance : ₹{{ $bankBalance }}</p>
            </div>
            <div class="border-2 border-white rounded-3xl">
                <p class="bg-white/15 rounded-xl font-sans text-3xl font-extrabold text-center py-10">Cash Balance : ₹{{ $cashBalance }}</p>
            </div>
        </div>
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl lg:mx-0">
                <h2 class="text-5xl font-semibold tracking-tight text-white sm:text-7xl"> ND Banking Software </h2>
                <p class="mt-8 text-lg font-medium text-pretty text-gray-300 sm:text-xl/8">
                  ND Banking Suite is a secure, modern platform that streamlines customer management, loan processing, and transactions. Built with scalable architecture, it ensures efficiency, accuracy, and strong data protection. Designed for institutions of all sizes, it delivers transparent and seamless banking experiences.  
                </p>
            </div>
            <div class="mx-auto mt-10 max-w-2xl lg:mx-0 lg:max-w-none">
                <div class="grid grid-cols-1 gap-x-8 gap-y-6 text-base/7 font-semibold text-white sm:grid-cols-2 md:flex lg:gap-x-10">
                    <a href="/create">Create Customer <span aria-hidden="true">&rarr;</span></a>
                    <a href="/transactions">Transactions <span aria-hidden="true">&rarr;</span></a>
                    <a href="/loans/create">Create Loan <span aria-hidden="true">&rarr;</span></a>
                    <a href="/images">Image Upload <span aria-hidden="true">&rarr;</span></a>
                    <a href="{{ route('roles.create') }}">Role Create <span aria-hidden="true">&rarr;</span></a>
                </div>
                <dl class="mt-16 grid grid-cols-1 gap-8 sm:mt-20 sm:grid-cols-2 lg:grid-cols-4">
                    <div class="flex flex-col-reverse gap-1">
                        <dt class="text-base/7 text-gray-300">Offices worldwide</dt>
                        <dd class="text-4xl font-semibold tracking-tight text-white">12</dd>
                    </div>
                    <div class="flex flex-col-reverse gap-1">
                        <dt class="text-base/7 text-gray-300">Support</dt>
                        <dd class="text-4xl font-semibold tracking-tight text-white">24 / 7</dd>
                    </div>
                    <div class="flex flex-col-reverse gap-1">
                        <dt class="text-base/7 text-gray-300">Employees</dt>
                        <dd class="text-4xl font-semibold tracking-tight text-white">40+</dd>
                    </div>
                    <div class="flex flex-col-reverse gap-1">
                        <dt class="text-base/7 text-gray-300">Paid time off</dt>
                        <dd class="text-4xl font-semibold tracking-tight text-white">Unlimited</dd>
                    </div>
                </dl>
            </div>
        </div>
    </div>
</x-layout>
