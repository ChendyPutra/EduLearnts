@extends('layouts.public')

@section('content')
<div class="max-w-7xl mx-auto px-4">
  <h2 class="text-3xl font-bold text-indigo-700 mb-8 text-center">Daftar Kursus</h2>

  <div class="grid md:grid-cols-3 gap-6">
    @forelse ($courses as $course)
      <div class="bg-white rounded shadow p-6 hover:shadow-md transition transform hover:-translate-y-1">
        <h3 class="text-xl font-semibold text-indigo-600">{{ $course->title }}</h3>
        <p class="text-sm text-gray-500 mb-2">{{ $course->level }} • {{ $course->category }}</p>
        <p class="text-gray-700 mb-4 line-clamp-3">{{ $course->description }}</p>

        @auth
          <a href="{{ route('courses.show', $course) }}"
             class="inline-block bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">
            Lihat Kursus
          </a>
        @else
          <a href="{{ route('login') }}"
             class="inline-block bg-gray-300 text-gray-700 px-4 py-2 rounded hover:bg-gray-400">
            Login untuk Mengikuti
          </a>
        @endauth
      </div>
    @empty
      <p class="text-gray-600 col-span-3 text-center">Belum ada kursus yang tersedia.</p>
    @endforelse
  </div>
</div>
@endsection
