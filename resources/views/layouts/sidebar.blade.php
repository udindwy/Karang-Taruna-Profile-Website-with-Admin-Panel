<!-- Latar belakang gelap untuk mobile saat sidebar terbuka -->
<div x-show="sidebarOpen" @click="sidebarOpen = false" class="fixed inset-0 z-40 bg-black opacity-50 lg:hidden" x-cloak>
</div>

<!-- Wrapper untuk Sidebar -->
<aside
    class="fixed inset-y-0 left-0 z-50 w-64 px-4 py-8 overflow-y-auto bg-blue-900 transition-transform duration-300 ease-in-out transform"
    :class="{ 'translate-x-0': sidebarOpen, '-translate-x-full': !sidebarOpen }">

    <a href="{{ route('dashboard') }}" class="mx-auto text-center">
        <img src="{{ asset('storage/images/logo.png') }}" alt="Logo Karang Taruna" class="w-16 h-16 mx-auto">
        <span class="mt-2 text-xl font-bold text-gray-100 block">Admin Panel</span>
    </a>

    <div class="flex flex-col justify-between flex-1 mt-6">
        <nav>
            <x-sidebar-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                <i class="fas fa-home w-6 text-center"></i>
                <span class="ml-2">Dashboard</span>
            </x-sidebar-link>
            <x-sidebar-link :href="route('admin.hero.edit')" :active="request()->routeIs('admin.hero.edit')">
                <i class="fas fa-image w-6 text-center"></i>
                <span class="ml-2">Hero Section</span>
            </x-sidebar-link>
            <x-sidebar-link :href="route('admin.about.edit')" :active="request()->routeIs('admin.about.edit')">
                <i class="fas fa-info-circle w-6 text-center"></i>
                <span class="ml-2">Tentang Kami</span>
            </x-sidebar-link>
            <x-sidebar-link :href="route('admin.members.index')" :active="request()->routeIs('admin.members.*')">
                <i class="fas fa-users w-6 text-center"></i>
                <span class="ml-2">Pengurus</span>
            </x-sidebar-link>
            <x-sidebar-link :href="route('admin.programs.index')" :active="request()->routeIs('admin.programs.*')">
                <i class="fas fa-calendar-alt w-6 text-center"></i>
                <span class="ml-2">Program & Kegiatan</span>
            </x-sidebar-link>
            <x-sidebar-link :href="route('admin.galleries.index')" :active="request()->routeIs('admin.galleries.*')">
                <i class="fas fa-camera w-6 text-center"></i>
                <span class="ml-2">Galeri Foto</span>
            </x-sidebar-link>
            <x-sidebar-link :href="route('admin.news.index')" :active="request()->routeIs('admin.news.*')">
                <i class="fas fa-newspaper w-6 text-center"></i>
                <span class="ml-2">Berita Terbaru</span>
            </x-sidebar-link>
            <x-sidebar-link :href="route('admin.contacts.index')" :active="request()->routeIs('admin.contacts.*')">
                <i class="fas fa-envelope w-6 text-center"></i>
                <span class="ml-2">Pesan Masuk</span>
            </x-sidebar-link>
            <x-sidebar-link :href="route('admin.settings.edit')" :active="request()->routeIs('admin.settings.*')">
                <i class="fas fa-cog w-6 text-center"></i>
                <span class="ml-2">Pengaturan Website</span>
            </x-sidebar-link>
        </nav>

        <div class="mt-auto">
            <form id="logout-form-sidebar" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>

        </div>
    </div>
</aside>
