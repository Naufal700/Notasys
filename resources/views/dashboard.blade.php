@extends('layouts.app')

@section('title','Dashboard')
@section('page-title','Dashboard Notasys - Sistem Manajemen Notaris')

@section('content')
<div class="space-y-6">
    <!-- Top Cards Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5">
        <!-- Card 1: Today's Transactions -->
        <div x-data="{ hover: false, collapsed: false }" 
             class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700 overflow-hidden transition-all duration-300"
             :class="{'ring-2 ring-primary-500': hover, 'h-20': collapsed, 'h-auto': !collapsed}">
            <div class="p-5 cursor-pointer" @mouseenter="hover = true" @mouseleave="hover = false">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Transaksi Hari Ini</p>
                        <h3 x-show="!collapsed" class="mt-1 text-2xl font-bold text-gray-900 dark:text-white" x-transition>120</h3>
                    </div>
                    <button @click="collapsed = !collapsed" class="text-gray-400 hover:text-primary-500 dark:hover:text-primary-400 transition-colors">
                        <svg x-show="!collapsed" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5 10a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1z" clip-rule="evenodd" />
                        </svg>
                        <svg x-show="collapsed" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
                <div x-show="!collapsed" class="mt-3 flex items-center" x-transition>
                    <span class="text-sm font-medium text-green-500 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M12 7a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0V8.414l-4.293 4.293a1 1 0 01-1.414 0L8 10.414l-4.293 4.293a1 1 0 01-1.414-1.414l5-5a1 1 0 011.414 0L11 10.586 14.586 7H12z" clip-rule="evenodd" />
                        </svg>
                        12% dari kemarin
                    </span>
                </div>
            </div>
        </div>

        <!-- Card 2: New Documents -->
        <div x-data="{ hover: false, collapsed: false }" 
             class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700 overflow-hidden transition-all duration-300"
             :class="{'ring-2 ring-primary-500': hover, 'h-20': collapsed, 'h-auto': !collapsed}">
            <div class="p-5 cursor-pointer" @mouseenter="hover = true" @mouseleave="hover = false">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Dokumen Baru</p>
                        <h3 x-show="!collapsed" class="mt-1 text-2xl font-bold text-gray-900 dark:text-white" x-transition>35</h3>
                    </div>
                    <button @click="collapsed = !collapsed" class="text-gray-400 hover:text-primary-500 dark:hover:text-primary-400 transition-colors">
                        <svg x-show="!collapsed" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5 10a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1z" clip-rule="evenodd" />
                        </svg>
                        <svg x-show="collapsed" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
                <div x-show="!collapsed" class="mt-3 flex items-center" x-transition>
                    <span class="text-sm font-medium text-green-500 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M12 7a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0V8.414l-4.293 4.293a1 1 0 01-1.414 0L8 10.414l-4.293 4.293a1 1 0 01-1.414-1.414l5-5a1 1 0 011.414 0L11 10.586 14.586 7H12z" clip-rule="evenodd" />
                        </svg>
                        8% dari kemarin
                    </span>
                </div>
            </div>
        </div>

        <!-- Card 3: New Clients -->
        <div x-data="{ hover: false, collapsed: false }" 
             class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700 overflow-hidden transition-all duration-300"
             :class="{'ring-2 ring-primary-500': hover, 'h-20': collapsed, 'h-auto': !collapsed}">
            <div class="p-5 cursor-pointer" @mouseenter="hover = true" @mouseleave="hover = false">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Klien Baru</p>
                        <h3 x-show="!collapsed" class="mt-1 text-2xl font-bold text-gray-900 dark:text-white" x-transition>12</h3>
                    </div>
                    <button @click="collapsed = !collapsed" class="text-gray-400 hover:text-primary-500 dark:hover:text-primary-400 transition-colors">
                        <svg x-show="!collapsed" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5 10a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1z" clip-rule="evenodd" />
                        </svg>
                        <svg x-show="collapsed" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
                <div x-show="!collapsed" class="mt-3 flex items-center" x-transition>
                    <span class="text-sm font-medium text-green-500 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M12 7a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0V8.414l-4.293 4.293a1 1 0 01-1.414 0L8 10.414l-4.293 4.293a1 1 0 01-1.414-1.414l5-5a1 1 0 011.414 0L11 10.586 14.586 7H12z" clip-rule="evenodd" />
                        </svg>
                        15% dari kemarin
                    </span>
                </div>
            </div>
        </div>

        <!-- Card 4: Revenue -->
        <div x-data="{ hover: false, collapsed: false }" 
             class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700 overflow-hidden transition-all duration-300"
             :class="{'ring-2 ring-primary-500': hover, 'h-20': collapsed, 'h-auto': !collapsed}">
            <div class="p-5 cursor-pointer" @mouseenter="hover = true" @mouseleave="hover = false">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Pendapatan</p>
                        <h3 x-show="!collapsed" class="mt-1 text-2xl font-bold text-gray-900 dark:text-white" x-transition>Rp 25.000.000</h3>
                    </div>
                    <button @click="collapsed = !collapsed" class="text-gray-400 hover:text-primary-500 dark:hover:text-primary-400 transition-colors">
                        <svg x-show="!collapsed" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5 10a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1z" clip-rule="evenodd" />
                        </svg>
                        <svg x-show="collapsed" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
                <div x-show="!collapsed" class="mt-3 flex items-center" x-transition>
                    <span class="text-sm font-medium text-green-500 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M12 7a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0V8.414l-4.293 4.293a1 1 0 01-1.414 0L8 10.414l-4.293 4.293a1 1 0 01-1.414-1.414l5-5a1 1 0 011.414 0L11 10.586 14.586 7H12z" clip-rule="evenodd" />
                        </svg>
                        20% dari kemarin
                    </span>
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
                    <!-- Activity Item -->
                    <div class="flex items-start">
                        <div class="flex-shrink-0 relative">
                            <img class="h-10 w-10 rounded-full" src="https://randomuser.me/api/portraits/women/44.jpg" alt="User avatar">
                            <span class="absolute bottom-0 right-0 block h-2.5 w-2.5 rounded-full ring-2 ring-white dark:ring-gray-800 bg-green-400"></span>
                        </div>
                        <div class="ml-3 flex-1">
                            <div class="flex items-center justify-between">
                                <p class="text-sm font-medium text-gray-900 dark:text-white">Sarah Johnson</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">2 menit lalu</p>
                            </div>
                            <p class="text-sm text-gray-600 dark:text-gray-300">Membuat dokumen baru - Akta Jual Beli No. 123/2023</p>
                        </div>
                    </div>
                    
                    <!-- Activity Item -->
                    <div class="flex items-start">
                        <div class="flex-shrink-0 relative">
                            <img class="h-10 w-10 rounded-full" src="https://randomuser.me/api/portraits/men/32.jpg" alt="User avatar">
                            <span class="absolute bottom-0 right-0 block h-2.5 w-2.5 rounded-full ring-2 ring-white dark:ring-gray-800 bg-green-400"></span>
                        </div>
                        <div class="ml-3 flex-1">
                            <div class="flex items-center justify-between">
                                <p class="text-sm font-medium text-gray-900 dark:text-white">Michael Brown</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">15 menit lalu</p>
                            </div>
                            <p class="text-sm text-gray-600 dark:text-gray-300">Mengupdate status dokumen - Akta Hibah No. 45/2023</p>
                        </div>
                    </div>
                    
                    <!-- Activity Item -->
                    <div class="flex items-start">
                        <div class="flex-shrink-0 relative">
                            <img class="h-10 w-10 rounded-full" src="https://randomuser.me/api/portraits/women/68.jpg" alt="User avatar">
                            <span class="absolute bottom-0 right-0 block h-2.5 w-2.5 rounded-full ring-2 ring-white dark:ring-gray-800 bg-gray-400"></span>
                        </div>
                        <div class="ml-3 flex-1">
                            <div class="flex items-center justify-between">
                                <p class="text-sm font-medium text-gray-900 dark:text-white">Lisa Wong</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">1 jam lalu</p>
                            </div>
                            <p class="text-sm text-gray-600 dark:text-gray-300">Mengupload lampiran untuk Akta Nikah No. 89/2023</p>
                        </div>
                    </div>
                    
                    <!-- Activity Item -->
                    <div class="flex items-start">
                        <div class="flex-shrink-0 relative">
                            <img class="h-10 w-10 rounded-full" src="https://randomuser.me/api/portraits/men/75.jpg" alt="User avatar">
                            <span class="absolute bottom-0 right-0 block h-2.5 w-2.5 rounded-full ring-2 ring-white dark:ring-gray-800 bg-green-400"></span>
                        </div>
                        <div class="ml-3 flex-1">
                            <div class="flex items-center justify-between">
                                <p class="text-sm font-medium text-gray-900 dark:text-white">David Wilson</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">3 jam lalu</p>
                            </div>
                            <p class="text-sm text-gray-600 dark:text-gray-300">Membuat invoice untuk klien PT. Maju Jaya</p>
                        </div>
                    </div>
                    
                    <!-- Activity Item -->
                    <div class="flex items-start">
                        <div class="flex-shrink-0 relative">
                            <img class="h-10 w-10 rounded-full" src="https://randomuser.me/api/portraits/women/44.jpg" alt="User avatar">
                            <span class="absolute bottom-0 right-0 block h-2.5 w-2.5 rounded-full ring-2 ring-white dark:ring-gray-800 bg-green-400"></span>
                        </div>
                        <div class="ml-3 flex-1">
                            <div class="flex items-center justify-between">
                                <p class="text-sm font-medium text-gray-900 dark:text-white">Sarah Johnson</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">5 jam lalu</p>
                            </div>
                            <p class="text-sm text-gray-600 dark:text-gray-300">Mengapprove pembayaran dari Tn. Budi Santoso</p>
                        </div>
                    </div>
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