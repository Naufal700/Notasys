<header class="sticky top-0 z-50 w-full backdrop-blur-lg bg-white/70 dark:bg-gray-900/70 
               border-b border-gray-200 dark:border-gray-700 shadow-sm transition-colors duration-500">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">

            <!-- Left: Sidebar Toggle & Page Title -->
            <div class="flex items-center space-x-4">
                <!-- Sidebar Toggle Button (Mobile) -->
                <button class="lg:hidden p-2 rounded-xl hover:bg-indigo-100 dark:hover:bg-indigo-900 transition-all duration-300"
                        aria-label="Toggle sidebar">
                    <svg class="w-6 h-6 text-indigo-700 dark:text-indigo-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>

                <!-- Page Title -->
                <div class="relative group">
    <h1 class="text-2xl md:text-3xl font-extrabold text-gray-900 dark:text-gray-100 tracking-wide font-poppins transition-all duration-500 
               group-hover:scale-105">
        @yield('page_title')
    </h1>
    <!-- Animated gradient underline -->
    <div class="absolute bottom-0 left-0 w-0 h-1 rounded-full 
                bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 
                group-hover:w-full transition-all duration-700"></div>
</div>
            </div>

            <!-- Right: Notifications & User -->
            <div class="flex items-center space-x-3 sm:space-x-4">

                <!-- Notifications -->
                <div class="relative" x-data="{ open: false }">
                    <button @click="open = !open"
                            class="p-2 rounded-full hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors duration-300 relative"
                            aria-label="Notifications">
                        <svg class="w-5 h-5 text-indigo-700 dark:text-indigo-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                        </svg>
                        <span class="absolute top-1 right-1 w-2.5 h-2.5 bg-red-500 rounded-full animate-pulse ring-2 ring-white"></span>
                    </button>

                    <!-- Dropdown -->
                    <div x-show="open" x-transition.opacity x-transition.duration.300ms
                         @click.away="open = false"
                         class="absolute right-0 mt-2 w-80 bg-white dark:bg-gray-800 shadow-xl rounded-2xl z-50 
                                border border-gray-200 dark:border-gray-700 overflow-hidden">
                        <div class="px-5 py-3 border-b border-gray-200 dark:border-gray-700 flex justify-between items-center">
                            <h3 class="font-semibold text-indigo-700 dark:text-indigo-200">Notifications</h3>
                            <span class="text-xs bg-indigo-100 dark:bg-indigo-700 text-indigo-800 dark:text-indigo-100 px-2 py-1 rounded-full font-medium">3 New</span>
                        </div>
                        <div class="divide-y divide-gray-200 dark:divide-gray-700 max-h-64 overflow-y-auto">
                            <a href="#" class="block px-5 py-3 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors rounded-xl">
                                <div class="flex items-start space-x-3">
                                    <div class="flex-shrink-0 pt-0.5">
                                        <div class="w-9 h-9 rounded-full bg-indigo-100 dark:bg-indigo-700 flex items-center justify-center">
                                            <svg class="w-5 h-5 text-indigo-700 dark:text-indigo-200" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z"/>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="flex-1">
                                        <p class="text-sm font-medium text-gray-900 dark:text-gray-100">New document uploaded</p>
                                        <p class="text-xs text-gray-500 dark:text-gray-400">2 minutes ago</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="px-4 py-2 border-t border-gray-200 dark:border-gray-700 text-center">
                            <a href="#" class="text-sm font-semibold text-indigo-700 dark:text-indigo-200 hover:text-indigo-500">View all</a>
                        </div>
                    </div>
                </div>

                <!-- User Dropdown -->
                <div class="relative" x-data="{ open: false }">
                    <button @click="open = !open"
                            class="flex items-center space-x-2 p-1 rounded-full hover:bg-gray-100 dark:hover:bg-gray-800 
                                   transition-all duration-300 focus:outline-none">
                        <div class="relative">
                            <img src="https://ui-avatars.com/api/?name={{ Auth::user()?->name ?? 'User' }}&background=1E3A8A&color=fff"
                                 class="w-10 h-10 rounded-full border-2 border-indigo-700 dark:border-indigo-300">
                            <span class="absolute bottom-0 right-0 w-2.5 h-2.5 bg-green-500 rounded-full border border-white animate-pulse"></span>
                        </div>
                        <span class="hidden sm:inline text-sm font-medium text-indigo-700 dark:text-indigo-200">
                            {{ Auth::user()?->name ?? 'Guest' }}
                        </span>
                        <svg class="w-4 h-4 text-indigo-700 dark:text-indigo-200 transition-transform duration-200" 
                             :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>

                    <div x-show="open" x-transition.opacity x-transition.duration.300ms
                         @click.away="open = false"
                         class="absolute right-0 mt-2 w-48 bg-white dark:bg-gray-800 shadow-xl rounded-2xl z-50 
                                border border-gray-200 dark:border-gray-700 overflow-hidden">
                        @auth
                        <div class="px-4 py-3 border-b border-gray-200 dark:border-gray-700">
                            <p class="text-sm font-semibold text-indigo-700 dark:text-indigo-200">{{ Auth::user()->name }}</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400 truncate">{{ Auth::user()->email }}</p>
                        </div>
                        <a href="#" class="block px-4 py-2 text-sm text-indigo-700 dark:text-indigo-200 hover:bg-gray-100 dark:hover:bg-gray-700 flex items-center">Profile</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                    class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-100 dark:hover:bg-gray-700 flex items-center">
                                Sign out
                            </button>
                        </form>
                        @else
                        <a href="{{ route('login') }}" 
                           class="block px-4 py-2 text-sm text-indigo-700 dark:text-indigo-200 hover:bg-gray-100 dark:hover:bg-gray-700">Login</a>
                        @endauth
                    </div>
                </div>

            </div>
        </div>
    </div>
</header>
