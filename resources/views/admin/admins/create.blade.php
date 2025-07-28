@extends('layouts.admin')

@section('content')
<div class="max-w-xl mx-auto p-6 bg-white rounded shadow">
  <h2 class="text-2xl font-bold text-indigo-700 mb-6">Tambah Admin</h2>

  @if ($errors->any())
    <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
      {{ $errors->first() }}
    </div>
  @endif

  <form method="POST" action="{{ route('admin.store') }}">
    @csrf

    <div class="mb-4">
      <label class="block font-medium">Nama</label>
      <input name="name" value="{{ old('name') }}" class="w-full border px-3 py-2 rounded" required>
    </div>

    <div class="mb-4">
      <label class="block font-medium">Email</label>
      <input name="email" type="email" value="{{ old('email') }}" class="w-full border px-3 py-2 rounded" required>
    </div>

    <div class="mb-4">
      <label class="block font-medium">Password</label>
      <input name="password" type="password" class="w-full border px-3 py-2 rounded" required>
    </div>

    <div class="mb-6">
      <label class="block font-medium">Role</label>
      <select name="role" class="w-full border px-3 py-2 rounded">
        <option value="admin">Admin</option>
        <option value="superadmin">Superadmin</option>
      </select>
    </div>

    <button class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">Simpan</button>
    <a href="{{ route('admin.index') }}" class="ml-4 text-gray-600 hover:underline">Batal</a>
  </form>
</div>
@endsection
