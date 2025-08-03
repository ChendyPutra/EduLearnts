@extends('layouts.admin')

@section('content')
<div class="max-w-6xl mx-auto p-6 bg-white shadow rounded-xl">
  <div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-bold text-indigo-700">Manajemen Produk Kit Edukasi</h2>
    <a href="{{ route('admin.products.create') }}"
       class="bg-indigo-600 text-white px-4 py-2 rounded-lg shadow hover:bg-indigo-700 transition">
      + Tambah Produk
    </a>
  </div>

  @if (session('success'))
    <div class="bg-green-100 border border-green-300 text-green-700 px-4 py-3 rounded mb-6">
      {{ session('success') }}
    </div>
  @endif

  <div class="grid md:grid-cols-3 gap-6">
    @forelse ($products as $product)
      <div class="border rounded-xl p-4 bg-white shadow hover:shadow-lg transition relative">
        @if ($product->image)
          <img src="{{ asset('storage/' . $product->image) }}"
               class="h-40 w-full object-cover rounded mb-3 border border-gray-200"
               alt="{{ $product->title }}">
        @endif

        <h3 class="text-lg font-semibold text-indigo-700">{{ $product->title }}</h3>
        <p class="text-sm text-gray-600 mb-2 line-clamp-2">{{ $product->description }}</p>

        <a href="{{ $product->marketplace_link }}" target="_blank"
           class="text-sm text-blue-600 hover:underline mb-3 inline-block">🔗 Lihat di Marketplace</a>

        <div class="absolute top-4 right-4 bg-indigo-100 text-indigo-700 text-xs px-2 py-1 rounded">
          {{ str_contains($product->marketplace_link, 'shopee') ? 'Shopee' : (str_contains($product->marketplace_link, 'tokopedia') ? 'Tokopedia' : 'Lainnya') }}
        </div>

        <div class="mt-4 flex justify-between items-center text-sm">
          <a href="{{ route('admin.products.edit', $product) }}" class="text-blue-500 hover:underline">Edit</a>
          <form action="{{ route('admin.products.destroy', $product) }}" method="POST"
                onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
            @csrf @method('DELETE')
            <button class="text-red-500 hover:underline">Hapus</button>
          </form>
        </div>
      </div>
    @empty
      <p class="col-span-3 text-center text-gray-500">Belum ada produk ditambahkan.</p>
    @endforelse
  </div>
</div>
@endsection
