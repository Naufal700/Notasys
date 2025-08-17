<!DOCTYPE html>
<html lang="id" x-data="{ showPassword: false }">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login - Notasys</title>
<script src="https://cdn.tailwindcss.com"></script>
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
<style>
body { font-family: 'Inter', sans-serif; margin:0; }
.glass-card { backdrop-filter: blur(15px); background: rgba(255,255,255,0.85); border-radius: 0; border: none; box-shadow: none; }
.input-focus:focus { box-shadow: 0 0 0 2px rgba(99,102,241,0.3); border-color: #6366f1; }
</style>
</head>
<body class="min-h-screen flex">

<div class="flex w-full h-screen">
    <!-- Kiri: Logo & Info -->
    <div class="hidden md:flex md:w-1/2 bg-indigo-600 text-white flex-col items-center justify-center p-20">
              <h1 class="text-5xl font-bold mb-4">Notasys</h1>
        <p class="text-xl text-indigo-100 text-center max-w-lg">Sistem Manajemen Notaris Modern dan Terintegrasi</p>
    </div>

    <!-- Kanan: Form Login Full Layar -->
    <div class="flex w-full md:w-1/2 items-center justify-center p-0">
        <div class="w-full h-full glass-card flex flex-col justify-center px-12">
            <div class="text-center mb-10">
                <h2 class="text-4xl font-semibold text-gray-800 mb-2">Masuk Ke Dashboard Anda</h2>
                <p class="text-gray-500 text-lg">Masukkan email dan password Anda</p>
            </div>

            @if(session('success'))
              <div class="bg-green-100 text-green-700 px-4 py-3 rounded mb-6">{{ session('success') }}</div>
            @endif
            @if(session('error'))
              <div class="bg-red-100 text-red-700 px-4 py-3 rounded mb-6">{{ session('error') }}</div>
            @endif

            <form action="{{ route('login') }}" method="POST" class="space-y-6 w-full max-w-lg mx-auto">
                @csrf
                <!-- Email -->
                <div>
                    <label class="block text-gray-700 mb-2 font-medium text-lg">Email</label>
                    <input type="email" name="email" placeholder="Email kamu" required 
                           class="w-full px-6 py-4 rounded-xl border border-gray-300 input-focus text-xl"/>
                </div>

                <!-- Password -->
                <div x-data="{ show: false }">
                    <label class="block text-gray-700 mb-2 font-medium text-lg">Password</label>
                    <div class="relative">
                        <input :type="show ? 'text' : 'password'" name="password" placeholder="Password" required 
                               class="w-full px-6 py-4 rounded-xl border border-gray-300 pr-12 input-focus text-xl"/>
                        <button type="button" @click="show = !show" class="absolute right-4 top-2/4 -translate-y-2/4 text-gray-400 hover:text-gray-600">
                            <!-- Heroicons Eye / Eye Off -->
                            <svg x-show="!show" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                            </svg>
                            <svg x-show="show" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.477 0-8.268-2.943-9.542-7a9.966 9.966 0 012.125-3.451M6.938 6.938A9.966 9.966 0 0112 5c4.477 0 8.268 2.943 9.542 7a9.966 9.966 0 01-1.947 3.183M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3l18 18"/>
                            </svg>
                        </button>
                    </div>
                    <!-- Lupa Kata Sandi -->
                    <div class="text-right mt-2">
    <a href="{{ route('password.request') }}" 
       class="text-gray-500 hover:text-gray-700 font-medium text-base">
       Lupa Kata Sandi?
    </a>
</div>

                </div>

                <!-- Tombol Login & Daftar sejajar -->
                <div class="flex space-x-4 mt-4">
                    <button type="submit" class="flex-1 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-4 rounded-xl shadow-md text-lg">Masuk</button>
                    <a href="{{ route('register') }}" class="flex-1">
                        <button type="button" class="w-full bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold py-4 rounded-xl shadow-md text-lg">Daftar</button>
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>
