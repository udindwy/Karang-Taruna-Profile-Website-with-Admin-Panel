<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $news->title }} | {{ $setting->site_name ?? 'Karang Taruna' }}</title>

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

<body class="bg-slate-50 text-slate-800 font-sans">
    @include('landing-page.components._header', ['setting' => $setting])

    <main>
        {{-- Header Halaman dengan Latar Belakang Biru --}}
        <header class="bg-blue-600 text-white pt-32 pb-24">
            <div class="container mx-auto px-4 md:px-8 max-w-4xl" data-aos="fade-up">
                <nav class="text-sm font-semibold text-blue-200 mb-6">
                    <a href="{{ route('home') }}" class="hover:text-white">Beranda</a>
                    <span class="mx-2">/</span>
                    <a href="{{ route('news.index') }}" class="hover:text-white">Berita</a>
                    <span class="mx-2">/</span>
                    <span class="text-white">{{ Str::limit($news->title, 30) }}</span>
                </nav>

                <h1 class="text-4xl md:text-5xl font-extrabold tracking-tight">
                    {{ $news->title }}
                </h1>

                <div class="flex items-center space-x-4 mt-6">
                    <img class="h-12 w-12 rounded-full object-cover border-2 border-white/50"
                        src="{{ asset('storage/' . ($setting->logo ?? 'images/default-logo.png')) }}"
                        alt="Logo Karang Taruna">
                    <div>
                        <p class="font-semibold">Oleh {{ $setting->site_name ?? 'Karang Taruna' }}</p>
                        <p class="text-sm text-blue-200">
                            Dipublikasikan pada {{ $news->published_at->translatedFormat('d F Y') }}
                        </p>
                    </div>
                </div>
            </div>
        </header>

        {{-- Wrapper untuk menaikkan gambar --}}
        <div class="relative">
            <div class="container mx-auto px-4 md:px-8 max-w-4xl">
                @if ($news->image)
                    <figure class="-mt-16" data-aos="fade-up" data-aos-delay="100">
                        <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->title }}"
                            class="w-full h-auto object-cover rounded-xl shadow-lg transition-transform duration-300 ease-in-out hover:scale-105">
                        <figcaption class="mt-3 text-center text-sm text-slate-500">
                            Foto terkait berita: {{ $news->title }}
                        </figcaption>
                    </figure>
                @endif
            </div>
        </div>

        {{-- Konten Utama dengan Latar Belakang Putih --}}
        <div class="bg-white pt-12 pb-16">
            <div class="container mx-auto px-4 md:px-8 max-w-4xl">
                {{-- Tombol Share --}}
                <div class="py-4 border-y border-slate-200 mb-8" data-aos="fade-up" data-aos-delay="200">
                    <div x-data="{ shareLink: '{{ url()->current() }}', shareTitle: '{{ urlencode($news->title ?? 'Lihat ini') }}' }" class="flex items-center space-x-4">
                        <span class="font-semibold text-slate-700">Bagikan:</span>

                        {{-- Facebook --}}
                        <a :href="'https://www.facebook.com/sharer/sharer.php?u=' + shareLink" target="_blank"
                            class="text-slate-500 hover:text-blue-700 transition-colors" title="Bagikan ke Facebook">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>

                        {{-- Twitter --}}
                        <a :href="'https://twitter.com/intent/tweet?url=' + shareLink +
                            '&text=' + shareTitle" target="_blank" class="text-slate-500 hover:text-black transition-colors" title="Bagikan ke Twitter">
            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
        </a>

        {{-- WhatsApp --}}
        <a :href="'https:
                            //api.whatsapp.com/send?text=' + shareTitle + ' ' + shareLink"
                            target="_blank" class="text-slate-500 hover:text-green-500 transition-colors"
                            title="Bagikan ke WhatsApp">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path
                                    d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2 22l5.25-1.38c1.45.79 3.08 1.21 4.79 1.21 5.46 0 9.91-4.45 9.91-9.91S17.5 2 12.04 2zM12.04 20.15c-1.48 0-2.93-.4-4.2-1.15l-.3-.18-3.12.82.83-3.04-.2-.31c-.82-1.31-1.26-2.83-1.26-4.38 0-4.54 3.7-8.24 8.24-8.24 2.2 0 4.27.86 5.82 2.42 1.56 1.56 2.42 3.62 2.42 5.82-1.11e-15 4.55-3.7 8.24-8.24 8.24zm4.52-6.13c-.24-.12-1.45-.72-1.68-.8s-.39-.12-.55.12c-.16.24-.63.8-.78.96s-.29.18-.55.06c-.25-.12-1.08-.4-2.05-1.27s-1.47-1.92-1.65-2.24c-.17-.32-.01-.5.11-.62s.24-.28.36-.42c.12-.14.16-.24.24-.4s.04-.28-.02-.4c-.06-.12-.55-1.32-.75-1.81s-.4-.42-.55-.42h-.48c-.16 0-.42.06-.63.3s-.8.78-.8 1.9c0 1.12.82 2.2 1.06 2.44s1.63 2.48 3.96 3.5c.56.24 1.01.38 1.35.48.43.12.82.1.98-.06.19-.16.63-.65.72-.8s.09-.24.06-.36c-.03-.12-.1-.18-.24-.3z" />
                            </svg>
                        </a>

                        {{-- Instagram --}}
                        <a href="{{ $setting->instagram ?? '#' }}" target="_blank"
                            class="text-slate-500 hover:text-pink-600 transition-colors" title="Lihat di Instagram">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 012.792 2.792c.247.636.416 1.363.465 2.427.048 1.024.06 1.378.06 3.808s-.012 2.784-.06 3.808c-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-2.792 2.792c-.636.247-1.363.416-2.427.465-1.024.048-1.378.06-3.808.06s-2.784-.012-3.808-.06c-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-2.792-2.792c-.247-.636-.416-1.363-.465-2.427C2.013 14.784 2 14.43 2 12s.013-2.784.06-3.808c.049-1.064.218-1.791.465-2.427A4.902 4.902 0 015.318 2.965c.636-.247 1.363-.416 2.427-.465C8.766 2.013 9.12 2 11.55 2h.766zM12 6.845a5.155 5.155 0 100 10.31 5.155 5.155 0 000-10.31zm0 8.468a3.313 3.313 0 110-6.626 3.313 3.313 0 010 6.626zm5.823-7.728a1.238 1.238 0 100-2.475 1.238 1.238 0 000 2.475z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>

                        {{-- Salin Link --}}
                        <button @click="navigator.clipboard.writeText(shareLink); alert('Link disalin!')"
                            class="text-slate-500 hover:text-slate-900 transition-colors" title="Salin link">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                            </svg>
                        </button>
                    </div>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-4 gap-8 lg:gap-12">
                    <article class="lg:col-span-3 prose prose-lg prose-slate max-w-none" data-aos="fade-up"
                        data-aos-delay="250">
                        {!! $news->content !!}
                    </article>

                    <aside class="lg:col-span-1" data-aos="fade-up" data-aos-delay="300">
                        <div class="sticky top-28">
                            <h3 class="text-xl font-bold text-slate-900 mb-4 pb-3 border-b border-slate-200">Berita
                                Terkait</h3>
                            <ul class="space-y-4">
                                @forelse ($otherNews as $other)
                                    <li>
                                        <a href="{{ route('news.show', $other) }}"
                                            class="group flex items-center space-x-4">
                                            <img src="{{ asset('storage/' . $other->image) }}"
                                                alt="{{ $other->title }}"
                                                class="w-20 h-16 object-cover rounded-md flex-shrink-0">
                                            <div>
                                                <span
                                                    class="font-semibold text-slate-700 group-hover:text-blue-600 transition-colors leading-tight">{{ $other->title }}</span>
                                            </div>
                                        </a>
                                    </li>
                                @empty
                                    <li>
                                        <p class="text-slate-500">Tidak ada berita lain.</p>
                                    </li>
                                @endforelse
                            </ul>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </main>

    @include('landing-page.components._footer', ['setting' => $setting])
</body>

</html>
