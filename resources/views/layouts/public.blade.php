<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>EduLearnt</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
</head>
<body class="bg-gray-50 text-gray-800">

  <header class="bg-indigo-600 text-white shadow">
    <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
      <h1 class="text-2xl font-bold">EduLearnt</h1>
      <nav class="space-x-6 text-sm md:text-base">
        <a href="/" class="hover:underline">Home</a>
        <a href="/courses" class="hover:underline">Kursus</a>
        <a href="/shop" class="hover:underline">Toko</a>
        <a href="/about" class="hover:underline">Tentang</a>
        <a href="{{ route('login') }}" class="bg-white text-indigo-600 px-3 py-1 rounded hover:bg-gray-100">Login Siswa</a>
      </nav>
    </div>
  </header>

  <main class="py-10">
    @yield('content')
  </main>

  <footer class="bg-indigo-700 text-white text-center py-4">
    &copy; {{ now()->year }} EduLearnt. Semua hak dilindungi.
  </footer>

</body>
</html>
