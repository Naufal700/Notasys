<!DOCTYPE html>
<html lang="id" x-data="{ loading: false }">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Forgot Password - Notasys</title>
<script src="https://cdn.tailwindcss.com"></script>
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
<style>
body { font-family: 'Inter', sans-serif; background: #f0f4f8; }
.glass-card { backdrop-filter: blur(15px); background: rgba(255,255,255,0.85); border-radius: 1rem; border: 1px solid rgba(255,255,255,0.3); box-shadow: 0 8px 25px rgba(0,0,0,0.1); }
</style>
</head>
<body class="flex min-h-screen">

    <div class="hidden md:flex md:w-1/2 bg-indigo-600 text-white flex-col items-center justify-center p-20">
              <h1 class="text-5xl font-bold mb-4">Notasys</h1>
        <p class="text-xl text-indigo-100 text-center max-w-lg">Sistem Manajemen Notaris Modern dan Terintegrasi</p>
    </div>

    <!-- Right Panel / Form -->
    <div class="flex w-full md:w-1/2 items-center justify-center p-6">
        <div class="glass-card w-full max-w-md p-10 shadow-lg">
            <h2 class="text-3xl font-bold text-gray-800 mb-6 text-center">Reset Password</h2>

            <!-- Status Message -->
            <div id="status" class="mb-4 text-green-600 text-sm text-center hidden"></div>

            <form id="forgotForm" class="space-y-6" @submit.prevent="loading = true; setTimeout(() => { alert('Link reset terkirim!'); loading = false; }, 1000)">
                <div>
                    <label for="email" class="block text-gray-700 font-medium mb-2">Email</label>
                    <input id="email" type="email" name="email" required autofocus
                           class="w-full px-5 py-3 rounded-xl border border-gray-300 bg-gray-50 text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 text-lg">
                </div>

                <button type="submit" 
                        class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-3 rounded-xl shadow-md flex items-center justify-center space-x-2"
                        :disabled="loading">
                    <span x-show="!loading">Send Password Reset Link</span>
                    <svg x-show="loading" class="h-5 w-5 animate-spin text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8z"></path>
                    </svg>
                </button>

                <p class="text-center text-gray-500 text-sm mt-4">
                    <a href="{{ route('login') }}" class="text-indigo-600 font-semibold hover:underline">Back to Login</a>
                </p>
            </form>
        </div>
    </div>

</body>
</html>
