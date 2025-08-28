<section id="hero"
    class="relative overflow-hidden min-h-screen flex items-center justify-center text-white p-4 md:p-8">
    <div class="absolute inset-0 z-0 bg-blue-900 opacity-80" data-aos="fade-in"></div>

    @if ($heroSection && $heroSection->image)
        <div class="absolute inset-0 z-0"
            style="background-image: url('{{ asset('storage/' . $heroSection->image) }}'); background-size: cover; background-position: center;"
            data-aos="fade-in" data-aos-delay="200"></div>
    @endif

    <div class="relative z-10 text-center max-w-4xl mx-auto py-20">
        <h1 class="text-4xl md:text-6xl lg:text-7xl font-extrabold mb-4 leading-tight text-white" data-aos="fade-up"
            data-aos-duration="1000">
            {{ $heroSection->title ?? 'Membangun Generasi Muda, Memajukan Desa' }}
        </h1>
        <p class="text-lg md:text-xl lg:text-2xl mb-8 font-light text-blue-100" data-aos="fade-up"
            data-aos-duration="1000" data-aos-delay="200">
            {{ $heroSection->subtitle ?? 'Karang Taruna adalah wadah bagi pemuda-pemudi untuk berkontribusi aktif dalam pembangunan sosial, ekonomi, dan budaya.' }}
        </p>
    </div>
</section>
