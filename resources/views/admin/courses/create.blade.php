@extends('layouts.admin')

@section('content')
<div class="max-w-xl mx-auto bg-white p-6 rounded shadow">
  <h2 class="text-xl font-bold text-indigo-700 mb-4">Tambah Course</h2>

  <form method="POST" action="{{ route('courses.store') }}">
    @csrf

    <div class="mb-4">
      <label class="block">Judul</label>
      <input name="title" required class="w-full border px-3 py-2 rounded" value="{{ old('title') }}">
    </div>

    <div class="mb-4">
      <label class="block">Kategori</label>
      <input name="category" required class="w-full border px-3 py-2 rounded" value="{{ old('category') }}">
    </div>

    <div class="mb-4">
      <label class="block">Jenjang</label>
      <select name="level" required class="w-full border px-3 py-2 rounded">
        <option value="SD">SD</option>
        <option value="SMP">SMP</option>
        <option value="SMA">SMA</option>
      </select>
    </div>

    <div class="mb-4">
      <label class="block">Deskripsi</label>
      <textarea name="description" rows="4" class="w-full border px-3 py-2 rounded">{{ old('description') }}</textarea>
    </div>

    <button class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded">Simpan</button>
  </form>
</div>
@endsection
