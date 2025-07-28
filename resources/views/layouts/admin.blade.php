{{-- resources/views/layouts/admin.blade.php --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Panel - EduLearnt</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 min-h-screen font-sans antialiased">

    {{-- Header --}}
    <header class="bg-white shadow-md">
        <div class="max-w-7xl mx-auto px-4 py-4 flex items-center justify-between">
            <h1 class="text-2xl font-bold text-indigo-700 animate-fade-in-down">Admin Panel</h1>
            <form action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <button class="text-red-600 hover:underline text-sm">Logout</button>
            </form>
        </div>
    </header>

    {{-- Sidebar + Content --}}
    <div class="flex">
        {{-- Sidebar --}}
        <aside class="w-64 bg-white shadow-lg h-screen p-4 hidden md:block">
            <nav class="space-y-2">
                <a href="{{ route('admin.dashboard') }}"
                    class="block px-3 py-2 rounded hover:bg-indigo-100">Dashboard</a>
                <a href="{{ route('admin.courses.index') }}"
                    class="block px-3 py-2 rounded hover:bg-indigo-100">Courses</a>

                {{-- Route modules dan quizzes sebaiknya dibedakan per-course, jadi link umum bisa di-nonaktifkan dulu
                --}}
                <a href="{{ route('admin.modules.index', ['course' => 1]) }}"
                    class="block px-3 py-2 rounded hover:bg-indigo-100">Modules</a>
                <a href="{{ route('admin.quizzes.index') }}"
                    class="block px-3 py-2 rounded hover:bg-indigo-100">Quizzes</a>

                <a href="{{ route('admin.products.index') }}"
                    class="block px-3 py-2 rounded hover:bg-indigo-100">Shop</a>

                @if(Route::has('admin.index'))
                    <a href="{{ route('admin.index') }}" class="block px-3 py-2 rounded hover:bg-indigo-100">Manage
                        Admin</a>
                @endif
            </nav>
        </aside>

        {{-- Main Content --}}
        <main class="flex-1 p-6 animate-fade-in">
            @yield('content')
        </main>
    </div>

</body>

</html>