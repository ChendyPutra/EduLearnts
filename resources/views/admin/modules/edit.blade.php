@extends('layouts.admin')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-6 rounded shadow">
  <h2 class="text-xl font-bold text-indigo-700 mb-4">Edit Modul - {{ $course->title }}</h2>

  <form method="POST" action="{{ route('admin.modules.update', [$course, $module]) }}">
    @csrf @method('PUT')

    <div class="mb-4">
      <label class="block font-medium">Judul Modul</label>
      <input name="title" required class="w-full border px-3 py-2 rounded"
             value="{{ old('title', $module->title) }}">
    </div>

    <div class="mb-4">
      <label class="block font-medium">Konten Teks</label>
      <textarea name="content" rows="4" class="w-full border px-3 py-2 rounded">{{ old('content', $module->content) }}</textarea>
    </div>

    <div class="mb-4">
      <label class="block font-medium">Link Video YouTube</label>
      <input name="video_url" type="url" class="w-full border px-3 py-2 rounded"
             value="{{ old('video_url', $module->video_url) }}">
    </div>

    <div class="mb-6">
      <label class="block font-medium">Urutan Modul</label>
      <input name="order" type="number" min="1" class="w-full border px-3 py-2 rounded"
             value="{{ old('order', $module->order) }}">
    </div>

    <button class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded">Update</button>
    <a href="{{ route('admin.modules.index', $course) }}" class="ml-4 text-gray-600 hover:underline">Batal</a>
  </form>
</div>
@endsection
