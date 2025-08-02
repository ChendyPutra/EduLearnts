@extends('layouts.admin')

@section('content')
<div class="max-w-5xl mx-auto p-6 bg-white shadow rounded">
  <h2 class="text-2xl font-bold text-indigo-700 mb-4">Daftar Produk Kit Edukasi</h2>

  @if (session('success'))
    <div class="bg-green-100 text-green-700 px-4 py-2 mb-4 rounded">{{ session('success') }}</div>
  @endif

  <a href="{{ route('admin.products.create') }}"
     class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700 mb-4 inline-block">
    + Tambah Produk
  </a>

  <div class="grid md:grid-cols-2 gap-6">
    @foreach ($products as $product)
      <div class="border rounded p-4 flex flex-col shadow hover:shadow-lg transition">
        @if ($product->image)
          <img src="{{ asset('storage/' . $product->image) }}" class="h-40 object-cover rounded mb-2" alt="{{ $product->title }}">
        @endif

        <h3 class="text-lg font-bold text-indigo-700">{{ $product->title }}</h3>
        <p class="text-sm text-gray-600 mb-2">{{ $product->description }}</p>
        <a href="{{ $product->marketplace_link }}" target="_blank"
           class="text-blue-600 underline text-sm mb-2">Buka di Marketplace</a>

        <div class="mt-auto flex justify-between items-center">
          <a href="{{ route('admin.products.edit', $product) }}"
             class="text-blue-500 hover:underline text-sm">Edit</a>
          <form action="{{ route('admin.products.destroy', $product) }}" method="POST"
                onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
            @csrf @method('DELETE')
            <button class="text-red-500 hover:underline text-sm">Hapus</button>
          </form>
        </div>
      </div>
    @endforeach
  </div>
</div>
@endsection
