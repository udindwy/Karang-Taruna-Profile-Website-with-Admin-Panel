<x-app-layout>
    <x-slot name="header">
        {{ __('Edit Berita') }}
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl rounded-xl">
                <div class="p-8 text-gray-900">
                    <form action="{{ route('admin.news.update', $news->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-6">
                            <label for="title" class="block text-gray-700 font-bold mb-2">Judul</label>
                            <input type="text" name="title" id="title" class="shadow appearance-none border border-gray-300 rounded-lg w-full py-3 px-4 text-gray-900 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ old('title', $news->title) }}" required>
                        </div>
                        <div class="mb-6">
                            <label for="content" class="block text-gray-700 font-bold mb-2">Isi Berita</label>
                            <textarea name="content" id="content" rows="10" class="shadow appearance-none border border-gray-300 rounded-lg w-full py-3 px-4 text-gray-900 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500" required>{{ old('content', $news->content) }}</textarea>
                        </div>
                        <div class="mb-6">
                            <label for="image" class="block text-gray-700 font-bold mb-2">Gambar (Opsional)</label>
                            <input type="file" name="image" id="image" class="shadow appearance-none border border-gray-300 rounded-lg w-full py-3 px-4 text-gray-900 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500">
                            @if ($news->image)
                                <div class="mt-4">
                                    <p class="text-gray-700">Gambar saat ini:</p>
                                    <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->title }}" class="w-64 mt-2 rounded-lg shadow-md">
                                </div>
                            @endif
                        </div>
                        <div class="mb-6">
                            <label for="published_at" class="block text-gray-700 font-bold mb-2">Tanggal Publikasi</label>
                            <input type="date" name="published_at" id="published_at" class="shadow appearance-none border border-gray-300 rounded-lg w-full py-3 px-4 text-gray-900 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ old('published_at', $news->published_at ? $news->published_at->format('Y-m-d') : '') }}" required>
                        </div>
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg focus:outline-none focus:shadow-outline transition transform hover:scale-105">
                            Perbarui
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>