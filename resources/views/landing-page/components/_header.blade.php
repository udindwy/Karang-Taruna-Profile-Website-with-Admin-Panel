<nav id="main-nav" class="fixed top-0 z-50 w-full bg-blue-600 shadow-lg" x-data="{ open: false }">
    <div class="container mx-auto px-6 py-4 flex justify-between items-center">
        <div class="flex items-center">
            @if ($setting->logo ?? false)
                <img src="{{ asset('storage/' . $setting->logo) }}" alt="Logo" class="h-10 w-10 mr-2 rounded-lg">
            @endif
            <a href="{{ route('home') }}"
                class="text-2xl font-bold text-white">{{ $setting->site_name ?? 'Karang Taruna' }}</a>
        </div>

        <div class="hidden md:flex items-center space-x-8 text-white font-semibold">
            <a href="{{ route('home') }}#hero" class="nav-link {{ request()->is('/') ? 'text-blue-200' : '' }}"
                data-target="hero">Beranda</a>
            <a href="{{ route('home') }}#about" class="nav-link" data-target="about">Tentang Kami</a>
            <a href="{{ route('home') }}#members" class="nav-link" data-target="members">Pengurus</a>
            <a href="{{ route('home') }}#programs"
                class="nav-link {{ request()->is('program*') ? 'text-blue-200' : '' }}"
                data-target="programs">Program</a>
            <a href="{{ route('home') }}#gallery"
                class="nav-link {{ request()->is('galeri*') ? 'text-blue-200' : '' }}" data-target="gallery">Galeri</a>
            {{-- [DIPERBAIKI] Menggunakan 'berita*' sesuai dengan URL --}}
            <a href="{{ route('home') }}#news" class="nav-link {{ request()->is('berita*') ? 'text-blue-200' : '' }}"
                data-target="news">Berita</a>
            <a href="{{ route('home') }}#contact" class="nav-link" data-target="contact">Kontak</a>
        </div>

        <div class="md:hidden">
            <button @click="open = !open" class="text-white hover:text-blue-200 focus:outline-none">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24" stroke="currentColor">
                    <path x-show="!open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 6h16M4 12h16m-7 6h7" />
                    <path x-show="open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M6 18L18 6M6 6l12 12" style="display: none;" />
                </svg>
            </button>
        </div>
    </div>

    <div x-show="open" @click.away="open = false" class="md:hidden" style="display: none;">
        <div class="flex flex-col space-y-1 px-6 py-4 bg-blue-700 shadow-md">
            <a @click="open = false" href="{{ route('home') }}#hero"
                class="nav-link-mobile rounded-md py-2 px-3 transition-colors {{ request()->is('/') ? 'bg-blue-800 text-white' : 'text-blue-200 hover:bg-blue-800' }}"
                data-target="hero">Beranda</a>
            <a @click="open = false" href="{{ route('home') }}#about"
                class="nav-link-mobile rounded-md py-2 px-3 text-blue-200 hover:bg-blue-800 transition-colors"
                data-target="about">Tentang Kami</a>
            <a @click="open = false" href="{{ route('home') }}#members"
                class="nav-link-mobile rounded-md py-2 px-3 text-blue-200 hover:bg-blue-800 transition-colors"
                data-target="members">Pengurus</a>
            <a @click="open = false" href="{{ route('home') }}#programs"
                class="nav-link-mobile rounded-md py-2 px-3 transition-colors {{ request()->is('program*') ? 'bg-blue-800 text-white' : 'text-blue-200 hover:bg-blue-800' }}"
                data-target="programs">Program</a>
            <a @click="open = false" href="{{ route('home') }}#gallery"
                class="nav-link-mobile rounded-md py-2 px-3 transition-colors {{ request()->is('galeri*') ? 'bg-blue-800 text-white' : 'text-blue-200 hover:bg-blue-800' }}"
                data-target="gallery">Galeri</a>
            {{-- [DIPERBAIKI] Menggunakan 'berita*' sesuai dengan URL --}}
            <a @click="open = false" href="{{ route('home') }}#news"
                class="nav-link-mobile rounded-md py-2 px-3 transition-colors {{ request()->is('berita*') ? 'bg-blue-800 text-white' : 'text-blue-200 hover:bg-blue-800' }}"
                data-target="news">Berita</a>
            <a @click="open = false" href="{{ route('home') }}#contact"
                class="nav-link-mobile rounded-md py-2 px-3 text-blue-200 hover:bg-blue-800 transition-colors"
                data-target="contact">Kontak</a>

        </div>
    </div>
</nav>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        if (window.location.pathname === '/') {
            const navLinksDesktop = document.querySelectorAll('.nav-link');
            const navLinksMobile = document.querySelectorAll('.nav-link-mobile');
            const sections = document.querySelectorAll('section[id]');

            const desktopActiveClasses = ['text-blue-200'];
            const mobileActiveClasses = ['bg-blue-800', 'text-white'];
            const desktopInactiveClasses = ['text-white'];
            const mobileInactiveClasses = ['text-blue-200', 'hover:bg-blue-800'];

            function updateActiveLink() {
                let current = 'hero';
                sections.forEach(section => {
                    const sectionTop = section.offsetTop;
                    if (window.scrollY >= sectionTop - 100) {
                        current = section.getAttribute('id');
                    }
                });

                navLinksDesktop.forEach(link => {
                    link.classList.remove(...desktopActiveClasses);
                    link.classList.add(...desktopInactiveClasses);
                    if (link.getAttribute('data-target') === current) {
                        link.classList.remove(...desktopInactiveClasses);
                        link.classList.add(...desktopActiveClasses);
                    }
                });

                navLinksMobile.forEach(link => {
                    link.classList.remove(...mobileActiveClasses);
                    link.classList.add(...mobileInactiveClasses);
                    if (link.getAttribute('data-target') === current) {
                        link.classList.remove(...mobileInactiveClasses);
                        link.classList.add(...mobileActiveClasses);
                    }
                });
            }
            window.addEventListener('scroll', updateActiveLink);
            window.addEventListener('resize', updateActiveLink);
            updateActiveLink();
        }
    });
</script>
