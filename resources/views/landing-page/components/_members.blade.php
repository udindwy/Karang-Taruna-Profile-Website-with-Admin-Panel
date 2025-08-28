<section id="members" class="py-20 px-4 md:px-8 bg-gray-50">
    <div class="container mx-auto">
        
        <div class="text-center mb-12" data-aos="fade-up">
            <h2 class="text-4xl font-extrabold text-gray-800 mb-2">Struktur Pengurus</h2>
            <div class="h-1 w-24 mx-auto bg-blue-600 rounded-full"></div>
            <p class="text-lg text-gray-600 max-w-3xl mx-auto mt-4">
                Mengenal para penggerak dan pilar utama Karang Taruna kami.
            </p>
        </div>

        <div class="overflow-hidden relative custom-scrollbar-container">
            <div class="flex animate-scroll-horizontal space-x-8 pb-4" data-aos="fade-up" data-aos-delay="200">
                <!-- Duplikasi data untuk membuat efek scrolling tanpa jeda -->
                @php $membersDouble = $members->concat($members); @endphp
                @foreach ($membersDouble as $member)
                    <div
                        class="flex-none w-64 bg-white rounded-xl shadow-lg p-6 text-center transform transition-all duration-300 ease-in-out hover:shadow-2xl hover:-translate-y-2">
                        <img src="{{ asset('storage/' . $member->photo) }}" alt="{{ $member->name }}"
                            class="w-32 h-32 rounded-full mx-auto mb-5 object-cover border-4 border-white ring-2 ring-blue-500 transition-all duration-300">
                        <h3 class="text-xl font-bold text-gray-800">{{ $member->name }}</h3>
                        <p class="text-blue-600 font-medium">{{ $member->position }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
