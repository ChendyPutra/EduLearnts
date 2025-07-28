@extends('layouts.public')

@section('content')
<!-- HERO SECTION -->
<section class="bg-gradient-to-r from-indigo-50 to-white py-16">
  <div class="max-w-7xl mx-auto px-6 flex flex-col-reverse md:flex-row items-center gap-12">

    <!-- Text Konten -->
    <div class="md:w-1/2 animate-fade-in-down">
      <h1 class="text-4xl md:text-5xl font-extrabold text-indigo-700 leading-tight mb-6">
        Belajar Coding, AI & Robotika dengan Seru!
      </h1>
      <p class="text-lg text-gray-700 mb-6">
        Untuk siswa SD–SMA, belajar jadi menyenangkan dan aplikatif bersama <span class="font-bold">EduLearnt</span>.
      </p>
      <a href="{{ route('courses.index') }}"
         class="inline-block bg-indigo-600 text-white px-6 py-3 rounded-lg shadow-md hover:bg-indigo-700 transition">
        Mulai Belajar
      </a>
    </div>

    <!-- Ilustrasi -->
    <div class="md:w-1/2 animate-fade-in-up">
      <img src="{{ asset('images/hero-robot.png') }}" alt="Ilustrasi Edu" class="rounded-xl shadow-xl w-full">
    </div>

  </div>
</section>

<!-- FITUR SECTION -->
<section class="bg-white py-20">
  <div class="max-w-6xl mx-auto px-6">
    <h2 class="text-3xl font-bold text-center text-indigo-700 mb-12">Fitur Unggulan EduLearnt</h2>

    <div class="grid md:grid-cols-3 gap-8">
      <!-- Fitur 1 -->
      <div class="bg-indigo-50 p-6 rounded-xl shadow hover:shadow-xl transition transform hover:-translate-y-1">
        <div class="text-4xl mb-4">🎓</div>
        <h3 class="text-xl font-semibold text-indigo-700 mb-2">Kursus Interaktif</h3>
        <p class="text-gray-600">Belajar coding, AI & robotika melalui video, modul, dan kuis seru.</p>
      </div>

      <!-- Fitur 2 -->
      <div class="bg-pink-50 p-6 rounded-xl shadow hover:shadow-xl transition transform hover:-translate-y-1">
        <div class="text-4xl mb-4">🧠</div>
        <h3 class="text-xl font-semibold text-pink-700 mb-2">Kit Edukasi</h3>
        <p class="text-gray-600">Produk belajar yang bisa langsung dipraktikkan di rumah atau sekolah.</p>
      </div>

      <!-- Fitur 3 -->
      <div class="bg-yellow-50 p-6 rounded-xl shadow hover:shadow-xl transition transform hover:-translate-y-1">
        <div class="text-4xl mb-4">🏆</div>
        <h3 class="text-xl font-semibold text-yellow-700 mb-2">Gamifikasi Belajar</h3>
        <p class="text-gray-600">Sistem ranking, progress & nilai buat kamu makin semangat belajar!</p>
      </div>
    </div>
  </div>
</section>
@endsection
