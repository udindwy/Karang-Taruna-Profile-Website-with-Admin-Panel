<x-app-layout>
    <x-slot name="header">
        {{ __('Edit Pengurus') }}
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl rounded-xl">
                <div class="p-8 text-gray-900">
                    <form action="{{ route('admin.members.update', $member->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-6">
                            <label for="name" class="block text-gray-700 font-bold mb-2">Nama</label>
                            <input type="text" name="name" id="name" class="shadow appearance-none border border-gray-300 rounded-lg w-full py-3 px-4 text-gray-900 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ old('name', $member->name) }}" required>
                        </div>
                        <div class="mb-6">
                            <label for="position" class="block text-gray-700 font-bold mb-2">Jabatan</label>
                            <input type="text" name="position" id="position" class="shadow appearance-none border border-gray-300 rounded-lg w-full py-3 px-4 text-gray-900 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ old('position', $member->position) }}" required>
                        </div>
                        <div class="mb-6">
                            <label for="photo" class="block text-gray-700 font-bold mb-2">Foto</label>
                            <input type="file" name="photo" id="photo" class="shadow appearance-none border border-gray-300 rounded-lg w-full py-3 px-4 text-gray-900 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500">
                            @if ($member->photo)
                                <div class="mt-4">
                                    <p class="text-gray-700">Foto saat ini:</p>
                                    <img src="{{ asset('storage/' . $member->photo) }}" alt="{{ $member->name }}" class="w-24 h-24 object-cover mt-2 rounded-full shadow-md">
                                </div>
                            @endif
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