<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Berita | {{ $setting->site_name ?? 'Karang Taruna' }}</title>
    @vite('resources/css/app.css')
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js" defer></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() { AOS.init({ once: true }); });
    </script>
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
                    <span class="text-white">Berita</span>
                </nav>
                <div data-aos="fade-up" data-aos-delay="100">
                    <h1 class="text-4xl font-extrabold tracking-tight">Arsip Berita</h1>
                    <p class="text-lg text-blue-200 max-w-3xl mt-2">
                        Semua perkembangan dan berita terkini dari Karang Taruna kami.
                    </p>
                </div>
            </div>
        </header>

        {{-- Section Konten Utama --}}
        <section id="news-page" class="py-16">
            <div class="container mx-auto px-4 md:px-8">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @forelse ($news as $item)
                        <a href="{{ route('news.show', $item) }}"
                           class="group bg-white rounded-xl flex flex-col overflow-hidden border border-slate-200 transition-all duration-300 ease-in-out hover:shadow-xl hover:-translate-y-2"
                           data-aos="fade-up" data-aos-delay="{{ ($loop->index % 3) * 100 }}">
                            @if ($item->image)
                                <div class="flex-shrink-0 overflow-hidden">
                                    <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}"
                                         class="w-full h-48 object-cover transform transition-transform duration-300 group-hover:scale-105">
                                </div>
                            @endif
                            <div class="p-6 flex-grow flex flex-col">
                                <div class="flex items-center text-sm text-slate-500 mb-2">
                                    <span>{{ $item->category->name ?? 'Berita' }}</span>
                                    <span class="mx-2">&bull;</span>
                                    <span>{{ $item->published_at ? $item->published_at->translatedFormat('d M Y') : '' }}</span>
                                </div>
                                <h3 class="text-xl font-bold text-slate-800 mb-2 flex-grow">{{ $item->title }}</h3>
                                <p class="text-slate-600 text-sm leading-relaxed line-clamp-3 mb-4">{{ Str::limit(strip_tags($item->content), 150) }}</p>
                                <div class="mt-auto">
                                    <span class="inline-flex items-center text-sm font-semibold text-blue-600 group-hover:text-blue-800 transition-colors">
                                        Baca Selengkapnya
                                        <svg class="ml-1 h-4 w-4 transform group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" /></svg>
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

                <div class="mt-16">
                    {{ $news->links() }}
                </div>
            </div>
        </section>
    </main>

    @include('landing-page.components._footer', ['setting' => $setting])
</body>
</html>