{{-- resources/views/admin/login.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Admin - EduLearnt</title>
  @vite('resources/css/app.css')
</head>
<body class="bg-gradient-to-br from-blue-100 to-indigo-200 min-h-screen flex items-center justify-center font-sans">

  <div class="bg-white shadow-2xl rounded-2xl p-8 max-w-md w-full animate-fade-in-down">
    <h2 class="text-2xl font-bold text-center text-indigo-600 mb-6">Login Admin</h2>

    {{-- Pesan error --}}
    @if ($errors->any())
      <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
        <strong>Error:</strong> {{ $errors->first() }}
      </div>
    @endif

    {{-- Form Login --}}
    <form method="POST" action="{{ route('admin.login.submit') }}">
      @csrf

      {{-- Email --}}
      <div class="mb-4">
        <label for="email" class="block text-gray-700 font-medium">Email</label>
        <input type="email" name="email" id="email" required
               class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
      </div>

      {{-- Password --}}
      <div class="mb-6">
        <label for="password" class="block text-gray-700 font-medium">Password</label>
        <input type="password" name="password" id="password" required
               class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
      </div>

      {{-- Submit Button --}}
      <button type="submit"
              class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 rounded-md shadow transition duration-300">
        Masuk
      </button>
    </form>
  </div>

  {{-- Animasi --}}
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

</body>
</html>
