<!DOCTYPE html>
<html lang="id" x-data="{ showPassword: false }">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Daftar - Notasys</title>
<script src="https://cdn.tailwindcss.com"></script>
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
<style>
body { font-family: 'Inter', sans-serif; background: #f0f4f8; }
.glass-card { backdrop-filter: blur(15px); background: rgba(255,255,255,0.85); border-radius: 1rem; border: 1px solid rgba(255,255,255,0.3); box-shadow: 0 8px 25px rgba(0,0,0,0.1); }
.input-focus:focus { box-shadow: 0 0 0 2px rgba(99,102,241,0.3); border-color: #6366f1; }
</style>
</head>
<body class="flex items-center justify-center min-h-screen p-4">

<div class="glass-card w-full max-w-md p-10 z-10">
    <h1 class="text-3xl font-semibold text-gray-800 mb-8 text-center">Daftar Notasys</h1>

    @if($errors->any())
      <div class="bg-red-100 text-red-700 px-4 py-2 rounded mb-4">
          <ul class="list-disc pl-5">
              @foreach($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
    @endif

    <form action="{{ route('register') }}" method="POST" class="space-y-6">
        @csrf
        <div>
            <label class="block text-gray-700 mb-2 font-medium">Nama Depan</label>
            <input type="text" name="first_name" placeholder="Nama Depan" required class="w-full px-5 py-3 rounded-xl border border-gray-300 input-focus"/>
        </div>

        <div>
            <label class="block text-gray-700 mb-2 font-medium">Nama Belakang</label>
            <input type="text" name="last_name" placeholder="Nama Belakang" required class="w-full px-5 py-3 rounded-xl border border-gray-300 input-focus"/>
        </div>

        <div>
            <label class="block text-gray-700 mb-2 font-medium">Email</label>
            <input type="email" name="email" placeholder="Email kamu" required class="w-full px-5 py-3 rounded-xl border border-gray-300 input-focus"/>
        </div>

        <div x-data="{ show: false }">
            <label class="block text-gray-700 mb-2 font-medium">Password</label>
            <div class="relative">
                <input :type="show ? 'text' : 'password'" name="password" placeholder="Password" required class="w-full px-5 py-3 rounded-xl border border-gray-300 pr-10 input-focus"/>
                <button type="button" @click="show = !show" class="absolute right-4 top-2/4 -translate-y-2/4 text-gray-400 hover:text-gray-600"><span x-text="show ? '🙈' : '👁️'"></span></button>
            </div>
        </div>

        <div x-data="{ show: false }">
            <label class="block text-gray-700 mb-2 font-medium">Konfirmasi Password</label>
            <div class="relative">
                <input :type="show ? 'text' : 'password'" name="password_confirmation" placeholder="Konfirmasi Password" required class="w-full px-5 py-3 rounded-xl border border-gray-300 pr-10 input-focus"/>
                <button type="button" @click="show = !show" class="absolute right-4 top-2/4 -translate-y-2/4 text-gray-400 hover:text-gray-600"><span x-text="show ? '🙈' : '👁️'"></span></button>
            </div>
        </div>

        <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-3 rounded-xl shadow-md">Daftar</button>
    </form>

    <p class="mt-6 text-center text-gray-500 text-sm">
      Sudah punya akun? 
      <a href="{{ route('login') }}" class="text-indigo-600 font-semibold hover:underline">Masuk sekarang</a>
    </p>
</div>
</body>
</html>
