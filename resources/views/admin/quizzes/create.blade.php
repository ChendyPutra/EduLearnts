@extends('layouts.admin')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-6 rounded shadow">
  <h2 class="text-xl font-bold text-indigo-700 mb-4">Tambah Soal Kuis</h2>

<form action="{{ route('admin.quizzes.store') }}" method="POST">
    @csrf

    <div class="mb-4">
      <label class="block font-medium">Pertanyaan</label>
      <textarea name="question" required class="w-full border px-3 py-2 rounded">{{ old('question') }}</textarea>
    </div>

    @foreach (['A', 'B', 'C', 'D'] as $opt)
      <div class="mb-4">
        <label class="block font-medium">Pilihan {{ $opt }}</label>
        <input name="option_{{ strtolower($opt) }}" required class="w-full border px-3 py-2 rounded"
               value="{{ old('option_' . strtolower($opt)) }}">
      </div>
    @endforeach

    <div class="mb-4">
      <label class="block font-medium">Jawaban Benar</label>
      <select name="correct_answer" required class="w-full border px-3 py-2 rounded">
        <option value="">-- Pilih --</option>
        @foreach (['A', 'B', 'C', 'D'] as $opt)
          <option value="{{ $opt }}" {{ old('correct_answer') == $opt ? 'selected' : '' }}>{{ $opt }}</option>
        @endforeach
      </select>
    </div>

    <div class="mb-6">
      <label class="block font-medium">Penjelasan (opsional)</label>
      <textarea name="explanation" class="w-full border px-3 py-2 rounded">{{ old('explanation') }}</textarea>
    </div>

    <button class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded">Simpan</button>
  </form>
</div>
@endsection
