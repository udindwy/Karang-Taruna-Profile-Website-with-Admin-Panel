<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Galeri Foto | {{ $setting->site_name ?? 'Karang Taruna' }}</title>
    @vite('resources/css/app.css')
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js" defer></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            AOS.init({
                once: true
            });
        });
    </script>
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
</head>

<body class="bg-white">

    @include('landing-page.components._header', ['setting' => $setting])

    <main>
        {{-- Header Halaman dengan Latar Belakang Gradien --}}
        <header class="bg-gradient-to-r from-blue-600 to-blue-800 text-white pt-32 pb-20">
            <div class="container mx-auto px-4 md:px-8">
                <nav class="text-sm font-semibold text-blue-200 mb-6" data-aos="fade-up">
                    <a href="{{ route('home') }}" class="hover:text-white">Beranda</a>
                    <span class="mx-2">/</span>
                    <span class="text-white">Galeri</span>
                </nav>
                <div data-aos="fade-up" data-aos-delay="100">
                    <h1 class="text-4xl font-extrabold tracking-tight">Galeri Foto</h1>
                    <p class="text-lg text-blue-200 max-w-3xl mt-2">
                        Semua momen terbaik dari kegiatan yang telah kami abadikan.
                    </p>
                </div>
            </div>
        </header>

        {{-- Section Konten Utama --}}
        <section id="gallery-page" class="py-16" x-data="{ isModalOpen: false, modalImageUrl: '', modalImageCaption: '' }">
            <div class="container mx-auto px-4 md:px-8">
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-6">
                    @forelse ($galleries as $gallery)
                        <button type="button"
                                @click="isModalOpen = true; modalImageUrl = '{{ asset('storage/' . $gallery->image) }}'; modalImageCaption = '{{ addslashes($gallery->caption) }}'"
                                class="group relative block w-full aspect-square overflow-hidden rounded-xl border border-slate-200 transition-all duration-300 ease-in-out hover:shadow-xl hover:-translate-y-2"
                                data-aos="zoom-in-up" data-aos-delay="{{ ($loop->index % 4) * 50 }}">

                            <img src="{{ asset('storage/' . $gallery->image) }}" alt="{{ $gallery->caption }}"
                                 class="absolute inset-0 w-full h-full object-cover transform transition-transform duration-300 ease-in-out group-hover:scale-110">

                            <div
                                class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col items-center justify-end p-4">
                                <p
                                    class="text-center text-white font-semibold text-sm transform translate-y-4 group-hover:translate-y-0 transition-transform duration-300">
                                    {{ $gallery->caption }}
                                </p>
                            </div>
                        </button>
                    @empty
                        <div class="col-span-full text-center py-12">
                            <p class="text-slate-500 text-lg">Saat ini belum ada foto di galeri.</p>
                        </div>
                    @endforelse
                </div>

                <div class="mt-16">
                    {{ $galleries->links() }}
                </div>
            </div>

            {{-- Komponen Modal/Lightbox --}}
            <div x-show="isModalOpen" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
                 x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200"
                 x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                 class="fixed inset-0 z-[999] flex items-center justify-center bg-black bg-opacity-80 p-4"
                 @keydown.escape.window="isModalOpen = false" x-cloak>
                <div @click="isModalOpen = false" class="absolute inset-0"></div>
                <div class="relative max-w-4xl max-h-[90vh] mx-auto" x-show="isModalOpen">
                    <img :src="modalImageUrl" alt="Tampilan Penuh" class="rounded-lg object-contain h-full w-full">
                    <p x-text="modalImageCaption" class="mt-2 text-center text-white/80 text-sm" x-show="modalImageCaption"></p>
                    <button @click="isModalOpen = false"
                            class="absolute -top-4 -right-4 lg:-right-12 h-10 w-10 flex items-center justify-center bg-white rounded-full text-slate-800 hover:bg-slate-200 focus:outline-none">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </section>
    </main>

    @include('landing-page.components._footer', ['setting' => $setting])
</body>
</html>