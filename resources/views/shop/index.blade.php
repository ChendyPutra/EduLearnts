@extends('layouts.public')

@section('content')
<div class="max-w-7xl mx-auto px-4">
  <h2 class="text-3xl font-bold text-indigo-700 mb-8 text-center">Toko EduLearn</h2>

  <div class="grid md:grid-cols-3 gap-6">
    @forelse ($products as $product)
      <div class="bg-white p-4 rounded shadow hover:shadow-lg transition transform hover:-translate-y-1">
        <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="w-full h-40 object-cover rounded mb-4">
        <h3 class="text-lg font-semibold text-indigo-600">{{ $product->name }}</h3>
        <p class="text-gray-700 mt-2 mb-1 line-clamp-2">{{ $product->description }}</p>
        <p class="text-pink-600 font-bold mt-1 mb-3">Rp{{ number_format($product->price, 0, ',', '.') }}</p>

        <a href="#" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700 inline-block">
          Lihat Detail
        </a>
      </div>
    @empty
      <p class="text-gray-600 col-span-3 text-center">Belum ada produk tersedia.</p>
    @endforelse
  </div>
</div>
@endsection
