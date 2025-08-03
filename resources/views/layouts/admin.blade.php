<!DOCTYPE html>
<html lang="en" x-data="layout()" x-init="init()" :class="{ 'dark': isDarkMode }">

<head>
  <meta charset="UTF-8">
  <title>Admin Panel - EduLearnt</title>
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
    [x-cloak] {
      display: none !important
    }
  </style>
</head>

<body class="bg-slate-100 dark:bg-slate-900 text-slate-800 dark:text-slate-200 antialiased">
  <div class="flex min-h-screen">
    <!-- Sidebar -->
    <aside class="bg-slate-800 text-white min-h-screen w-64 hidden md:block">
      <div class="px-6 py-4 border-b border-slate-700">
        <h1 class="text-xl font-bold">EduLearnt Admin</h1>
      </div>
      <nav class="mt-4 space-y-2">
        <a href="{{ route('admin.dashboard') }}" class="block px-6 py-2 hover:bg-slate-700 rounded">Dashboard</a>
        <a href="{{ route('admin.courses.index') }}" class="block px-6 py-2 hover:bg-slate-700 rounded">Courses</a>
        <a href="{{ route('admin.modules.index', ['course' => 1]) }}"
          class="block px-6 py-2 hover:bg-slate-700 rounded">Modules</a>
        <a href="{{ route('admin.quizzes.index') }}" class="block px-6 py-2 hover:bg-slate-700 rounded">Quizzes</a>
        <a href="{{ route('admin.products.index') }}" class="block px-6 py-2 hover:bg-slate-700 rounded">Shop</a>
        @if(Route::has('admin.index'))
      <a href="{{ route('admin.index') }}" class="block px-6 py-2 hover:bg-slate-700 rounded">Manage Admin</a>
    @endif
        <a href="{{ route('admin.feedback.index') }}" class="block px-6 py-2   hover:bg-slate-700 rounded">
          Feedback Pengguna
        </a>

      </nav>
    </aside>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col">
      <!-- Header -->
      <header class="bg-white dark:bg-slate-800 shadow-sm border-b border-slate-200 dark:border-slate-700">
        <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
          <h2 class="text-lg font-semibold">Admin Panel</h2>
          <div x-data="{ open: false }" class="relative">
            <button @click="open = !open" class="flex items-center gap-2 focus:outline-none">
              <img src="https://cdn-icons-png.flaticon.com/128/149/149071.png" class="w-9 h-9 rounded-full">
              <svg class="w-4 h-4 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg>
            </button>
            <div x-show="open" @click.away="open = false" x-transition
              class="absolute right-0 mt-2 w-72 bg-white dark:bg-slate-800 text-sm rounded shadow-lg z-50 py-1" x-cloak>
              <!-- Profile Info -->
              <div class="px-5 py-4 border-b border-slate-200 dark:border-slate-700">
                <p class="text-xs text-slate-500 dark:text-slate-400 mb-1">Signed in as</p>
                <p class="text-sm font-semibold text-slate-800 dark:text-white">{{ Auth::user()->name }}</p>
                <p class="text-sm text-slate-600 dark:text-slate-300">Role: <span
                    class="font-medium">{{ Auth::user()->role }}</span></p>
              </div>

              <!-- Actions -->
              <div class="py-2">
                <form action="{{ route('admin.logout') }}" method="POST">
                  @csrf
                  <button type="submit"
                    class="w-full text-left flex items-center gap-3 px-5 py-3 text-sm text-red-600 dark:text-red-400 hover:bg-red-50 dark:hover:bg-slate-700 transition-colors">
                    <i class="bi bi-box-arrow-right text-lg"></i>
                    Logout
                  </button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </header>

      <!-- Content Area -->
      <main class="flex-1 p-6">
        @yield('content')
      </main>
    </div>
  </div>

  <script>
    function layout() {
      return {
        isDarkMode: localStorage.getItem('theme') === 'dark' || false,
        init() {
          window.addEventListener('resize', () => { });
        },
        toggleDarkMode() {
          this.isDarkMode = !this.isDarkMode;
          localStorage.setItem('theme', this.isDarkMode ? 'dark' : 'light');
        }
      }
    }
  </script>
</body>

</html>