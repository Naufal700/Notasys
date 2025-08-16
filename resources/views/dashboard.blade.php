@extends('layouts.app')

@section('page_title', 'Dashboard Notasys')
{{-- @section('page-title','Dashboard Notasys - Sistem Manajemen Notaris') --}}

@section('content')
<div class="space-y-6">
     <!-- Animated Welcome / Motivational Text -->
    <div class="bg-blue-50 dark:bg-blue-900 rounded-xl p-5 text-center">
        <h2 class="text-xl md:text-2xl font-semibold text-blue-900 dark:text-white">
            Selamat Datang, {{ Auth::user()?->name ?? 'User' }}!
        </h2>
        <p class="text-blue-800 dark:text-blue-200 mt-2" x-data="{ current: 0, messages: ['Tingkatkan produktivitas Anda hari ini', 'Kelola dokumen lebih efisien', 'Pantau semua aktivitas dengan mudah'] }"
           x-init="setInterval(() => { current = (current + 1) % messages.length }, 3000)"
           x-text="messages[current]">
        </p>
    </div>
    <!-- Top Cards Grid -->
          <div class="grid grid-cols-1 md:grid-cols-4 gap-6">

    <!-- Card 1: Transaksi Hari Ini -->
    <div x-data="{ hover: false, collapsed: false }"
         class="bg-gradient-to-br from-blue-50 to-blue-100 dark:from-blue-800 dark:to-blue-900 rounded-3xl shadow-md border border-transparent overflow-hidden transform transition-all duration-300 hover:scale-105 hover:shadow-xl"
         :class="{'ring-2 ring-blue-500': hover, 'h-28': collapsed, 'h-auto': !collapsed}">
        <div class="p-6 cursor-pointer flex items-center" @mouseenter="hover = true" @mouseleave="hover = false">
            <div class="flex-shrink-0 bg-blue-500 text-white rounded-full w-12 h-12 flex items-center justify-center mr-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h1l1-2h2l1 2h1m4 0h1l1-2h2l1 2h1m-8 4h8M4 14h16" />
                </svg>
            </div>
            <div class="flex-1">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-sm font-medium text-blue-700 dark:text-blue-300">Transaksi Hari Ini</p>
                        <h3 x-show="!collapsed" class="mt-1 text-3xl font-extrabold text-blue-900 dark:text-white" x-transition>120</h3>
                    </div>
                    <button @click="collapsed = !collapsed" class="text-gray-400 hover:text-blue-500 dark:hover:text-blue-300 transition-colors">
                        <svg x-show="!collapsed" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5 10a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1z" clip-rule="evenodd" />
                        </svg>
                        <svg x-show="collapsed" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
                <div x-show="!collapsed" class="mt-3 flex items-center gap-2" x-transition>
                    <span class="text-sm font-semibold text-green-600 dark:text-green-400 flex items-center gap-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M12 7a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0V8.414l-4.293 4.293a1 1 0 01-1.414 0L8 10.414l-4.293 4.293a1 1 0 01-1.414-1.414l5-5a1 1 0 011.414 0L11 10.586 14.586 7H12z" clip-rule="evenodd" />
                        </svg>
                        12% dari kemarin
                    </span>
                    <span class="px-2 py-0.5 text-xs font-medium bg-blue-200 text-blue-800 dark:bg-blue-700 dark:text-blue-100 rounded-full">Baru</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Card 2: Dokumen Baru -->
    <div x-data="{ hover: false, collapsed: false }"
         class="bg-gradient-to-br from-purple-50 to-purple-100 dark:from-purple-800 dark:to-purple-900 rounded-3xl shadow-md border border-transparent overflow-hidden transform transition-all duration-300 hover:scale-105 hover:shadow-xl"
         :class="{'ring-2 ring-purple-500': hover, 'h-28': collapsed, 'h-auto': !collapsed}">
        <div class="p-6 cursor-pointer flex items-center" @mouseenter="hover = true" @mouseleave="hover = false">
            <div class="flex-shrink-0 bg-purple-500 text-white rounded-full w-12 h-12 flex items-center justify-center mr-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M4 3h12v14H4V3z" />
                </svg>
            </div>
            <div class="flex-1">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-sm font-medium text-purple-700 dark:text-purple-300">Dokumen Baru</p>
                        <h3 x-show="!collapsed" class="mt-1 text-3xl font-extrabold text-purple-900 dark:text-white" x-transition>35</h3>
                    </div>
                    <button @click="collapsed = !collapsed" class="text-gray-400 hover:text-purple-500 dark:hover:text-purple-300 transition-colors">
                        <svg x-show="!collapsed" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5 10a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1z" clip-rule="evenodd" />
                        </svg>
                        <svg x-show="collapsed" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
                <div x-show="!collapsed" class="mt-3 flex items-center gap-2" x-transition>
                    <span class="text-sm font-semibold text-green-600 dark:text-green-400 flex items-center gap-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M12 7a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0V8.414l-4.293 4.293a1 1 0 01-1.414 0L8 10.414l-4.293 4.293a1 1 0 01-1.414-1.414l5-5a1 1 0 011.414 0L11 10.586 14.586 7H12z" clip-rule="evenodd" />
                        </svg>
                        8% dari kemarin
                    </span>
                    <span class="px-2 py-0.5 text-xs font-medium bg-purple-200 text-purple-800 dark:bg-purple-700 dark:text-purple-100 rounded-full">Baru</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Card 3: Jumlah Klien -->
    <div x-data="{ hover: false, collapsed: false }"
         class="bg-gradient-to-br from-green-50 to-green-100 dark:from-green-800 dark:to-green-900 rounded-3xl shadow-md border border-transparent overflow-hidden transform transition-all duration-300 hover:scale-105 hover:shadow-xl"
         :class="{'ring-2 ring-green-500': hover, 'h-28': collapsed, 'h-auto': !collapsed}">
        <div class="p-6 cursor-pointer flex items-center" @mouseenter="hover = true" @mouseleave="hover = false">
            <div class="flex-shrink-0 bg-green-500 text-white rounded-full w-12 h-12 flex items-center justify-center mr-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M10 6a4 4 0 100-8 4 4 0 000 8zm0 2c-4 0-7 2-7 4v2h14v-2c0-2-3-4-7-4z"/>
                </svg>
            </div>
            <div class="flex-1">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-sm font-medium text-green-700 dark:text-green-300">Jumlah Klien</p>
                        <h3 x-show="!collapsed" class="mt-1 text-3xl font-extrabold text-green-900 dark:text-white" x-transition>{{ $klienHariIni }}</h3>
                    </div>
                    <button @click="collapsed = !collapsed" class="text-gray-400 hover:text-green-500 dark:hover:text-green-300 transition-colors">
                        <svg x-show="!collapsed" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5 10a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1z" clip-rule="evenodd" />
                        </svg>
                        <svg x-show="collapsed" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
                <div x-show="!collapsed" class="mt-3 flex items-center gap-2" x-transition>
                    @php
                        $klienKemarin = \App\Models\Master\Klien::whereDate('created_at', today()->subDay())->count();
                        $growth = $klienKemarin > 0 ? round((($klienHariIni - $klienKemarin)/$klienKemarin)*100, 1) : 0;
                    @endphp
                    <span class="text-sm font-semibold text-green-600 dark:text-green-400 flex items-center gap-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M12 7a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0V8.414l-4.293 4.293a1 1 0 01-1.414 0L8 10.414l-4.293 4.293a1 1 0 01-1.414-1.414l5-5a1 1 0 011.414 0L11 10.586 14.586 7H12z" clip-rule="evenodd" />
                        </svg>
                        {{ $growth }}% dari kemarin
                    </span>
                </div>
            </div>
        </div>
    </div>

    <!-- Card 4: Pendapatan -->
    <div x-data="{ hover: false, collapsed: false }"
         class="bg-gradient-to-br from-yellow-50 to-yellow-100 dark:from-yellow-800 dark:to-yellow-900 rounded-3xl shadow-md border border-transparent overflow-hidden transform transition-all duration-300 hover:scale-105 hover:shadow-xl"
         :class="{'ring-2 ring-yellow-500': hover, 'h-28': collapsed, 'h-auto': !collapsed}">
        <div class="p-6 cursor-pointer flex items-center" @mouseenter="hover = true" @mouseleave="hover = false">
            <div class="flex-shrink-0 bg-yellow-500 text-white rounded-full w-12 h-12 flex items-center justify-center mr-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M10 2a6 6 0 016 6c0 2.21-1.79 4-4 4H8a2 2 0 100 4h4a6 6 0 110 12H6a4 4 0 01-4-4V8a6 6 0 016-6z"/>
                </svg>
            </div>
            <div class="flex-1">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-sm font-medium text-yellow-700 dark:text-yellow-300">Pendapatan</p>
                        <h3 x-show="!collapsed" class="mt-1 text-3xl font-extrabold text-yellow-900 dark:text-white" x-transition>Rp 25.000.000</h3>
                    </div>
                    <button @click="collapsed = !collapsed" class="text-gray-400 hover:text-yellow-500 dark:hover:text-yellow-300 transition-colors">
                        <svg x-show="!collapsed" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5 10a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1z" clip-rule="evenodd" />
                        </svg>
                        <svg x-show="collapsed" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
                <div x-show="!collapsed" class="mt-3 flex items-center gap-2" x-transition>
                    <span class="text-sm font-semibold text-green-600 dark:text-green-400 flex items-center gap-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M12 7a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0V8.414l-4.293 4.293a1 1 0 01-1.414 0L8 10.414l-4.293 4.293a1 1 0 01-1.414-1.414l5-5a1 1 0 011.414 0L11 10.586 14.586 7H12z" clip-rule="evenodd" />
                        </svg>
                        20% dari kemarin
                    </span>
                </div>
            </div>
        </div>
    </div>

