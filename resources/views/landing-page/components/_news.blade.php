<section id="news" class="py-20 px-4 md:px-8 bg-slate-50">
    <div class="container mx-auto">
        {{-- Judul Section yang Konsisten --}}
        <div class="text-center mb-16" data-aos="fade-up">
            <h2 class="text-4xl font-extrabold text-slate-800 mb-4 tracking-tight">Berita Terbaru</h2>
            <div class="h-1 w-24 mx-auto bg-blue-600 rounded-full"></div>
            <p class="text-lg text-slate-500 max-w-3xl mx-auto mt-6">
                Ikuti perkembangan dan berita terkini dari Karang Taruna kami.
            </p>
        </div>

        {{-- Grid untuk 3 Kartu Berita --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse ($news as $item)
                {{-- Seluruh kartu kini adalah sebuah link ke halaman detail berita --}}
                <a href="{{ route('news.show', $item) }}"
                    class="group bg-white rounded-xl flex flex-col overflow-hidden border border-slate-200 transition-all duration-300 ease-in-out hover:shadow-xl hover:-translate-y-2"
                    data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">

                    {{-- Gambar Berita --}}
                    @if ($item->image)
                        <div class="flex-shrink-0 overflow-hidden">
                            <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}"
                                class="w-full h-48 object-cover transform transition-transform duration-300 group-hover:scale-105">
                        </div>
                    @endif

                    {{-- Konten Teks --}}
                    <div class="p-6 flex-grow flex flex-col">
                        {{-- Metadata: Kategori & Tanggal --}}
                        <div class="flex items-center text-sm text-slate-500 mb-2">
                            <span>{{ $item->category->name ?? 'Berita' }}</span>
                            <span class="mx-2">&bull;</span>
                            <span>{{ $item->published_at ? $item->published_at->translatedFormat('d M Y') : '' }}</span>
                        </div>

                        <h3 class="text-xl font-bold text-slate-800 mb-2 flex-grow">{{ $item->title }}</h3>
                        <p class="text-slate-600 text-sm leading-relaxed line-clamp-3 mb-4">
                            {{ Str::limit(strip_tags($item->content), 150) }}</p>

                        {{-- Tombol "Baca Selengkapnya" --}}
                        <div class="mt-auto">
                            <span
                                class="inline-flex items-center text-sm font-semibold text-blue-600 group-hover:text-blue-800 transition-colors">
                                Baca Selengkapnya
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="ml-1 h-4 w-4 transform group-hover:translate-x-1 transition-transform"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7" />
                                </svg>
                            </span>
                        </div>
                    </div>
                </a>
            @empty
                <div class="col-span-full text-center py-12">
                    <p class="text-slate-500 text-lg">Saat ini belum ada berita yang ditampilkan.</p>
                </div>
            @endforelse
        </div>

        {{-- Tombol Lihat Semua Berita --}}
        <div class="mt-12 text-center" data-aos="fade-up">
            <a href="{{ route('news.index') }}"
                class="inline-block bg-blue-600 text-white font-semibold px-8 py-3 rounded-lg hover:bg-blue-700 transition-colors">
                Lihat Semua Berita
            </a>
        </div>
    </div>
</section>
