<footer class="bg-slate-800 text-slate-400">
    <div class="container mx-auto px-6 md:px-8 pt-16 pb-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12">
            
            {{-- Kolom 1: Tentang & Logo --}}
            <div class="lg:col-span-2" data-aos="fade-up">
                <div class="flex items-center mb-4">
                    @if ($setting->logo ?? false)
                        <img src="{{ asset('storage/' . $setting->logo) }}" alt="Logo" class="h-10 w-10 mr-3 rounded-lg">
                    @endif
                    <span class="text-2xl font-bold text-white">{{ $setting->site_name ?? 'Karang Taruna' }}</span>
                </div>
                <p class="text-sm leading-relaxed pr-8">
                    Organisasi pemuda yang bergerak di bidang sosial dan kemasyarakatan. Kami berdedikasi untuk membangun lingkungan yang lebih baik melalui program yang inovatif dan kolaboratif.
                </p>
                <div class="flex space-x-4 mt-6">
                    @if ($setting->facebook ?? false)
                        <a href="{{ $setting->facebook }}" target="_blank" class="text-slate-400 hover:text-white transition-colors" title="Facebook">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" /></svg>
                        </a>
                    @endif
                    @if ($setting->instagram ?? false)
                        <a href="{{ $setting->instagram }}" target="_blank" class="text-slate-400 hover:text-white transition-colors" title="Instagram">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 012.792 2.792c.247.636.416 1.363.465 2.427.048 1.024.06 1.378.06 3.808s-.012 2.784-.06 3.808c-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-2.792 2.792c-.636.247-1.363.416-2.427.465-1.024.048-1.378.06-3.808.06s-2.784-.012-3.808-.06c-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-2.792-2.792c-.247-.636-.416-1.363-.465-2.427C2.013 14.784 2 14.43 2 12s.013-2.784.06-3.808c.049-1.064.218-1.791.465-2.427A4.902 4.902 0 015.318 2.965c.636-.247 1.363-.416 2.427-.465C8.766 2.013 9.12 2 11.55 2h.766zM12 6.845a5.155 5.155 0 100 10.31 5.155 5.155 0 000-10.31zm0 8.468a3.313 3.313 0 110-6.626 3.313 3.313 0 010 6.626zm5.823-7.728a1.238 1.238 0 100-2.475 1.238 1.238 0 000 2.475z" clip-rule="evenodd" /></svg>
                        </a>
                    @endif
                    @if ($setting->youtube ?? false)
                        <a href="{{ $setting->youtube }}" target="_blank" class="text-slate-400 hover:text-white transition-colors" title="YouTube">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0C.89 3.43 0 4.949 0 8.756v6.488c0 3.807.89 5.325 4.385 5.571 3.6.245 11.626.246 15.23 0 3.495-.246 4.385-1.764 4.385-5.571V8.756c0-3.807-.89-5.325-4.385-5.572zM9.75 13.225V10.275l3.86 1.475-3.86 1.475z"></path></svg>
                        </a>
                    @endif
                </div>
            </div>

            {{-- Kolom 2: Tautan Cepat --}}
            <div data-aos="fade-up" data-aos-delay="100">
                <h3 class="text-lg font-semibold text-white mb-4">Tautan Cepat</h3>
                <ul class="space-y-2 text-sm">
                    <li><a href="#hero" class="hover:text-white transition-colors">Beranda</a></li>
                    <li><a href="#about" class="hover:text-white transition-colors">Tentang Kami</a></li>
                    <li><a href="#programs" class="hover:text-white transition-colors">Program</a></li>
                    <li><a href="#news" class="hover:text-white transition-colors">Berita</a></li>
                    <li><a href="#gallery" class="hover:text-white transition-colors">Galeri</a></li>
                </ul>
            </div>

            {{-- Kolom 3: Kontak --}}
            <div data-aos="fade-up" data-aos-delay="200">
                <h3 class="text-lg font-semibold text-white mb-4">Hubungi Kami</h3>
                <address class="not-italic text-sm space-y-2">
                    {{-- [DIPERBAIKI] Menggunakan nama kolom yang benar: address, email, phone --}}
                    @if($setting->address ?? false)<p>{{ $setting->address }}</p>@endif
                    @if($setting->email ?? false)<p><a href="mailto:{{ $setting->email }}" class="hover:text-white">{{ $setting->email }}</a></p>@endif
                    @if($setting->phone ?? false)<p><a href="tel:{{ $setting->phone }}" class="hover:text-white">{{ $setting->phone }}</a></p>@endif
                </address>
            </div>

        </div>

        <div class="mt-12 pt-8 border-t border-slate-700 text-center text-sm">
            <p>&copy; {{ date('Y') }} {{ $setting->site_name ?? 'Karang Taruna' }}. Semua Hak Cipta Dilindungi.</p>
        </div>
    </div>
</footer>