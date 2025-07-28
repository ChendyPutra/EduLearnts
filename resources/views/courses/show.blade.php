@extends('layouts.public')

@section('content')
<div class="max-w-3xl mx-auto px-4 bg-white p-6 rounded shadow">
  <h2 class="text-2xl font-bold text-indigo-700">{{ $course->title }}</h2>
  <p class="text-sm text-gray-500">{{ $course->level }} • {{ $course->category }}</p>
  <p class="mt-4 text-gray-700">{{ $course->description }}</p>

  <div class="mt-6">
    <form method="POST" action="{{ route('enrollments.store') }}">
      @csrf
      <input type="hidden" name="course_id" value="{{ $course->id }}">
      <button class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded">
        Gabung Kursus Ini
      </button>
    </form>
  </div>
</div>
@endsection
