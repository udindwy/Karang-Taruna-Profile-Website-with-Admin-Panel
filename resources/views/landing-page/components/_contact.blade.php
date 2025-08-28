<section id="contact" class="py-20 px-4 md:px-8 bg-white">
    <div class="container mx-auto">
        <div class="text-center mb-12" data-aos="fade-up">
            <h2 class="text-4xl font-extrabold text-gray-800 mb-2">Hubungi Kami</h2>
            <div class="h-1 w-24 mx-auto bg-blue-600 rounded-full"></div>
            <p class="text-lg text-gray-600 max-w-3xl mx-auto mt-4">
                Kirimkan pesan, saran, atau pertanyaan Anda kepada kami.
            </p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
            <div class="bg-gray-50 rounded-xl shadow-lg p-8" data-aos="fade-right" data-aos-duration="1000">
                <form action="{{ route('contact.store') }}" method="POST">
                    @csrf
                    <div class="mb-6 relative">
                        <input type="text" name="name" id="name" placeholder="Nama Lengkap"
                            class="w-full py-4 pl-12 pr-4 bg-white text-gray-800 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:shadow-lg transition-all duration-300"
                            required>
                        <i class="fas fa-user absolute left-4 top-1/2 -translate-y-1/2 text-gray-400"></i>
                    </div>
                    <div class="mb-6 relative">
                        <input type="email" name="email" id="email" placeholder="Email"
                            class="w-full py-4 pl-12 pr-4 bg-white text-gray-800 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:shadow-lg transition-all duration-300"
                            required>
                        <i class="fas fa-envelope absolute left-4 top-1/2 -translate-y-1/2 text-gray-400"></i>
                    </div>
                    <div class="mb-6 relative">
                        <textarea name="message" id="message" rows="5" placeholder="Pesan Anda"
                            class="w-full py-4 pl-12 pr-4 bg-white text-gray-800 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:shadow-lg transition-all duration-300"
                            required></textarea>
                        <i class="fas fa-comment absolute left-4 top-4 text-gray-400"></i>
                    </div>
                    <button type="submit"
                        class="w-full py-4 px-6 font-bold text-white rounded-xl bg-blue-600 hover:bg-blue-700 transition-colors duration-300 transform hover:scale-105">
                        Kirim Pesan
                    </button>
                </form>
            </div>
            <div class="space-y-8" data-aos="fade-left" data-aos-duration="1000">
                <div class="flex items-start space-x-4">
                    <i class="fas fa-map-marker-alt text-2xl text-blue-600 mt-1"></i>
                    <div>
                        <h3 class="font-bold text-xl text-gray-800">Alamat</h3>
                        <p class="text-gray-600">{{ $setting->address ?? 'Alamat Organisasi' }}</p>
                    </div>
                </div>
                <div class="flex items-start space-x-4">
                    <i class="fas fa-phone-alt text-2xl text-blue-600 mt-1"></i>
                    <div>
                        <h3 class="font-bold text-xl text-gray-800">Telepon</h3>
                        <p class="text-gray-600">{{ $setting->phone ?? '+62 812-3456-7890' }}</p>
                    </div>
                </div>
                <div class="flex items-start space-x-4">
                    <i class="fas fa-envelope text-2xl text-blue-600 mt-1"></i>
                    <div>
                        <h3 class="font-bold text-xl text-gray-800">Email</h3>
                        <p class="text-gray-600">{{ $setting->email ?? 'info@karangtaruna.com' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
