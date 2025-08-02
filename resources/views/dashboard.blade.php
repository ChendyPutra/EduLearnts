@extends('layouts.public')

@section('content')
<div class="max-w-6xl mx-auto p-6">
  <h1 class="text-2xl font-bold text-indigo-700 mb-4">Halo, {{ Auth::user()->name }} 👋</h1>

  <div class="grid md:grid-cols-3 gap-6 mb-6">
    <a href="/courses" class="bg-white border hover:shadow-lg transition p-4 rounded-lg text-center">
      <h2 class="text-lg font-semibold text-indigo-600">📚 Kursus</h2>
      <p class="text-sm text-gray-600">Lihat semua kursus yang tersedia</p>
    </a>
    <a href="/shop" class="bg-white border hover:shadow-lg transition p-4 rounded-lg text-center">
      <h2 class="text-lg font-semibold text-pink-600">🛍️ Toko</h2>
      <p class="text-sm text-gray-600">Kit edukasi untuk mendukung belajar</p>
    </a>
    <a href="/quiz" class="bg-white border hover:shadow-lg transition p-4 rounded-lg text-center">
      <h2 class="text-lg font-semibold text-green-600">📝 Kuis</h2>
      <p class="text-sm text-gray-600">Uji kemampuanmu sekarang!</p>
    </a>
  </div>

  <div class="bg-white border p-4 rounded-lg shadow">
    <h2 class="text-lg font-bold mb-4 text-indigo-700">Kursus yang Kamu Ikuti</h2>

    @forelse ($enrollments as $enroll)
      <div class="border-b py-3 flex justify-between items-center">
        <div>
          <p class="font-semibold text-indigo-600">{{ $enroll->course->title }}</p>
          <p class="text-sm text-gray-500">{{ $enroll->course->level }} - {{ $enroll->course->category }}</p>
        </div>
        <div class="text-sm text-right">
          <p class="font-medium text-green-600">{{ $enroll->progress }}%</p>
          <a href="/courses/{{ $enroll->course->id }}" class="text-blue-500 hover:underline">Lanjutkan</a>
        </div>
      </div>
    @empty
      <p class="text-gray-500">Kamu belum mengikuti kursus apa pun.</p>
    @endforelse
  </div>
</div>
@endsection
