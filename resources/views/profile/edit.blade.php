@extends('layouts.public')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <h2 class="text-2xl font-bold text-indigo-700 mb-6">Profil</h2>

    {{-- Update Informasi Profil --}}
    <div class="p-6 mb-6 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
        <h3 class="text-lg font-semibold mb-4 text-gray-800 dark:text-gray-100">Informasi Profil</h3>
        <div class="max-w-xl">
            @include('profile.partials.update-profile-information-form')
        </div>
    </div>

    {{-- Update Password --}}
    <div class="p-6 mb-6 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
        <h3 class="text-lg font-semibold mb-4 text-gray-800 dark:text-gray-100">Ubah Password</h3>
        <div class="max-w-xl">
            @include('profile.partials.update-password-form')
        </div>
    </div>

    {{-- Hapus Akun --}}
    <div class="p-6 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
        <h3 class="text-lg font-semibold mb-4 text-red-600 dark:text-red-400">Hapus Akun</h3>
        <div class="max-w-xl">
            @include('profile.partials.delete-user-form')
        </div>
    </div>
</div>
@endsection
