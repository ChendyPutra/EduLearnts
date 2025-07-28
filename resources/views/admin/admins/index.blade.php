{{-- resources/views/admin/admins/index.blade.php --}}
@extends('layouts.admin')

@section('content')
<div class="container mx-auto p-6 bg-white rounded shadow">
  <h1 class="text-2xl font-bold text-indigo-700 mb-4">Manajemen Admin</h1>

  @if (session('success'))
    <div class="bg-green-100 text-green-700 px-4 py-2 mb-4 rounded">{{ session('success') }}</div>
  @endif

  <div class="mb-4">
    <a href="{{ route('admin.create') }}"
       class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded transition-all">+ Tambah Admin</a>
  </div>

  <table class="min-w-full border text-sm text-left">
    <thead class="bg-indigo-100 text-indigo-700">
      <tr>
        <th class="px-4 py-2 border">#</th>
        <th class="px-4 py-2 border">Nama</th>
        <th class="px-4 py-2 border">Email</th>
        <th class="px-4 py-2 border">Role</th>
        <th class="px-4 py-2 border text-center">Aksi</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($admins as $i => $admin)
        <tr class="hover:bg-gray-100 transition">
          <td class="px-4 py-2 border">{{ $i+1 }}</td>
          <td class="px-4 py-2 border">{{ $admin->name }}</td>
          <td class="px-4 py-2 border">{{ $admin->email }}</td>
          <td class="px-4 py-2 border capitalize">{{ $admin->role }}</td>
          <td class="px-4 py-2 border text-center">
            <a href="{{ route('admin.edit', $admin) }}"
               class="text-blue-500 hover:underline mr-2">Edit</a>
            <form action="{{ route('admin.destroy', $admin) }}" method="POST" class="inline-block"
                  onsubmit="return confirm('Yakin ingin menghapus admin ini?')">
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
