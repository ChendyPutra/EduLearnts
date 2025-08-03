@extends('layouts.public')

@section('content')
<!-- HERO SECTION -->
<section class="bg-gradient-to-r from-indigo-100 to-white py-20 relative overflow-hidden">
  <div class="max-w-7xl mx-auto px-6 flex flex-col md:flex-row items-center gap-12">

    <!-- Text Konten -->
    <div class="md:w-1/2 animate-fade-in-down">
      <h1 class="text-5xl md:text-6xl font-extrabold text-indigo-700 leading-tight mb-6">
        EduLearnt: Serunya Belajar Coding & AI
      </h1>
      <p class="text-lg text-gray-700 mb-6">
        Untuk siswa SD hingga SMA — belajar teknologi menjadi interaktif, menyenangkan, dan penuh eksplorasi.
      </p>
      <a href="{{ route('courses.index') }}"
         class="inline-block bg-indigo-600 text-white px-6 py-3 rounded-lg shadow-lg hover:bg-indigo-700 transition duration-300">
        Mulai Belajar
      </a>
    </div>

    <!-- Ilustrasi -->
    <div class="md:w-1/2 animate-fade-in-up">
      <img src="https://cdn.dribbble.com/users/14268/screenshots/17582283/media/5826e3b5e2d62de967e0ea62aa2b06fc.png" alt="Ilustrasi Edu"
           class="rounded-xl shadow-2xl w-full">
    </div>
  </div>
</section>

<!-- FITUR SECTION -->
<section class="bg-white py-24">
  <div class="max-w-6xl mx-auto px-6">
    <h2 class="text-4xl font-bold text-center text-indigo-700 mb-14">Fitur Unggulan EduLearnt</h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-10">
      <!-- Fitur 1 -->
      <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-xl transition-all border-t-4 border-indigo-500">
        <div class="text-5xl mb-4">💻</div>
        <h3 class="text-xl font-semibold text-indigo-700 mb-2">Kursus Interaktif</h3>
        <p class="text-gray-600 text-sm">Modul visual, video penjelasan, dan kuis interaktif untuk pengalaman belajar menyenangkan.</p>
      </div>

      <!-- Fitur 2 -->
      <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-xl transition-all border-t-4 border-pink-500">
        <div class="text-5xl mb-4">📦</div>
        <h3 class="text-xl font-semibold text-pink-700 mb-2">Kit Edukasi</h3>
        <p class="text-gray-600 text-sm">Paket robotik dan AI sederhana untuk mendukung praktik belajar di rumah maupun sekolah.</p>
      </div>

      <!-- Fitur 3 -->
      <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-xl transition-all border-t-4 border-yellow-500">
        <div class="text-5xl mb-4">🎮</div>
        <h3 class="text-xl font-semibold text-yellow-700 mb-2">Gamifikasi Belajar</h3>
        <p class="text-gray-600 text-sm">Progress bar, sistem nilai, ranking, dan badge agar belajar terasa seperti bermain.</p>
      </div>
    </div>
  </div>
</section>

<!-- AUDIENCE SECTION -->
<section class="bg-gradient-to-b from-white to-indigo-50 py-24">
  <div class="max-w-6xl mx-auto px-6 text-center">
    <h2 class="text-3xl font-bold text-indigo-700 mb-10">Untuk Siapa EduLearnt?</h2>
    <div class="flex flex-wrap justify-center gap-8">
      <div class="w-64 bg-white p-6 rounded-xl shadow hover:shadow-lg">
        <div class="text-4xl mb-3">👧🧒</div>
        <h3 class="font-semibold text-indigo-600">Siswa SD</h3>
        <p class="text-sm text-gray-500 mt-2">Belajar logika dan teknologi sejak dini dengan cara yang menyenangkan.</p>
      </div>
      <div class="w-64 bg-white p-6 rounded-xl shadow hover:shadow-lg">
        <div class="text-4xl mb-3">👦👧</div>
        <h3 class="font-semibold text-indigo-600">Siswa SMP</h3>
        <p class="text-sm text-gray-500 mt-2">Mulai mengenal coding dan AI dengan panduan visual dan kuis.</p>
      </div>
      <div class="w-64 bg-white p-6 rounded-xl shadow hover:shadow-lg">
        <div class="text-4xl mb-3">🧑‍🎓</div>
        <h3 class="font-semibold text-indigo-600">Siswa SMA</h3>
        <p class="text-sm text-gray-500 mt-2">Siap masuk dunia teknologi dengan project & kit AI nyata.</p>
      </div>
    </div>
  </div>
