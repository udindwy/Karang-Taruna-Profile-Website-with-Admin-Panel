<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Program & Kegiatan | {{ $setting->site_name ?? 'Karang Taruna' }}</title>
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
                    <span class="text-white">Program</span>
                </nav>
                <div data-aos="fade-up" data-aos-delay="100">
                    <h1 class="text-4xl font-extrabold tracking-tight">Program & Kegiatan</h1>
                    <p class="text-lg text-blue-200 max-w-3xl mt-2">
                        Semua agenda dan program kerja unggulan yang kami selenggarakan.
                    </p>
                </div>
            </div>
        </header>

        {{-- Section Konten Utama --}}
        <section id="programs-page" class="py-16">
            <div class="container mx-auto px-4 md:px-8">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @forelse ($programs as $program)
                        <div class="group relative bg-white rounded-xl flex flex-col overflow-hidden border border-slate-200 transition-all duration-300 ease-in-out hover:shadow-lg hover:-translate-y-2"
                            data-aos="fade-up" data-aos-delay="{{ ($loop->index % 3) * 100 }}">

                            <div class="flex-shrink-0 overflow-hidden">
                                <img src="{{ asset('storage/' . $program->photo) }}" alt="{{ $program->title }}"
                                    class="w-full h-48 object-cover transform transition-transform duration-300 group-hover:scale-105">
                            </div>

                            @if ($program->category)
                                <div
                                    class="absolute top-4 right-4 bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded-full z-10">
                                    {{ $program->category->name }}
                                </div>
                            @endif

                            <div class="p-6 flex-grow flex flex-col">
                                <p class="text-sm text-slate-500 mb-2">
                                    {{ $program->created_at->translatedFormat('d F Y') }}
                                </p>
                                <h3 class="text-lg font-bold text-slate-800 mb-2 flex-grow">{{ $program->title }}</h3>
                                <p class="text-slate-600 text-sm leading-relaxed line-clamp-3 mb-4">
                                    {{ $program->description }}</p>
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

                <div class="mt-16">
                    {{ $programs->links() }}
                </div>
            </div>
        </section>
    </main>

    @include('landing-page.components._footer', ['setting' => $setting])
</body>

</html>
