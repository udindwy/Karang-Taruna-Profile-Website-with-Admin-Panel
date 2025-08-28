<x-app-layout>
    <x-slot name="header">
        {{ __('Manajemen Galeri') }}
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-end mb-4">
                <a href="{{ route('admin.galleries.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg transition transform hover:scale-105">
                    Tambah Foto
                </a>
            </div>
            
            <div class="bg-white overflow-hidden shadow-xl rounded-xl">
                <div class="p-8 text-gray-900">
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                        @foreach($galleries as $gallery)
                            <div class="relative group overflow-hidden rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">
                                <img src="{{ asset('storage/' . $gallery->image) }}" alt="{{ $gallery->caption }}" class="w-full h-48 object-cover">
                                <div class="absolute inset-0 bg-black bg-opacity-40 flex flex-col justify-end p-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                    <p class="text-white text-sm font-semibold">{{ $gallery->caption }}</p>
                                    <div class="mt-2 flex space-x-2">
                                        <a href="{{ route('admin.galleries.edit', $gallery->id) }}" class="bg-indigo-600 hover:bg-indigo-700 text-white text-xs font-bold py-1 px-3 rounded-lg">Edit</a>
                                        <form action="{{ route('admin.galleries.destroy', $gallery->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus foto ini?')" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-600 hover:bg-red-700 text-white text-xs font-bold py-1 px-3 rounded-lg">Hapus</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    
                    <div class="mt-6">
                        {{ $galleries->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>