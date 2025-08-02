@extends('layouts.admin')

@section('content')
<div class="max-w-xl mx-auto bg-white p-6 rounded shadow">
  <h2 class="text-xl font-bold text-indigo-700 mb-4">Tambah Produk Kit</h2>

  <form method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data">
    @csrf

    <div class="mb-4">
      <label class="block font-medium">Judul Produk</label>
      <input name="title" required class="w-full border px-3 py-2 rounded" value="{{ old('title') }}">
    </div>

    <div class="mb-4">
      <label class="block font-medium">Deskripsi</label>
      <textarea name="description" rows="3" class="w-full border px-3 py-2 rounded">{{ old('description') }}</textarea>
    </div>

    <div class="mb-4">
      <label class="block font-medium">Link Marketplace</label>
      <input name="marketplace_link" type="url" required class="w-full border px-3 py-2 rounded" value="{{ old('marketplace_link') }}">
    </div>

    <div class="mb-6">
      <label class="block font-medium">Gambar (opsional)</label>
      <input name="image" type="file" accept="image/*" class="w-full border px-3 py-2 rounded">
    </div>

    <button class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded">Simpan</button>
  </form>
</div>
@endsection
