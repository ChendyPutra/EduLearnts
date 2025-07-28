@extends('layouts.admin')

@section('content')
<div class="max-w-xl mx-auto bg-white p-6 rounded shadow">
  <h2 class="text-xl font-bold text-indigo-700 mb-4">Edit Course</h2>

  <form method="POST" action="{{ route('courses.update', $course) }}">
    @csrf @method('PUT')

    <div class="mb-4">
      <label class="block">Judul</label>
      <input name="title" required class="w-full border px-3 py-2 rounded"
             value="{{ old('title', $course->title) }}">
    </div>

    <div class="mb-4">
      <label class="block">Kategori</label>
      <input name="category" required class="w-full border px-3 py-2 rounded"
             value="{{ old('category', $course->category) }}">
    </div>

    <div class="mb-4">
      <label class="block">Jenjang</label>
      <select name="level" required class="w-full border px-3 py-2 rounded">
        <option value="SD" {{ old('level', $course->level) == 'SD' ? 'selected' : '' }}>SD</option>
        <option value="SMP" {{ old('level', $course->level) == 'SMP' ? 'selected' : '' }}>SMP</option>
        <option value="SMA" {{ old('level', $course->level) == 'SMA' ? 'selected' : '' }}>SMA</option>
      </select>
    </div>

    <div class="mb-4">
      <label class="block">Deskripsi</label>
      <textarea name="description" rows="4" class="w-full border px-3 py-2 rounded">{{ old('description', $course->description) }}</textarea>
    </div>

    <button class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded">Simpan</button>
  </form>
</div>
@endsection