</div>


    <!-- Charts Section -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-5">
        <!-- Weekly Revenue Chart -->
        <div x-data="{ collapsed: false }" class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700 overflow-hidden lg:col-span-2">
            <div class="p-5 border-b border-gray-100 dark:border-gray-700">
                <div class="flex justify-between items-center">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Pendapatan Mingguan</h3>
                    <div class="flex items-center space-x-2">
                        <button @click="collapsed = !collapsed" class="text-gray-400 hover:text-primary-500 dark:hover:text-primary-400 transition-colors">
                            <svg x-show="!collapsed" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5 10a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1z" clip-rule="evenodd" />
                            </svg>
                            <svg x-show="collapsed" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                            </svg>
                        </button>
                        <button class="text-gray-400 hover:text-primary-500 dark:hover:text-primary-400 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
            <div x-show="!collapsed" class="p-5" x-transition>
                <div class="h-80">
                    <canvas id="weeklyChart"></canvas>
                </div>
            </div>
        </div>

        <!-- Document Type Pie Chart -->
        <div x-data="{ collapsed: false }" class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700 overflow-hidden">
            <div class="p-5 border-b border-gray-100 dark:border-gray-700">
                <div class="flex justify-between items-center">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Jenis Dokumen</h3>
                    <div class="flex items-center space-x-2">
                        <button @click="collapsed = !collapsed" class="text-gray-400 hover:text-primary-500 dark:hover:text-primary-400 transition-colors">
                            <svg x-show="!collapsed" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5 10a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1z" clip-rule="evenodd" />
                            </svg>
                            <svg x-show="collapsed" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                            </svg>
                        </button>
                        <button class="text-gray-400 hover:text-primary-500 dark:hover:text-primary-400 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
            <div x-show="!collapsed" class="p-5" x-transition>
                <div class="h-80">
                    <canvas id="documentChart"></canvas>
                </div>
            </div>
        </div>

        <!-- Monthly Transactions Chart -->
        <div x-data="{ collapsed: false }" class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700 overflow-hidden lg:col-span-2">
            <div class="p-5 border-b border-gray-100 dark:border-gray-700">
                <div class="flex justify-between items-center">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Transaksi Bulanan</h3>
                    <div class="flex items-center space-x-2">
                        <button @click="collapsed = !collapsed" class="text-gray-400 hover:text-primary-500 dark:hover:text-primary-400 transition-colors">
                            <svg x-show="!collapsed" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5 10a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1z" clip-rule="evenodd" />
                            </svg>
                            <svg x-show="collapsed" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                            </svg>
                        </button>
                        <button class="text-gray-400 hover:text-primary-500 dark:hover:text-primary-400 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
            <div x-show="!collapsed" class="p-5" x-transition>
                <div class="h-80">
                    <canvas id="monthlyChart"></canvas>
                </div>
            </div>
        </div>

        <!-- User Activity Log -->
      <div x-data="{ collapsed: false }" class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700 overflow-hidden">
    <div class="p-5 border-b border-gray-100 dark:border-gray-700">
        <div class="flex justify-between items-center">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Aktivitas Terakhir</h3>
            <div class="flex items-center space-x-2">
                <button @click="collapsed = !collapsed" class="text-gray-400 hover:text-primary-500 dark:hover:text-primary-400 transition-colors">
                    <svg x-show="!collapsed" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M5 10a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1z" clip-rule="evenodd" />
                    </svg>
                    <svg x-show="collapsed" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                    </svg>
                </button>
                <button class="text-gray-400 hover:text-primary-500 dark:hover:text-primary-400 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div x-show="!collapsed" class="p-5" x-transition>
        <div class="space-y-4 max-h-[500px] overflow-y-auto">
            @foreach ($activities as $activity)
            <div class="flex items-start">
                <div class="flex-shrink-0 relative">
                    <img class="h-10 w-10 rounded-full" src="https://ui-avatars.com/api/?name={{ $activity->user->name }}" alt="User avatar">
                    <span class="absolute bottom-0 right-0 block h-2.5 w-2.5 rounded-full ring-2 ring-white dark:ring-gray-800 
                        {{ $activity->user->isOnline() ? 'bg-green-400' : 'bg-gray-400' }}"></span>
                </div>
                <div class="ml-3 flex-1">
                    <div class="flex items-center justify-between">
                        <p class="text-sm font-medium text-gray-900 dark:text-white">{{ $activity->user->name }}</p>
                        <p class="text-xs text-gray-500 dark:text-gray-400">{{ $activity->created_at->diffForHumans() }}</p>
                    </div>
                    <p class="text-sm text-gray-600 dark:text-gray-300">{{ $activity->activity }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

    </div>
</div>

<!-- Toast Notification -->
<div x-data="{ show: false }" 
     x-init="setTimeout(() => { show = true; setTimeout(() => { show = false }, 3000) }, 500)"
     x-show="show"
     x-transition:enter="transition ease-out duration-300"
     x-transition:enter-start="opacity-0 translate-y-2"
     x-transition:enter-end="opacity-100 translate-y-0"
     x-transition:leave="transition ease-in duration-200"
     x-transition:leave-start="opacity-100 translate-y-0"
     x-transition:leave-end="opacity-0 translate-y-2"
     class="fixed bottom-4 right-4 z-50">
    <div class="bg-green-500 text-white px-4 py-3 rounded-lg shadow-lg flex items-center space-x-2">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
        </svg>
        <span>Dashboard berhasil dimuat!</span>
    </div>
</div>

@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sortablejs@1.14.0/Sortable.min.js"></script>
<script>
    // Initialize Sortable for cards
    document.addEventListener('DOMContentLoaded', function() {
        new Sortable(document.querySelector('.grid.grid-cols-1'), {
            animation: 150,
            handle: '.cursor-pointer',
            ghostClass: 'bg-gray-100 dark:bg-gray-700'
        });
    });

    // Weekly Chart with gradient
    const weeklyCtx = document.getElementById('weeklyChart').getContext('2d');
    const weeklyGradient = weeklyCtx.createLinearGradient(0, 0, 0, 300);
    weeklyGradient.addColorStop(0, 'rgba(79, 70, 229, 0.3)');
    weeklyGradient.addColorStop(1, 'rgba(79, 70, 229, 0.05)');

    new Chart(weeklyCtx, {
        type: 'line',
        data: {
            labels: ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'],
            datasets: [{
                label: 'Pendapatan (Rp)',
                data: [2000000, 2500000, 1800000, 3000000, 2800000, 3200000, 4000000],
                borderColor: '#4F46E5',
                backgroundColor: weeklyGradient,
                borderWidth: 2,
                tension: 0.4,
                fill: true,
                pointBackgroundColor: '#4F46E5',
                pointBorderColor: '#fff',
                pointHoverRadius: 6,
                pointHoverBorderWidth: 2
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { display: false },
                tooltip: {
                    mode: 'index',
                    intersect: false,
                    backgroundColor: '#1F2937',
                    titleFont: { size: 14, weight: 'bold' },
                    bodyFont: { size: 12 },
                    padding: 12,
                    cornerRadius: 8,
                    displayColors: false,
                    callbacks: {
                        label: function(context) {
                            return 'Rp ' + context.parsed.y.toLocaleString('id-ID');
                        }
                    }
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: { color: 'rgba(0, 0, 0, 0.05)' },
                    ticks: {
                        callback: function(value) {
                            return 'Rp ' + (value / 1000000).toFixed(1) + 'jt';
                        }
                    }
                },
                x: {
                    grid: { display: false }
                }
            },
            interaction: {
                mode: 'nearest',
                axis: 'x',
                intersect: false
            }
        }
    });

    // Document Type Pie Chart
    const documentCtx = document.getElementById('documentChart').getContext('2d');
    new Chart(documentCtx, {
        type: 'doughnut',
        data: {
            labels: ['Akta Jual Beli', 'Akta Hibah', 'Akta Nikah', 'Akta Pendirian', 'Akta Lainnya'],
            datasets: [{
                data: [35, 25, 20, 15, 5],
                backgroundColor: [
                    '#4F46E5',
                    '#6366F1',
                    '#818CF8',
                    '#A5B4FC',
                    '#C7D2FE'
                ],
                borderWidth: 0,
                hoverOffset: 10
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            cutout: '70%',
            plugins: {
                legend: {
                    position: 'right',
                    labels: {
                        usePointStyle: true,
                        pointStyle: 'circle',
                        padding: 20,
                        font: {
                            size: 12
                        }
                    }
                },
                tooltip: {
                    backgroundColor: '#1F2937',
                    titleFont: { size: 14, weight: 'bold' },
                    bodyFont: { size: 12 },
                    padding: 12,
                    cornerRadius: 8,
                    callbacks: {
                        label: function(context) {
                            const label = context.label || '';
                            const value = context.raw || 0;
                            const total = context.dataset.data.reduce((a, b) => a + b, 0);
                            const percentage = Math.round((value / total) * 100);
                            return `${label}: ${value} (${percentage}%)`;
                        }
                    }
                }
            }
        }
    });

    // Monthly Chart with animation
    const monthlyCtx = document.getElementById('monthlyChart').getContext('2d');
    new Chart(monthlyCtx, {
        type: 'bar',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
            datasets: [{
                label: 'Transaksi',
                data: [120, 150, 180, 200, 170, 190, 210, 230, 250, 220, 200, 180],
                backgroundColor: [
                    'rgba(99, 102, 241, 0.7)',
                    'rgba(99, 102, 241, 0.7)',
                    'rgba(99, 102, 241, 0.7)',
                    'rgba(99, 102, 241, 0.7)',
                    'rgba(99, 102, 241, 0.7)',
                    'rgba(99, 102, 241, 0.7)',
                    'rgba(99, 102, 241, 0.7)',
                    'rgba(99, 102, 241, 0.7)',
                    'rgba(99, 102, 241, 0.7)',
                    'rgba(99, 102, 241, 0.7)',
                    'rgba(99, 102, 241, 0.7)',
                    'rgba(99, 102, 241, 0.7)'
                ],
                borderColor: [
                    'rgba(99, 102, 241, 1)',
                    'rgba(99, 102, 241, 1)',
                    'rgba(99, 102, 241, 1)',
                    'rgba(99, 102, 241, 1)',
                    'rgba(99, 102, 241, 1)',
                    'rgba(99, 102, 241, 1)',
                    'rgba(99, 102, 241, 1)',
                    'rgba(99, 102, 241, 1)',
                    'rgba(99, 102, 241, 1)',
                    'rgba(99, 102, 241, 1)',
                    'rgba(99, 102, 241, 1)',
                    'rgba(99, 102, 241, 1)'
                ],
                borderWidth: 1,
                borderRadius: 6,
                hoverBackgroundColor: 'rgba(79, 70, 229, 0.8)'
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { display: false },
                tooltip: {
                    backgroundColor: '#1F2937',
                    titleFont: { size: 14, weight: 'bold' },
                    bodyFont: { size: 12 },
                    padding: 12,
                    cornerRadius: 8,
                    displayColors: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: { color: 'rgba(0, 0, 0, 0.05)' }
                },
                x: {
                    grid: { display: false }
                }
            },
            animation: {
                duration: 1000,
                easing: 'easeOutQuart'
            }
        }
    });
</script>
@endpush