</section>

<!-- SECTION: Statistik EduLearnt -->
<section class="bg-white py-24">
  <div class="max-w-5xl mx-auto px-6 text-center">
    <h2 class="text-3xl font-bold text-indigo-700 mb-10">EduLearnt dalam Angka</h2>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
      <div>
        <h3 class="text-4xl font-bold text-indigo-600">1000+</h3>
        <p class="text-sm text-gray-500 mt-1">Siswa aktif</p>
      </div>
      <div>
        <h3 class="text-4xl font-bold text-indigo-600">50+</h3>
        <p class="text-sm text-gray-500 mt-1">Kursus</p>
      </div>
      <div>
        <h3 class="text-4xl font-bold text-indigo-600">120+</h3>
        <p class="text-sm text-gray-500 mt-1">Modul & Kuis</p>
      </div>
      <div>
        <h3 class="text-4xl font-bold text-indigo-600">30+</h3>
        <p class="text-sm text-gray-500 mt-1">Sekolah Mitra</p>
      </div>
    </div>
  </div>
</section>

<!-- SECTION: Toko EduLearnt -->
<section class="bg-indigo-50 py-24">
  <div class="max-w-6xl mx-auto px-6 text-center">
    <h2 class="text-3xl font-bold text-indigo-700 mb-10">Produk Populer di Toko Kami</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
      <div class="bg-white rounded-xl shadow hover:shadow-lg p-6">
        <img src="https://via.placeholder.com/300x200" class="rounded mb-4 w-full h-40 object-cover" alt="Kit 1">
        <h3 class="font-semibold text-indigo-700 mb-2">Starter Kit Coding</h3>
        <p class="text-sm text-gray-500">Belajar dasar pemrograman dengan proyek nyata.</p>
      </div>
      <div class="bg-white rounded-xl shadow hover:shadow-lg p-6">
        <img src="https://via.placeholder.com/300x200" class="rounded mb-4 w-full h-40 object-cover" alt="Kit 2">
        <h3 class="font-semibold text-indigo-700 mb-2">AI Mini Project Kit</h3>
        <p class="text-sm text-gray-500">Eksperimen dengan kecerdasan buatan sederhana di rumah.</p>
      </div>
      <div class="bg-white rounded-xl shadow hover:shadow-lg p-6">
        <img src="https://via.placeholder.com/300x200" class="rounded mb-4 w-full h-40 object-cover" alt="Kit 3">
        <h3 class="font-semibold text-indigo-700 mb-2">Robotika Dasar</h3>
        <p class="text-sm text-gray-500">Bangun robot kecil dan pelajari logika pergerakannya.</p>
      </div>
    </div>
    <a href="{{ route('shop.index') }}" class="mt-8 inline-block bg-indigo-600 text-white px-6 py-3 rounded-lg hover:bg-indigo-700 transition">Lihat Semua Produk</a>
  </div>
</section>

<!-- TESTIMONI SECTION -->
<section class="bg-white py-24">
  <div class="max-w-6xl mx-auto px-6 text-center">
    <h2 class="text-3xl font-bold text-indigo-700 mb-10">Apa Kata Mereka?</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
      <div class="bg-indigo-50 p-6 rounded-xl shadow text-left">
        <p class="text-gray-700 italic">"Anak saya jadi semangat belajar! Kursusnya menarik dan mudah diikuti."</p>
        <p class="mt-4 font-semibold text-indigo-600">— Ibu Lina, Orang Tua Siswa SD</p>
      </div>
      <div class="bg-indigo-50 p-6 rounded-xl shadow text-left">
        <p class="text-gray-700 italic">"Saya suka gamenya! Saya bisa ranking 1 di kelas coding 😎"</p>
        <p class="mt-4 font-semibold text-indigo-600">— Andi, Siswa SMP</p>
      </div>
    </div>
  </div>
</section>

<!-- CTA SECTION -->
<section class="bg-indigo-600 text-white py-16">
  <div class="max-w-4xl mx-auto text-center px-6">
    <h2 class="text-3xl font-bold mb-4">Ayo Mulai Petualangan Belajarmu!</h2>
    <p class="mb-6">Daftar sekarang dan temukan serunya belajar coding, AI, dan robotika dengan cara menyenangkan dan kreatif.</p>
    <a href="{{ route('register') }}"
       class="inline-block bg-white text-indigo-600 font-semibold px-6 py-3 rounded-lg hover:bg-indigo-100 transition duration-300">
      Daftar Sekarang
    </a>
  </div>
</section>
@endsection
