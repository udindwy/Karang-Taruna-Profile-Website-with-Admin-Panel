<x-app-layout>
    <x-slot name="header">
        {{ __('Dashboard') }}
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- Grid dikembalikan menjadi 4 kolom --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">

                <a href="{{ route('admin.members.index') }}"
                    class="bg-white p-6 rounded-lg shadow-lg flex items-center justify-between transition-transform duration-300 transform hover:scale-105 hover:shadow-xl">
                    <div class="flex-shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="w-12 h-12 text-blue-500">
                            <path
                                d="M4.5 6.375a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM18.75 8.25a2.25 2.25 0 100-4.5 2.25 2.25 0 000 4.5zM12.75 19.5h7.5A2.25 2.25 0 0022.5 17.25v-1.125a9.75 9.75 0 00-5.85-8.917 4.5 4.5 0 01-2.28 7.371l-.106.012a4.5 4.5 0 01-2.281-7.371 9.75 9.75 0 00-5.85 8.917V17.25A2.25 2.25 0 004.5 19.5h7.5zM2.25 17.25A2.25 2.25 0 014.5 15h3.75a2.25 2.25 0 010 4.5H4.5a2.25 2.25 0 01-2.25-2.25z" />
                        </svg>
                    </div>
                    <div class="text-right">
                        <p class="text-2xl font-bold">{{ $totalMembers }}</p>
                        <p class="text-gray-500">Total Pengurus</p>
                    </div>
                </a>

                <a href="{{ route('admin.programs.index') }}"
                    class="bg-white p-6 rounded-lg shadow-lg flex items-center justify-between transition-transform duration-300 transform hover:scale-105 hover:shadow-xl">
                    <div class="flex-shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="w-12 h-12 text-green-500">
                            <path fill-rule="evenodd"
                                d="M6.75 2.25A.75.75 0 017.5 3v1.5h.75a.75.75 0 01.75.75v.75H10.5a.75.75 0 01.75.75V8.25a.75.75 0 01.75.75v.75H13.5a.75.75 0 01.75.75v.75H15a.75.75 0 01.75.75v.75H17.25a.75.75 0 01.75.75v.75H19.5a.75.75 0 01.75.75v.75h1.5v-1.5H21V7.5a.75.75 0 01.75-.75h.75a.75.75 0 010-1.5h-.75V3A.75.75 0 0121 2.25h-1.5a.75.75 0 01-.75.75v1.5H18a.75.75 0 01-.75-.75V3A.75.75 0 0116.5 2.25h-1.5a.75.75 0 01-.75.75v1.5H13.5a.75.75 0 01-.75-.75V3a.75.75 0 01-.75-.75h-1.5a.75.75 0 01-.75.75v1.5H9a.75.75 0 01-.75-.75V3a.75.75 0 01-.75-.75h-1.5a.75.75 0 01-.75.75v1.5H6a.75.75 0 01-.75-.75V3A.75.75 0 014.5 2.25h-1.5a.75.75 0 01-.75-.75V3h-.75a.75.75 0 000 1.5h.75v1.5H2.25a.75.75 0 000 1.5h1.5v1.5H2.25a.75.75 0 000 1.5h1.5v1.5H2.25a.75.75 0 000 1.5h1.5v1.5h-1.5a.75.75 0 000 1.5h1.5v1.5a.75.75 0 01-.75.75H3a.75.75 0 01-.75-.75V19.5H3a.75.75 0 01-.75-.75V18h-.75a.75.75 0 000-1.5h.75v-1.5h-.75a.75.75 0 000-1.5h.75V13.5H.75a.75.75 0 000-1.5h1.5V10.5H.75a.75.75 0 000-1.5h1.5V7.5H.75a.75.75 0 000-1.5h1.5z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="text-right">
                        <p class="text-2xl font-bold">{{ $totalPrograms }}</p>
                        <p class="text-gray-500">Total Program</p>
                    </div>
                </a>

                <a href="{{ route('admin.contacts.index') }}"
                    class="bg-white p-6 rounded-lg shadow-lg flex items-center justify-between transition-transform duration-300 transform hover:scale-105 hover:shadow-xl">
                    <div class="flex-shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="w-12 h-12 text-yellow-500">
                            <path fill-rule="evenodd"
                                d="M11.54 22.351A.75.75 0 0012 22.5a.75.75 0 00.46-.149l8.682-6.471c.143-.105.228-.273.228-.456V8.536a.75.75 0 00-.515-.718l-8.72-2.583a1.5 1.5 0 00-.81 0l-8.72 2.583a.75.75 0 00-.515.718v6.288c0 .183.085.351.228.456l8.682 6.472zM12 18.75h.008v.008H12v-.008z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="text-right">
                        <p class="text-2xl font-bold">{{ $totalContacts }}</p>
                        <p class="text-gray-500">Pesan Masuk</p>
                    </div>
                </a>

                <a href="{{ route('admin.news.index') }}"
                    class="bg-white p-6 rounded-lg shadow-lg flex items-center justify-between transition-transform duration-300 transform hover:scale-105 hover:shadow-xl">
                    <div class="flex-shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="w-12 h-12 text-red-500">
                            <path
                                d="M12.75 3.375c-.261 0-.522.01-.781.03C11.59 3.511 9.947 4.148 8.447 5.25A48.814 48.814 0 003 15.63c0 2.222-.509 4.417-1.442 6.452a.75.75 0 00.93.931c2.035-.933 4.23-1.442 6.452-1.442a48.814 48.814 0 0010.38 0c2.222 0 4.417.509 6.452 1.442a.75.75 0 00.93-1.417 48.814 48.814 0 00-1.442-6.452c1.102-1.5 1.739-3.143 1.999-4.755.02-.26.03-.522.03-.781a5.625 5.625 0 00-5.625-5.625A5.625 5.625 0 0012.75 3.375zm-6 2.625a.75.75 0 01.75-.75h1.5a.75.75 0 010 1.5h-1.5a.75.75 0 01-.75-.75zM8.25 9a.75.75 0 01.75-.75h1.5a.75.75 0 010 1.5H9a.75.75 0 01-.75-.75zm3 0a.75.75 0 01.75-.75h1.5a.75.75 0 010 1.5h-1.5a.75.75 0 01-.75-.75zm3 0a.75.75 0 01.75-.75h1.5a.75.75 0 010 1.5h-1.5a.75.75 0 01-.75-.75zm-6 3a.75.75 0 01.75-.75h1.5a.75.75 0 010 1.5h-1.5a.75.75 0 01-.75-.75zm3 0a.75.75 0 01.75-.75h1.5a.75.75 0 010 1.5h-1.5a.75.75 0 01-.75-.75zm3 0a.75.75 0 01.75-.75h1.5a.75.75 0 010 1.5h-1.5a.75.75 0 01-.75-.75zm-6 3a.75.75 0 01.75-.75h1.5a.75.75 0 010 1.5h-1.5a.75.75 0 01-.75-.75zm3 0a.75.75 0 01.75-.75h1.5a.75.75 0 010 1.5h-1.5a.75.75 0 01-.75-.75z" />
                        </svg>
                    </div>
                    <div class="text-right">
                        <p class="text-2xl font-bold">{{ $totalNews }}</p>
                        <p class="text-gray-500">Total Berita</p>
                    </div>
                </a>
            </div>

            <div class="bg-white p-8 rounded-lg shadow-xl mt-6">
                <h3 class="text-xl font-semibold text-gray-800 mb-4">Berita Terbaru</h3>
                <ul class="space-y-4">
                    @foreach (\App\Models\News::orderBy('created_at', 'desc')->limit(5)->get() as $item)
                        <li class="border-b border-gray-200 pb-2">
                            <a href="{{ route('admin.news.edit', $item->id) }}"
                                class="flex items-center space-x-4 hover:bg-gray-50 p-2 rounded">
                                @if ($item->image)
                                    <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}"
                                        class="w-16 h-16 object-cover rounded">
                                @endif
                                <div>
                                    <h4 class="font-semibold text-gray-900">{{ $item->title }}</h4>
                                    <p class="text-sm text-gray-500">Dipublikasi pada
                                        {{ $item->published_at ? $item->published_at->format('d M Y') : '' }}</p>
                                </div>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</x-app-layout>
