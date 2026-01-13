<x-layout>
    <x-slot:heading> Update Customer </x-slot:heading>
 
    <x-success-message/>  

    <div class="flex flex-auto">

    <div class="mt-16 mx-auto min-w-3xl rounded-2xl bg-white/5 p-10 shadow-xl backdrop-blur mb-28">
        
        <form action="{{ route('customer.update' , $customer->id) }}" method="POST">
            @csrf
            @method('PATCH')

            
            <div class="mb-10 text-center">
                <h2 class="text-4xl font-bold text-white">
                    Update Customer
                </h2>
                <p class="mt-2 text-gray-400">
                    Update Customer details below
                </p>
            </div>

            
            <div class="space-y-8">
                
                <div>
                    <label class="block text-lg font-medium text-white">
                        Customer Name
                    </label>
                    <input
                        type="text"
                        name="name"
                        placeholder="Ramu"
                        value="{{ $customer->name }}"
                        class="mt-2 w-full rounded-lg border border-white/10 bg-transparent px-4 py-3 text-white placeholder-gray-500 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500/30"
                    />
                    @error('name')
                        <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

               
                <div>
                    <label class="block text-lg font-medium text-white">
                        
                        Phone number
                    </label>
                    <input
                        type="number"
                        name="Phone"
                        placeholder="9622547861"
                        value="{{ $customer->phone_number }}"
                        class="mt-2 w-full rounded-lg border border-white/10 bg-transparent px-4 py-3 text-white placeholder-gray-500 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500/30"
                    />
                    @error('Phone')
                        <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            </div>

           
            
            <div class="mt-12 flex justify-end">
                <button
                    type="submit"
                    class="rounded-xl bg-indigo-600 px-8 py-3 text-lg font-semibold text-white shadow-md transition-all duration-200 hover:-translate-y-1 hover:bg-green-600 hover:shadow-xl"
                >
                   Update
                </button>
            </div>
        </form>                
    </div>

    
        
    </div>
   
    

    
</x-layout>
