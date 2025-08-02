@extends('layouts.public')

@section('content')
<div class="max-w-3xl mx-auto px-4 bg-white p-6 rounded shadow">

  {{-- Judul dan informasi --}}
  <h2 class="text-2xl font-bold text-indigo-700">{{ $course->title }}</h2>
  <p class="text-sm text-gray-500">{{ $course->level }} • {{ $course->category }}</p>
  <p class="mt-4 text-gray-700">{{ $course->description }}</p>

  {{-- Notifikasi sukses / warning --}}
  @if (session('success'))
    <div class="mt-4 bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded">
      {{ session('success') }}
    </div>
  @endif

  @if (session('warning'))
    <div class="mt-4 bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-2 rounded">
      {{ session('warning') }}
    </div>
  @endif

  {{-- Form Join Course --}}
  @auth
    <div class="mt-6">
      <form method="POST" action="{{ route('enrollments.store') }}">
        @csrf
        <input type="hidden" name="course_id" value="{{ $course->id }}">
        <button class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded">
          Gabung Kursus Ini
        </button>
      </form>
    </div>
  @else
    <div class="mt-6 text-red-600">
      Silakan <a href="{{ route('login') }}" class="underline text-blue-600">login</a> untuk mengikuti kursus ini.
    </div>
  @endauth

</div>
@endsection
