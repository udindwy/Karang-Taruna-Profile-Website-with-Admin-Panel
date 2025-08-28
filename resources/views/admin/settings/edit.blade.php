<x-app-layout>
    <x-slot name="header">
        {{ __('Pengaturan Website') }}
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl rounded-xl">
                <div class="p-8 text-gray-900">
                    <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        {{-- Pengaturan Dasar --}}
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8 pb-8 border-b border-gray-200">
                            <div>
                                <h3 class="text-lg font-semibold text-gray-800 mb-2">Pengaturan Dasar</h3>
                                <p class="text-sm text-gray-500">Informasi umum dan branding website Anda.</p>
                            </div>
                            <div class="space-y-6">
                                <div>
                                    <label for="site_name" class="block text-sm font-medium text-gray-700 mb-1">Nama
                                        Website</label>
                                    <input type="text" name="site_name" id="site_name"
                                        class="block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                                        value="{{ old('site_name', $setting->site_name ?? '') }}">
                                </div>

                                <div class="mb-6">
                                    <label for="logo" class="block text-gray-700 font-bold mb-2">Logo</label>
                                    <input type="file" name="logo" id="logo"
                                        class="shadow appearance-none border border-gray-300 rounded-lg w-full py-3 px-4 text-gray-900 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    @if ($setting->logo ?? false)
                                        <div class="mt-4">
                                            <p class="text-gray-700">Logo saat ini:</p>
                                            <img src="{{ asset('storage/' . $setting->logo) }}" alt="Website Logo"
                                                class="h-16 w-16 mt-2">
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        {{-- Informasi Kontak --}}
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8 pb-8 border-b border-gray-200">
                            <div>
                                <h3 class="text-lg font-semibold text-gray-800 mb-2">Informasi Kontak</h3>
                                <p class="text-sm text-gray-500">Detail kontak yang akan ditampilkan di halaman depan.
                                </p>
                            </div>
                            <div class="space-y-6">
                                <div>
                                    <label for="address"
                                        class="block text-sm font-medium text-gray-700 mb-1">Alamat</label>
                                    <textarea name="address" id="address" rows="3"
                                        class="block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('address', $setting->address ?? '') }}</textarea>
                                </div>
                                <div>
                                    <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Nomor
                                        Telepon</label>
                                    <input type="text" name="phone" id="phone"
                                        value="{{ old('phone', $setting->phone ?? '') }}"
                                        class="block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                                </div>
                                <div>
                                    <label for="email"
                                        class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                                    <input type="email" name="email" id="email"
                                        value="{{ old('email', $setting->email ?? '') }}"
                                        class="block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                                </div>
                            </div>
                        </div>

                        {{-- Link Sosial Media --}}
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <div>
                                <h3 class="text-lg font-semibold text-gray-800 mb-2">Sosial Media</h3>
                                <p class="text-sm text-gray-500">Link ke akun sosial media organisasi Anda.</p>
                            </div>
                            <div class="space-y-6">
                                <div>
                                    <label for="facebook"
                                        class="block text-sm font-medium text-gray-700 mb-1">Facebook</label>
                                    <input type="url" name="facebook" id="facebook"
                                        placeholder="https://facebook.com/..."
                                        value="{{ old('facebook', $setting->facebook ?? '') }}"
                                        class="block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                                </div>
                                <div>
                                    <label for="instagram"
                                        class="block text-sm font-medium text-gray-700 mb-1">Instagram</label>
                                    <input type="url" name="instagram" id="instagram"
                                        placeholder="https://instagram.com/..."
                                        value="{{ old('instagram', $setting->instagram ?? '') }}"
                                        class="block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                                </div>
                                <div>
                                    <label for="youtube"
                                        class="block text-sm font-medium text-gray-700 mb-1">YouTube</label>
                                    <input type="url" name="youtube" id="youtube"
                                        placeholder="https://youtube.com/..."
                                        value="{{ old('youtube', $setting->youtube ?? '') }}"
                                        class="block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                                </div>
                            </div>
                        </div>

                        <div class="mt-8 pt-6 border-t border-gray-200">
                            <button type="submit"
                                class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg focus:outline-none focus:shadow-outline transition transform hover:scale-105">
                                Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
