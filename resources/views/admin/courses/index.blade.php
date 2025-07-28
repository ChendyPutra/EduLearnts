@extends('layouts.admin')

@section('content')
<div class="bg-white p-6 rounded shadow max-w-5xl mx-auto">
  <h2 class="text-2xl font-bold text-indigo-700 mb-4">Daftar Course</h2>

  @if (session('success'))
    <div class="bg-green-100 text-green-700 p-2 rounded mb-4">{{ session('success') }}</div>
  @endif

  <a href="{{ route('courses.create') }}"
     class="mb-4 inline-block bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded">+ Tambah Course</a>

  <table class="w-full text-sm border">
    <thead class="bg-indigo-100 text-indigo-700">
      <tr>
        <th class="border px-3 py-2">#</th>
        <th class="border px-3 py-2">Judul</th>
        <th class="border px-3 py-2">Kategori</th>
        <th class="border px-3 py-2">Jenjang</th>
        <th class="border px-3 py-2">Aksi</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($courses as $i => $course)
      <tr class="hover:bg-gray-100">
        <td class="border px-3 py-2">{{ $i + 1 }}</td>
        <td class="border px-3 py-2">{{ $course->title }}</td>
        <td class="border px-3 py-2">{{ $course->category }}</td>
        <td class="border px-3 py-2">{{ $course->level }}</td>
        <td class="border px-3 py-2">
          <a href="{{ route('courses.edit', $course) }}" class="text-blue-500 hover:underline mr-2">Edit</a>
          <form action="{{ route('courses.destroy', $course) }}" method="POST" class="inline-block"
                onsubmit="return confirm('Yakin hapus course ini?')">
            @csrf @method('DELETE')
            <button class="text-red-500 hover:underline">Hapus</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
