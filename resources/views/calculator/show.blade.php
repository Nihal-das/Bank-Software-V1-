<x-layout>
    <x-slot:heading>
        Calculator 🧮
    </x-slot:heading>

    <div class="min-h-[80vh] flex items-center justify-center">
        <div class="bg-gray-900 rounded-2xl shadow-2xl w-full max-w-sm p-6 border border-white/10">

            {{-- Display --}}
            <div class="bg-black text-green-400 rounded-lg p-4 mb-6 text-right font-mono">
                <div class="text-sm opacity-60">Expression</div>
                <div id="display" class="text-3xl break-all">
                   {{ $expression . " = " . $result }}
                </div>
            </div>

            {{-- Hidden form --}}
            <form id="calcForm" action="{{ route('calculator.calculate') }}" method="POST">
                @csrf

            <input type="hidden" name="expression" id="expressionInput">
                 
            </form>

            {{-- Buttons --}}
            <div class="grid grid-cols-4 gap-3">

                {{-- Row 1 --}}
                <button onclick="clearDisplay()" class="col-span-2 bg-red-600 hover:bg-red-700 calc-btn">
                    AC
                </button>
                <button onclick="append('/')" class="bg-indigo-600 hover:bg-indigo-700 calc-btn">÷</button>
                <button onclick="append('*')" class="bg-indigo-600 hover:bg-indigo-700 calc-btn">×</button>

                {{-- Row 2 --}}
                <button onclick="append('7')" class="calc-btn">7</button>
                <button onclick="append('8')" class="calc-btn">8</button>
                <button onclick="append('9')" class="calc-btn">9</button>
                <button onclick="append('-')" class="bg-indigo-600 hover:bg-indigo-700 calc-btn">−</button>

                {{-- Row 3 --}}
                <button onclick="append('4')" class="calc-btn">4</button>
                <button onclick="append('5')" class="calc-btn">5</button>
                <button onclick="append('6')" class="calc-btn">6</button>
                <button onclick="append('+')" class="bg-indigo-600 hover:bg-indigo-700 calc-btn">+</button>

                {{-- Row 4 --}}
                <button onclick="append('1')" class="calc-btn">1</button>
                <button onclick="append('2')" class="calc-btn">2</button>
                <button onclick="append('3')" class="calc-btn">3</button>
                <button onclick="calculate()" class="row-span-2 bg-green-600 hover:bg-green-700 calc-btn">
                    =
                </button>

                {{-- Row 5 --}}
                <button onclick="append('0')" class="col-span-2 calc-btn">0</button>
                <button onclick="append('.')" class="calc-btn">.</button>

            </div>

            {{-- Error --}}

           <x-error-messsage/>
        </div>
    </div>

    {{-- Styles --}}
    <style>
        .calc-btn {
            @apply bg-gray-800 text-white font-semibold py-4 rounded-xl
                   hover:bg-gray-700 active:scale-95 transition;
        }
    </style>

    {{-- Script --}}
    <script>
        let display = document.getElementById('display');
        let input = document.getElementById('expressionInput');

        function append(value) {
            if (display.innerText === '0') {
                display.innerText = value;
            } else {
                display.innerText += value;
            }
        }

        function clearDisplay() {
            display.innerText = '0';
        }

        function calculate() {
            input.value = display.innerText;
            document.getElementById('calcForm').submit();
        }
    </script>
</x-layout>
