<x-layout>
    <x-slot:heading>My Images</x-slot:heading>

   <x-success-message/>  

    {{-- UPLOAD FORM --}}
    <div class="m-10 rounded-xl bg-gray-900 p-6 shadow-lg border border-gray-800">
        <h2 class="mb-4 text-lg font-semibold text-white">Upload New Image</h2>

        <form method="POST"
              action="{{ route('image.upload') }}"
              enctype="multipart/form-data"
              class="space-y-5">

            @csrf

            <div>
                <label class="block text-sm font-medium text-gray-300 mb-1">
                    Choose Image
                </label>

                <input type="file"
                       name="image"
                       accept="image/*"
                       required
                       class="block w-full text-sm text-gray-300
                              file:mr-4 file:rounded file:border-0
                              file:bg-gray-800 file:px-4 file:py-2
                              file:text-gray-300 hover:file:bg-gray-700">
            </div>

            @error('image')
                <p class="text-red-400 text-sm">{{ $message }}</p>
            @enderror

            <button
                type="submit"
                class="inline-flex items-center rounded-lg bg-indigo-600 px-5 py-2.5
                       text-sm font-medium text-white hover:bg-indigo-500
                       transition">
                Upload Image
            </button>
        </form>
    </div>

    {{-- IMAGE LIST --}}
    <div class="ml-10">
        <h2 class="mb-6 text-lg font-semibold text-white">Your Uploaded Images</h2>

        @if($images->isEmpty())
            <p class="text-gray-400">No images uploaded yet.</p>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach($images as $image)
                    <div
                        class="group overflow-hidden rounded-xl border border-gray-800
                               bg-gray-900 shadow hover:shadow-xl transition">

                        <img
                            src="{{ route('image.view', $image->id) }}"
                            alt="Uploaded image"
                            class="h-44 w-full object-cover
                                   group-hover:scale-105 transition-transform duration-300">

                        <div class="p-3">
                            <p class="truncate text-xs text-gray-400">
                                {{ $image->file_name }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

</x-layout>
