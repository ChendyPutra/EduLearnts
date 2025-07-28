@extends('layouts.admin')

@section('content')
<div class="max-w-5xl mx-auto bg-white p-6 rounded shadow">
  <h2 class="text-2xl font-bold text-indigo-700 mb-4">
    Modul untuk Course: {{ $course->title }}
  </h2>

  @if (session('success'))
    <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">{{ session('success') }}</div>
  @endif

  <a href="{{ route('modules.create', $course) }}"
     class="mb-4 inline-block bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded">
    + Tambah Modul
  </a>

  <table class="w-full border text-sm">
    <thead class="bg-indigo-100 text-indigo-700">
      <tr>
        <th class="border px-3 py-2">#</th>
        <th class="border px-3 py-2">Judul</th>
        <th class="border px-3 py-2">Urutan</th>
        <th class="border px-3 py-2">Video</th>
        <th class="border px-3 py-2">Aksi</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($modules as $i => $module)
        <tr class="hover:bg-gray-100">
          <td class="border px-3 py-2">{{ $i + 1 }}</td>
          <td class="border px-3 py-2">{{ $module->title }}</td>
          <td class="border px-3 py-2">{{ $module->order }}</td>
          <td class="border px-3 py-2 text-blue-600 truncate">
            @if ($module->video_url)
              <a href="{{ $module->video_url }}" target="_blank">Lihat Video</a>
            @else
              -
            @endif
          </td>
          <td class="border px-3 py-2">
            <a href="{{ route('modules.edit', [$course, $module]) }}" class="text-blue-500 hover:underline">Edit</a>
            <form action="{{ route('modules.destroy', [$course, $module]) }}" method="POST" class="inline-block ml-2"
                  onsubmit="return confirm('Yakin hapus modul ini?')">
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
