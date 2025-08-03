<!DOCTYPE html>
<html lang="id" x-data="layout()" x-init="init()" :class="{ 'dark': isDarkMode }">

<head>
  <meta charset="UTF-8">
  <title>EduLearnt</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      darkMode: 'class',
      theme: {
        extend: {
          fontFamily: {
            sans: ['Poppins', 'sans-serif']
          }
        }
      }
    }
  </script>

  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    body { font-family: 'Poppins', sans-serif; }
    [x-cloak] { display: none !important; }
  </style>
  @php use Illuminate\Support\Str; @endphp
</head>

<body class="min-h-screen flex flex-col bg-slate-100 dark:bg-slate-900 text-slate-800 dark:text-slate-200">

  <header class="bg-white dark:bg-slate-800 shadow-sm border-b border-slate-200 dark:border-slate-700 z-20">
    <div class="max-w-7xl mx-auto px-4 py-4 flex flex-wrap justify-between items-center">
      <a href="/" class="text-2xl font-bold text-indigo-600 dark:text-indigo-400">EduLearnt</a>
      <nav class="flex flex-wrap gap-4 items-center text-sm md:text-base relative">
        <a href="/" class="hover:underline">Home</a>
        <a href="/courses" class="hover:underline">Kursus</a>
        <a href="/shop" class="hover:underline">Toko</a>
        <a href="/about" class="hover:underline">Tentang</a>
        <button @click="toggleDarkMode()" id="toggleDark" class="text-slate-500 dark:text-slate-300 text-sm hover:underline">
          <i class="bi" :class="isDarkMode ? 'bi-sun' : 'bi-moon-stars-fill'"></i>
        </button>

        @guest
        <a href="{{ route('login') }}" class="bg-indigo-600 text-white px-3 py-1.5 rounded hover:bg-indigo-700 transition">Login Siswa</a>
        @endguest

        @auth
        <div class="relative" x-data="{ open: false }">
          <button @click="open = !open" class="flex items-center gap-2 focus:outline-none hover:opacity-90 transition">
            <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}" alt="Avatar" class="w-8 h-8 rounded-full border-2 border-white">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
          </button>
          <div x-show="open" @click.away="open = false" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="transform opacity-0 scale-90" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-90" class="absolute right-0 mt-2 w-48 bg-white dark:bg-slate-800 text-black dark:text-white rounded-md shadow-lg z-50 py-1" x-cloak>
            <a href="{{ route('profile.edit') }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-slate-700 transition">Profil</a>
            <form method="POST" action="{{ route('logout') }}">
              @csrf
              <button type="submit" class="w-full text-left px-4 py-2 hover:bg-gray-100 dark:hover:bg-slate-700 transition">Logout</button>
            </form>
          </div>
        </div>
        @endauth
      </nav>
    </div>
  </header>

  <main class="flex-grow py-10">
    @yield('content')
  </main>

  <footer class="bg-indigo-700 text-white mt-auto">
    <div class="max-w-7xl mx-auto px-4 py-8 grid grid-cols-1 md:grid-cols-3 gap-6 text-sm">
      <div>
        <h3 class="text-lg font-bold mb-2">EduLearnt</h3>
        <p class="text-gray-200">Platform belajar coding, AI, dan robotika sejak dini. Akses kursus online maupun program sekolah mitra dengan mudah dan menyenangkan.</p>
      </div>
      <div>
        <h4 class="font-semibold mb-2">Navigasi</h4>
        <ul class="space-y-1">
          <li><a href="/" class="hover:underline">Beranda</a></li>
          <li><a href="/courses" class="hover:underline">Kursus</a></li>
          <li><a href="/shop" class="hover:underline">Toko</a></li>
          <li><a href="/about" class="hover:underline">Tentang</a></li>
        </ul>
      </div>
      <div>
        <h4 class="font-semibold mb-2">Kontak Kami</h4>
        <p>Email: <a href="mailto:info@edulearnt.id" class="hover:underline">info@edulearnt.id</a></p>
        <p>Instagram: <a href="https://instagram.com/edulearnt" target="_blank" class="hover:underline">@edulearnt</a></p>
        <p>WhatsApp: <a href="https://wa.me/6281234567890" target="_blank" class="hover:underline">+62 812-3456-7890</a></p>
      </div>
    </div>
    <div class="text-center py-4 bg-indigo-800 text-xs text-gray-200">
      &copy; {{ now()->year }} EduLearnt. Semua hak dilindungi.
    </div>
  </footer>

  <script>
    function layout() {
      return {
        isDarkMode: localStorage.getItem('theme') === 'dark' || false,
        toggleDarkMode() {
          this.isDarkMode = !this.isDarkMode;
          localStorage.setItem('theme', this.isDarkMode ? 'dark' : 'light');
        }
      }
    }
  </script>
</body>
</html>