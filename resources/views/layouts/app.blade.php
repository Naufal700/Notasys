<!DOCTYPE html>
<html lang="id" x-data="{ 
    darkMode: localStorage.getItem('darkMode') === 'true',
    sidebarOpen: window.innerWidth >= 1024,
    isMobileMenuOpen: false
  }" 
  x-init="
    $watch('darkMode', value => localStorage.setItem('darkMode', value));
    window.addEventListener('resize', () => sidebarOpen = window.innerWidth >= 1024);
  " 
  :class="{ 'dark': darkMode }">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Notasys - Sistem Manajemen Notaris Modern">
    <title>@yield('title','Notasys')</title>
    
    <!-- Favicon -->
    <link rel="icon" type="image/svg+xml" href="/favicon.svg">
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet" />
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: { 
                extend: { 
                    colors: { 
                        primary: {
                            50: '#f0f9ff',
                            100: '#e0f2fe',
                            200: '#bae6fd',
                            300: '#7dd3fc',
                            400: '#38bdf8',
                            500: '#0ea5e9',
                            600: '#0284c7',
                            700: '#0369a1',
                            800: '#075985',
                            900: '#0c4a6e',
                        },
                        secondary: '#6366F1',
                        dark: {
                            800: '#1e293b',
                            900: '#0f172a'
                        }
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif']
                    },
                    transitionDuration: {
                        '250': '250ms'
                    }
                } 
            }
        }
    </script>
    
    <!-- Alpine JS -->
    <script src="//unpkg.com/alpinejs" defer></script>
    
    <!-- Sortable JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.15.0/Sortable.min.js"></script>
    
    @stack('styles')
</head>
<body class="bg-gray-50 dark:bg-gray-900 text-gray-800 dark:text-gray-200 font-sans antialiased flex min-h-screen transition-colors duration-250">
    <!-- Sidebar Backdrop (Mobile) -->
    <div x-show="isMobileMenuOpen" @click="isMobileMenuOpen = false" 
         class="fixed inset-0 bg-black/50 lg:hidden z-30" x-transition.opacity></div>

    <!-- Sidebar -->
    @include('layouts.sidebar')

    <!-- Main content area -->
    <div class="flex-1 flex flex-col min-h-screen transition-all duration-250 ease-in-out" 
         :class="sidebarOpen ? 'lg:ml-64' : 'lg:ml-20'">
        
        <!-- Navbar -->
        @include('layouts.navbar')

        <!-- Page Content -->
        <main class="flex-1 p-4 sm:p-6">
            <!-- Page Header -->
            <div class="mb-6 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <div>
                    <h1 class="text-2xl font-bold text-gray-900 dark:text-white">@yield('page-title')</h1>
                    <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">@yield('page-description')</p>
                </div>
                <div class="flex items-center space-x-2">
                    @yield('page-actions')
                </div>
            </div>
            
            <!-- Page Content -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-4 sm:p-6">
                @yield('content')
            </div>
            
            <!-- Toast Notification Area -->
            <div class="fixed bottom-4 right-4 space-y-2 z-50" x-data="{ toasts: [] }">
                <template x-for="(toast, index) in toasts" :key="index">
                    <div x-transition:enter="transform ease-out duration-300 transition"
                         x-transition:enter-start="translate-y-2 opacity-0 sm:translate-y-0 sm:translate-x-2"
                         x-transition:enter-end="translate-y-0 opacity-100 sm:translate-x-0"
                         x-transition:leave="transition ease-in duration-100"
                         x-transition:leave-start="opacity-100"
                         x-transition:leave-end="opacity-0"
                         class="max-w-xs w-full bg-white dark:bg-gray-800 shadow-lg rounded-lg pointer-events-auto ring-1 ring-black ring-opacity-5 overflow-hidden border border-gray-200 dark:border-gray-700">
                        <div class="p-4">
                            <div class="flex items-start">
                                <div class="flex-shrink-0" x-bind:class="{
                                    'text-green-500': toast.type === 'success',
                                    'text-red-500': toast.type === 'error',
                                    'text-blue-500': toast.type === 'info',
                                    'text-yellow-500': toast.type === 'warning'
                                }">
                                    <span class="material-symbols-rounded" x-text="{
                                        'success': 'check_circle',
                                        'error': 'error',
                                        'info': 'info',
                                        'warning': 'warning'
                                    }[toast.type]"></span>
                                </div>
                                <div class="ml-3 w-0 flex-1 pt-0.5">
                                    <p x-text="toast.title" class="text-sm font-medium text-gray-900 dark:text-white"></p>
                                    <p x-text="toast.message" class="mt-1 text-sm text-gray-500 dark:text-gray-400"></p>
                                </div>
                                <div class="ml-4 flex-shrink-0 flex">
                                    <button @click="toasts.splice(index, 1)" class="bg-white dark:bg-gray-800 rounded-md inline-flex text-gray-400 hover:text-gray-500 focus:outline-none">
                                        <span class="sr-only">Close</span>
                                        <span class="material-symbols-rounded text-lg">close</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </template>
            </div>
        </main>

        <!-- Footer -->
        @include('layouts.footer')
    </div>

    <!-- Loading Overlay -->
    <div x-show="$store.loading" x-transition.opacity 
         class="fixed inset-0 bg-black/30 z-50 flex items-center justify-center">
        <div class="animate-spin rounded-full h-12 w-12 border-t-2 border-b-2 border-primary-500"></div>
    </div>

    <script>
        // Global store for loading state
        document.addEventListener('alpine:init', () => {
            Alpine.store('loading', false);
            
            // Toast function
            window.showToast = function(type, title, message, duration = 5000) {
                const toastContainer = document.querySelector('[x-data="{ toasts: [] }"]');
                const toastData = Alpine.$data(toastContainer);
                
                const toast = { type, title, message };
                toastData.toasts.push(toast);
                
                if (duration) {
                    setTimeout(() => {
                        const index = toastData.toasts.indexOf(toast);
                        if (index !== -1) {
                            toastData.toasts.splice(index, 1);
                        }
                    }, duration);
                }
            };
        });
    </script>

    @stack('scripts')
</body>
</html>