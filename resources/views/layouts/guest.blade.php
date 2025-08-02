<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'EduLearnt') }}</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

  <!-- Scripts -->
  @vite(['resources/css/app.css', 'resources/js/app.js'])

  <!-- Animasi tambahan -->
  <style>
    @keyframes fade-in-down {
      from {
        opacity: 0;
        transform: translateY(-20px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .animate-fade-in-down {
      animation: fade-in-down 0.5s ease-out both;
    }
  </style>
</head>
<body class="font-sans text-gray-900 antialiased bg-gradient-to-br from-blue-100 to-indigo-200 min-h-screen flex items-center justify-center">

  <div class="w-full sm:max-w-md px-6 py-8 bg-white shadow-2xl rounded-2xl animate-fade-in-down">


    {{-- Slot Laravel Breeze --}}
    {{ $slot }}

  </div>
</body>
</html>
