<header class="sticky top-0 z-40 w-full backdrop-blur-md bg-gradient-to-r from-white/80 to-white/60 dark:from-gray-900/80 dark:to-gray-800/60 border-b border-gray-200 dark:border-gray-700 shadow-sm transition-colors duration-500">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">

            <!-- Left: Sidebar Toggle & Title -->
            <div class="flex items-center space-x-4">
                <!-- Sidebar Button -->
              <!-- Sidebar Toggle Button -->
<button @click="sidebarOpen = !sidebarOpen" 
        class="lg:hidden p-2 rounded-xl hover:bg-indigo-100 dark:hover:bg-indigo-900 transition-all duration-300
               border border-transparent dark:border-gray-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-900"
        aria-label="Toggle sidebar">
    <svg class="w-6 h-6 text-gray-600 dark:text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
    </svg>
</button>


                <!-- Page Title -->
                <div class="relative group">
                    <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100 tracking-wide transition-colors duration-300">
                        @yield('page_title')
                    </h1>
                    <div class="absolute bottom-0 left-0 w-0 h-1 bg-indigo-500 rounded-full group-hover:w-full transition-all duration-500"></div>
                </div>
            </div>

            <!-- Right: Controls -->
            <div class="flex items-center space-x-3 sm:space-x-4">

                <!-- Mobile Search -->
                <button class="lg:hidden p-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors duration-200">
                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </button>

                <!-- Notification -->
                <div class="relative" x-data="{ open: false }">
                    <button @click="open = !open" 
                            class="p-2 rounded-full hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors duration-300 relative"
                            aria-label="Notifications">
                        <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                        </svg>
                        <span class="absolute top-1 right-1 w-2.5 h-2.5 bg-red-500 rounded-full animate-pulse ring-2 ring-white dark:ring-gray-900"></span>
                    </button>
                    <!-- Dropdown -->
                    <div x-show="open" x-transition class="absolute right-0 mt-2 w-80 bg-white dark:bg-gray-800 shadow-2xl rounded-xl z-50 border border-gray-200 dark:border-gray-700 overflow-hidden">
                        <div class="px-5 py-3 border-b border-gray-200 dark:border-gray-700 flex justify-between items-center">
                            <h3 class="font-semibold text-gray-900 dark:text-white">Notifications</h3>
                            <span class="text-xs bg-indigo-100 dark:bg-indigo-900 text-indigo-800 dark:text-indigo-200 px-2 py-1 rounded-full font-medium">3 New</span>
                        </div>
                        <div class="divide-y divide-gray-200 dark:divide-gray-700 max-h-64 overflow-y-auto">
                            <a href="#" class="block px-5 py-3 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors rounded-xl">
                                <div class="flex items-start space-x-3">
                                    <div class="flex-shrink-0 pt-0.5">
                                        <div class="w-9 h-9 rounded-full bg-indigo-100 dark:bg-indigo-900 flex items-center justify-center">
                                            <svg class="w-5 h-5 text-indigo-500 dark:text-indigo-300" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z"/>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="flex-1">
                                        <p class="text-sm font-medium text-gray-900 dark:text-white">New document uploaded</p>
                                        <p class="text-xs text-gray-500 dark:text-gray-400">2 minutes ago</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="px-4 py-2 border-t border-gray-200 dark:border-gray-700 text-center">
                            <a href="#" class="text-sm font-semibold text-indigo-600 dark:text-indigo-400 hover:text-indigo-800 dark:hover:text-indigo-300">View all</a>
                        </div>
                    </div>
                </div>

                <!-- Dark Mode Toggle -->
                <button @click="darkMode = !darkMode" class="p-2 rounded-full hover:bg-gray-100 dark:hover:bg-gray-800 transition-all duration-300" aria-label="Toggle dark mode">
                    <template x-if="!darkMode">
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 3v1m0 16v1m8.485-8.485h1M3.515 12.515h1M16.95 7.05l.707-.707M6.343 17.657l.707-.707M16.95 16.95l.707.707M6.343 6.343l.707.707"/>
                        </svg>
                    </template>
                    <template x-if="darkMode">
                        <svg class="w-5 h-5 text-indigo-300" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"/>
                        </svg>
                    </template>
                </button>

                <!-- User Dropdown -->
                <div class="relative" x-data="{ open: false }">
                    <button @click="open = !open" class="flex items-center space-x-2 p-1 rounded-full hover:bg-gray-100 dark:hover:bg-gray-800 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-900">
                        <div class="relative">
                            <img src="https://ui-avatars.com/api/?name={{ Auth::user()?->name ?? 'User' }}&background=6366f1&color=fff" class="w-9 h-9 rounded-full border-2 border-indigo-500 dark:border-indigo-400 transition-transform duration-200 hover:scale-110">
                            <span class="absolute bottom-0 right-0 w-2.5 h-2.5 bg-green-500 rounded-full border border-white dark:border-gray-900 animate-pulse"></span>
                        </div>
                        <span class="hidden sm:inline text-sm font-medium text-gray-700 dark:text-gray-200">{{ Auth::user()?->name ?? 'Guest' }}</span>
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400 transition-transform duration-200" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <!-- Dropdown Content -->
                    <div x-show="open" x-transition class="absolute right-0 mt-2 w-48 bg-white dark:bg-gray-800 shadow-xl rounded-xl z-50 border border-gray-200 dark:border-gray-700 overflow-hidden">
                        @auth
                        <div class="px-4 py-3 border-b border-gray-200 dark:border-gray-700">
                            <p class="text-sm font-semibold text-gray-900 dark:text-white">{{ Auth::user()->name }}</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400 truncate">{{ Auth::user()->email }}</p>
                        </div>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 flex items-center transition-all duration-200">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg> Profile
                        </a>
                        <form method="POST" action="{{ route('logout') }}"> @csrf
                            <button type="submit" class="w-full text-left px-4 py-2 text-sm text-red-600 dark:text-red-400 hover:bg-gray-100 dark:hover:bg-gray-700 flex items-center transition-all duration-200">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                                Sign out
                            </button>
                        </form>
                        @else
                        <a href="{{ route('login') }}" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 transition-all duration-200">Login</a>
                        @endauth
                    </div>
                </div>

            </div>
        </div>
    </div>
</header>
