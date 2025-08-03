@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto p-6 bg-white shadow rounded">
  <h2 class="text-2xl font-bold text-indigo-700 mb-4">Hasil Kuis</h2>
  <p class="mb-2">Modul: <strong>{{ $module->title }}</strong></p>
  <p class="mb-4">Skor Anda: <span class="text-green-600 font-bold">{{ $score }}/{{ count($quizzes) }}</span></p>

  <a href="{{ route('courses.index') }}" class="text-blue-600 underline">Kembali ke Kursus</a>
</div>
@endsection
