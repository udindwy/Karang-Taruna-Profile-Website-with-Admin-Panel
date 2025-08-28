<x-app-layout>
    <x-slot name="header">
        {{ __('Manajemen Hero Section') }}
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl rounded-xl">
                <div class="p-8 text-gray-900">
                    <form action="{{ route('admin.hero.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-6">
                            <label for="title" class="block text-gray-700 font-bold mb-2">Judul</label>
                            <input type="text" name="title" id="title" class="shadow appearance-none border border-gray-300 rounded-lg w-full py-3 px-4 text-gray-900 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ old('title', $heroSection->title) }}" required>
                        </div>

                        <div class="mb-6">
                            <label for="subtitle" class="block text-gray-700 font-bold mb-2">Deskripsi Singkat</label>
                            <textarea name="subtitle" id="subtitle" rows="3" class="shadow appearance-none border border-gray-300 rounded-lg w-full py-3 px-4 text-gray-900 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('subtitle', $heroSection->subtitle) }}</textarea>
                        </div>

                        <div class="mb-6">
                            <label for="image" class="block text-gray-700 font-bold mb-2">Gambar/Banner</label>
                            <input type="file" name="image" id="image" class="shadow appearance-none border border-gray-300 rounded-lg w-full py-3 px-4 text-gray-900 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500">
                            @if ($heroSection->image)
                                <div class="mt-4">
                                    <p class="text-gray-700">Gambar saat ini:</p>
                                    <img src="{{ asset('storage/' . $heroSection->image) }}" alt="Hero Image" class="w-64 mt-2 rounded-lg shadow-md">
                                </div>
                            @endif
                        </div>

                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg focus:outline-none focus:shadow-outline transition transform hover:scale-105">
                            Simpan Perubahan
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>