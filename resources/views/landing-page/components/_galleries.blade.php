<section id="gallery" class="py-20 px-4 md:px-8 bg-slate-50" x-data="{ isModalOpen: false, modalImageUrl: '', modalImageCaption: '' }">
    <div class="container mx-auto">
        {{-- Judul Section yang Konsisten --}}
        <div class="text-center mb-16" data-aos="fade-up">
            <h2 class="text-4xl font-extrabold text-slate-800 mb-4 tracking-tight">Galeri Foto</h2>
            <div class="h-1 w-24 mx-auto bg-blue-600 rounded-full"></div>
            <p class="text-lg text-slate-500 max-w-3xl mx-auto mt-6">
                Momen-momen terbaik dari kegiatan yang telah kami abadikan.
            </p>
        </div>

        {{-- Grid untuk Galeri Foto --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse ($galleries as $gallery)
                <button type="button"
                    @click="isModalOpen = true; modalImageUrl = '{{ asset('storage/' . $gallery->image) }}'; modalImageCaption = '{{ addslashes($gallery->caption) }}'"
                    class="group relative block w-full aspect-square overflow-hidden rounded-xl border border-slate-200 transition-all duration-300 ease-in-out hover:shadow-xl hover:-translate-y-2"
                    data-aos="zoom-in-up" data-aos-delay="{{ ($loop->index % 4) * 50 }}">

                    <img src="{{ asset('storage/' . $gallery->image) }}" alt="{{ $gallery->caption }}"
                        class="absolute inset-0 w-full h-full object-cover transform transition-transform duration-300 ease-in-out group-hover:scale-110">

                    {{-- Overlay saat hover --}}
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col items-center justify-end p-4">
                        {{-- Keterangan Gambar --}}
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

        {{-- Tombol Lihat Galeri Lengkap --}}
        <div class="mt-12 text-center" data-aos="fade-up">
            <a href="{{ route('galleries.index') }}"
                class="inline-block bg-blue-600 text-white font-semibold px-8 py-3 rounded-lg hover:bg-blue-700 transition-colors">
                Lihat Galeri Lengkap
            </a>
        </div>
    </div>

    {{-- Komponen Modal/Lightbox untuk Gambar --}}
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
