<section id="programs" class="py-20 px-4 md:px-8 bg-slate-50">
    <div class="container mx-auto">

        {{-- Bagian Judul Section --}}
        <div class="text-center mb-16" data-aos="fade-up">
            <h2 class="text-4xl font-extrabold text-slate-800 mb-4 tracking-tight">Program & Kegiatan</h2>
            <div class="h-1 w-24 mx-auto bg-blue-600 rounded-full"></div>
            <p class="text-lg text-slate-500 max-w-3xl mx-auto mt-6">
                Agenda dan program kerja unggulan yang kami selenggarakan.
            </p>
        </div>

        {{-- Grid untuk Kartu Program --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse ($programs as $program)
                <div class="group relative bg-white rounded-xl flex flex-col overflow-hidden border border-slate-200 transition-all duration-300 ease-in-out hover:shadow-lg hover:-translate-y-2"
                    data-aos="fade-up" data-aos-delay="{{ ($loop->index % 3) * 100 }}">

                    {{-- Gambar Program --}}
                    <div class="flex-shrink-0 overflow-hidden">
                        <img src="{{ asset('storage/' . $program->photo) }}" alt="{{ $program->title }}"
                            class="w-full h-48 object-cover transform transition-transform duration-300 group-hover:scale-105">
                    </div>

                    {{-- Kategori Program (Tag/Badge) --}}
                    @if ($program->category)
                        <div
                            class="absolute top-4 right-4 bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded-full z-10">
                            {{ $program->category->name }}
                        </div>
                    @endif

                    {{-- Konten Teks --}}
                    <div class="p-6 flex-grow flex flex-col">
                        <p class="text-sm text-slate-500 mb-2">
                            {{ $program->created_at->translatedFormat('d F Y') }}
                        </p>
                        <h3 class="text-lg font-bold text-slate-800 mb-2 flex-grow">{{ $program->title }}</h3>
                        <p class="text-slate-600 text-sm leading-relaxed line-clamp-3 mb-4">{{ $program->description }}
                        </p>

                        {{-- Tombol "Lihat Detail" --}}
                        <div class="mt-auto">
                            <a href="{{ route('program.show', $program) }}"
                                class="inline-flex items-center text-sm font-semibold text-blue-600 group-hover:text-blue-800 transition-colors">
                                Lihat Detail
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="ml-1 h-4 w-4 transform group-hover:translate-x-1 transition-transform"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-1 md:col-span-2 lg:col-span-3 text-center py-12">
                    <p class="text-slate-500 text-lg">Saat ini belum ada program yang ditampilkan.</p>
                </div>
            @endforelse
        </div>

        {{-- [DIUBAH] Pagination diganti dengan tombol "Lihat Semua" --}}
        <div class="mt-12 text-center" data-aos="fade-up">
            <a href="{{ route('programs.index') }}"
                class="inline-block bg-blue-600 text-white font-semibold px-8 py-3 rounded-lg hover:bg-blue-700 transition-colors">
                Lihat Semua Program
            </a>
        </div>
    </div>
</section>
