@extends('layouts.admin')

@section('content')
<div class="max-w-5xl mx-auto p-6 bg-white rounded shadow">
  <h2 class="text-2xl font-bold text-indigo-700 mb-4">Soal Kuis - Modul: {{ $module->title }}</h2>

  @if (session('success'))
    <div class="bg-green-100 text-green-700 px-4 py-2 mb-4 rounded">{{ session('success') }}</div>
  @endif

  <a href="{{ route('admin.quizzes.create', $module) }}"
     class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded mb-4 inline-block">
    + Tambah Soal
  </a>

  @forelse ($quizzes as $quiz)
    <div class="border rounded p-4 mb-4 shadow-sm hover:shadow transition">
      <p class="text-sm text-gray-600">No. {{ $loop->iteration }}</p>
      <h3 class="font-semibold">{{ $quiz->question }}</h3>

      <ul class="mt-2 text-sm">
        <li>A. {{ $quiz->option_a }}</li>
        <li>B. {{ $quiz->option_b }}</li>
        <li>C. {{ $quiz->option_c }}</li>
        <li>D. {{ $quiz->option_d }}</li>
      </ul>

      <p class="mt-2 text-green-700 text-sm">Jawaban Benar: <strong>{{ $quiz->correct_answer }}</strong></p>
      @if($quiz->explanation)
        <p class="text-gray-500 text-sm">Penjelasan: {{ $quiz->explanation }}</p>
      @endif

      <div class="mt-3 flex gap-4 text-sm">
        <a href="{{ route('admin.quizzes.edit', [$module, $quiz]) }}" class="text-blue-500 hover:underline">Edit</a>
        <form action="{{ route('admin.quizzes.destroy', [$module, $quiz]) }}" method="POST"
              onsubmit="return confirm('Yakin hapus soal ini?')" class="inline-block">
          @csrf @method('DELETE')
          <button class="text-red-500 hover:underline">Hapus</button>
        </form>
      </div>
    </div>
  @empty
    <p class="text-gray-600">Belum ada soal kuis.</p>
  @endforelse
</div>
@endsection
