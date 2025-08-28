<section id="about" class="py-20 px-4 md:px-8 bg-white">
    <div class="container mx-auto">
        <div class="text-center mb-12" data-aos="fade-up">
            <h2 class="text-4xl font-extrabold text-gray-800 mb-2">Tentang Kami</h2>
            <div class="h-1 w-24 mx-auto bg-blue-600 rounded-full"></div>
            <p class="text-lg text-gray-600 max-w-3xl mx-auto mt-4">
                Mengenal lebih dalam tentang Karang Taruna kami.
            </p>
        </div>
        @if ($aboutSection)
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                <div data-aos="fade-right" data-aos-delay="100">
                    @if ($aboutSection->image)
                        <img src="{{ asset('storage/' . $aboutSection->image) }}" alt="Foto Organisasi"
                            class="rounded-xl shadow-lg w-full h-auto object-cover transform hover:scale-105 transition-transform duration-300">
                    @endif
                </div>
                <div data-aos="fade-left" data-aos-delay="200" class="space-y-8">
                    <div class="bg-gray-50 p-8 rounded-xl shadow-md">
                        <p class="text-gray-700 leading-relaxed text-lg">
                            {{ $aboutSection->description ?? '' }}
                        </p>
                    </div>
                    <div class="bg-gray-50 p-8 rounded-xl shadow-md">
                        <h3 class="text-2xl font-bold text-gray-800 mb-2">Visi</h3>
                        <p class="text-gray-600 leading-relaxed">{{ $aboutSection->vision ?? '' }}</p>
                    </div>
                    <div class="bg-gray-50 p-8 rounded-xl shadow-md">
                        <h3 class="text-2xl font-bold text-gray-800 mb-2">Misi</h3>
                        <ul class="list-disc list-inside text-gray-600 leading-relaxed space-y-2">
                            @php
                                $missions = explode('.', $aboutSection->mission ?? '');
                            @endphp
                            @foreach ($missions as $mission)
                                @if (trim($mission) !== '')
                                    <li>{{ trim($mission) }}</li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endif
    </div>
</section>
