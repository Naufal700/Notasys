<aside x-data="{ 
    sidebarOpen: true, 
    nestedOpen: null,
    activeMenu: null,
    hoveredMenu: null
  }" 
  :class="sidebarOpen ? 'w-64' : 'w-20'" 
  class="bg-gradient-to-b from-blue-900 to-blue-800 h-screen fixed transition-all duration-300 shadow-xl z-20 border-r border-blue-700">

    <!-- Logo & toggle -->
    <div class="flex items-center justify-between p-4 border-b border-blue-700">
        <div class="flex items-center space-x-2 overflow-hidden">
           <div class="w-10 h-10 rounded-lg bg-gradient-to-br from-blue-600 to-blue-700 hover:from-blue-500 hover:to-blue-600 
            flex items-center justify-center shrink-0 transition-all duration-300 transform hover:scale-110 shadow-lg text-white">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
              </svg>
           </div>
            <span class="font-bold text-lg text-blue-100 whitespace-nowrap" x-show="sidebarOpen">Notasys</span>
        </div>
        <button @click="sidebarOpen = !sidebarOpen" class="p-1.5 rounded-lg hover:bg-blue-700 transition-all">
            <svg class="w-5 h-5 text-blue-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path x-show="!sidebarOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                <path x-show="sidebarOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>
    </div>

    <!-- User Profile Mini -->
    <div class="p-4 border-b border-blue-700 flex items-center space-x-3 overflow-hidden" x-show="sidebarOpen">
        <div class="relative">
            <div class="w-10 h-10 rounded-full bg-blue-600 flex items-center justify-center text-blue-100 font-medium text-sm">
                MN
            </div>
            <span class="absolute bottom-0 right-0 w-3 h-3 bg-green-500 rounded-full border-2 border-blue-800"></span>
        </div>
        <div>
            <p class="font-medium text-sm text-blue-100">Muhamad Naufal Istikhori</p>
            <p class="text-xs text-blue-300">Admin</p>
        </div>
    </div>

    <!-- Search (visible when expanded) -->
    <div class="p-3" x-show="sidebarOpen" x-transition>
        <div class="relative">
            <input type="text" placeholder="Search..." class="w-full pl-10 pr-4 py-2 bg-blue-800 text-blue-100 placeholder-blue-400 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:bg-blue-700 transition">
            <svg class="absolute left-3 top-2.5 h-4 w-4 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
            </svg>
        </div>
    </div>

    <!-- Menu -->
    <nav class="mt-2 text-blue-100 text-sm font-medium overflow-y-auto h-[calc(100vh-220px)]">
        <!-- Dashboard -->
        <a href="{{ route('dashboard') }}" 
           @mouseenter="hoveredMenu = 'dashboard'"
           @mouseleave="hoveredMenu = null"
           :class="{
             'bg-blue-700 text-white': activeMenu === 'dashboard',
             'bg-blue-800': hoveredMenu === 'dashboard' && activeMenu !== 'dashboard'
           }"
           class="flex items-center p-3 mx-2 rounded-lg transition-all duration-200 group">
            <div class="relative">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
                <span x-show="sidebarOpen" class="ml-3">Dashboard</span>
                <span x-show="sidebarOpen && activeMenu === 'dashboard'" class="absolute left-0 top-1/2 -translate-y-1/2 w-1 h-6 bg-blue-400 rounded-full -ml-2"></span>
            </div>
            <span x-show="!sidebarOpen" class="absolute left-full ml-2 px-2 py-1 bg-blue-800 text-white text-xs rounded opacity-0 group-hover:opacity-100 whitespace-nowrap shadow-lg">Dashboard</span>
        </a>

        <!-- Create Document/Deed (New Section) -->
        <a href="#" 
           @mouseenter="hoveredMenu = 'create'"
           @mouseleave="hoveredMenu = null"
           :class="{
             'bg-blue-700 text-white': activeMenu === 'create',
             'bg-blue-800': hoveredMenu === 'create' && activeMenu !== 'create'
           }"
           class="flex items-center p-3 mx-2 rounded-lg transition-all duration-200 group mt-1">
            <div class="relative">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
                <span x-show="sidebarOpen" class="ml-3">Buat Dokumen/Akta</span>
                <span x-show="sidebarOpen && activeMenu === 'create'" class="absolute left-0 top-1/2 -translate-y-1/2 w-1 h-6 bg-blue-400 rounded-full -ml-2"></span>
            </div>
            <span x-show="!sidebarOpen" class="absolute left-full ml-2 px-2 py-1 bg-blue-800 text-white text-xs rounded opacity-0 group-hover:opacity-100 whitespace-nowrap shadow-lg">Buat Dokumen</span>
        </a>

        <!-- Master Data -->
        <div>
            <button @click="nestedOpen === 1 ? nestedOpen = null : nestedOpen = 1" 
                    @mouseenter="hoveredMenu = 'master'"
                    @mouseleave="hoveredMenu = null"
                    :class="{
                      'bg-blue-700 text-white': nestedOpen === 1,
                      'bg-blue-800': hoveredMenu === 'master' && nestedOpen !== 1
                    }"
                    class="flex items-center p-3 mx-2 rounded-lg w-full transition-all duration-200 group mt-1">
                <div class="relative">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                    </svg>
                    <span x-show="sidebarOpen" class="ml-3">Master Data</span>
                    <span x-show="sidebarOpen && nestedOpen === 1" class="absolute left-0 top-1/2 -translate-y-1/2 w-1 h-6 bg-blue-400 rounded-full -ml-2"></span>
                </div>
                <svg x-show="sidebarOpen" :class="nestedOpen===1?'rotate-90 text-blue-300':''" 
                     class="ml-auto w-4 h-4 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
                <span x-show="!sidebarOpen" class="absolute left-full ml-2 px-2 py-1 bg-blue-800 text-white text-xs rounded opacity-0 group-hover:opacity-100 whitespace-nowrap shadow-lg">Master Data</span>
            </button>
            <div x-show="nestedOpen===1 && sidebarOpen" x-collapse class="pl-8 space-y-1 mt-1">
                <a href="{{ route('master.klien.index') }}" class="flex items-center py-2 px-4 mx-2 rounded-lg hover:bg-blue-700 transition-all text-blue-200">
                    <span class="w-1.5 h-1.5 bg-blue-400 rounded-full mr-3"></span>
                    Klien
                </a>
                <a href="#" class="flex items-center py-2 px-4 mx-2 rounded-lg hover:bg-blue-700 transition-all text-blue-200">
                    <span class="w-1.5 h-1.5 bg-blue-400 rounded-full mr-3"></span>
                    Staff
                </a>
                <a href="#" class="flex items-center py-2 px-4 mx-2 rounded-lg hover:bg-blue-700 transition-all text-blue-200">
                    <span class="w-1.5 h-1.5 bg-blue-400 rounded-full mr-3"></span>
                    Users
                </a>
                <a href="{{ route('master.jenis-akta.index') }}" class="flex items-center py-2 px-4 mx-2 rounded-lg hover:bg-blue-700 transition-all text-blue-200">
                    <span class="w-1.5 h-1.5 bg-blue-400 rounded-full mr-3"></span>
                    Jenis Akta
                </a>
                <a href="#" class="flex items-center py-2 px-4 mx-2 rounded-lg hover:bg-blue-700 transition-all text-blue-200">
                    <span class="w-1.5 h-1.5 bg-blue-400 rounded-full mr-3"></span>
                    Bank / Rekening
                </a>
                <a href="#" class="flex items-center py-2 px-4 mx-2 rounded-lg hover:bg-blue-700 transition-all text-blue-200">
                    <span class="w-1.5 h-1.5 bg-blue-400 rounded-full mr-3"></span>
                    Supplier
                </a>
                <a href="{{ route('template_dokumen.index') }}" class="flex items-center py-2 px-4 mx-2 rounded-lg hover:bg-blue-700 transition-all text-blue-200">
                    <span class="w-1.5 h-1.5 bg-blue-400 rounded-full mr-3"></span>
                    Template Dokumen
                </a>
                <a href="#" class="flex items-center py-2 px-4 mx-2 rounded-lg hover:bg-blue-700 transition-all text-blue-200">
                    <span class="w-1.5 h-1.5 bg-blue-400 rounded-full mr-3"></span>
                    Kategori Biaya
                </a>
            </div>
        </div>

        <!-- Dokumen & Akta -->
        <div>
            <button @click="nestedOpen === 2 ? nestedOpen = null : nestedOpen = 2" 
                    @mouseenter="hoveredMenu = 'dokumen'"
                    @mouseleave="hoveredMenu = null"
                    :class="{
                      'bg-blue-700 text-white': nestedOpen === 2,
                      'bg-blue-800': hoveredMenu === 'dokumen' && nestedOpen !== 2
                    }"
                    class="flex items-center p-3 mx-2 rounded-lg w-full transition-all duration-200 group mt-1">
                <div class="relative">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    <span x-show="sidebarOpen" class="ml-3">Dokumen / Akta</span>
                    <span x-show="sidebarOpen && nestedOpen === 2" class="absolute left-0 top-1/2 -translate-y-1/2 w-1 h-6 bg-blue-400 rounded-full -ml-2"></span>
                </div>
                <svg x-show="sidebarOpen" :class="nestedOpen===2?'rotate-90 text-blue-300':''" 
                     class="ml-auto w-4 h-4 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
                <span x-show="!sidebarOpen" class="absolute left-full ml-2 px-2 py-1 bg-blue-800 text-white text-xs rounded opacity-0 group-hover:opacity-100 whitespace-nowrap shadow-lg">Dokumen</span>
            </button>
            <div x-show="nestedOpen===2 && sidebarOpen" x-collapse class="pl-8 space-y-1 mt-1">
                <a href="#" class="flex items-center py-2 px-4 mx-2 rounded-lg hover:bg-blue-700 transition-all text-blue-200">
                    <span class="w-1.5 h-1.5 bg-blue-400 rounded-full mr-3"></span>
                    Dokumen Baru
                    <span class="ml-auto px-2 py-0.5 bg-blue-600 text-blue-100 text-xs rounded-full">New</span>
                </a>
                <a href="#" class="flex items-center py-2 px-4 mx-2 rounded-lg hover:bg-blue-700 transition-all text-blue-200">
                    <span class="w-1.5 h-1.5 bg-blue-400 rounded-full mr-3"></span>
                    Status Akta
                </a>
                <a href="#" class="flex items-center py-2 px-4 mx-2 rounded-lg hover:bg-blue-700 transition-all text-blue-200">
                    <span class="w-1.5 h-1.5 bg-blue-400 rounded-full mr-3"></span>
                    Arsip Dokumen
                </a>
                <a href="#" class="flex items-center py-2 px-4 mx-2 rounded-lg hover:bg-blue-700 transition-all text-blue-200">
                    <span class="w-1.5 h-1.5 bg-blue-400 rounded-full mr-3"></span>
                    Notifikasi / Reminder
                </a>
                <a href="#" class="flex items-center py-2 px-4 mx-2 rounded-lg hover:bg-blue-700 transition-all text-blue-200">
                    <span class="w-1.5 h-1.5 bg-blue-400 rounded-full mr-3"></span>
                    Dokumen Masuk
                </a>
                <a href="#" class="flex items-center py-2 px-4 mx-2 rounded-lg hover:bg-blue-700 transition-all text-blue-200">
                    <span class="w-1.5 h-1.5 bg-blue-400 rounded-full mr-3"></span>
                    Dokumen Keluar
                </a>
                <a href="#" class="flex items-center py-2 px-4 mx-2 rounded-lg hover:bg-blue-700 transition-all text-blue-200">
                    <span class="w-1.5 h-1.5 bg-blue-400 rounded-full mr-3"></span>
                    Dokumen Pending
                </a>
            </div>
        </div>

        <!-- Transaksi -->
        <div>
            <button @click="nestedOpen === 3 ? nestedOpen = null : nestedOpen = 3" 
                    @mouseenter="hoveredMenu = 'transaksi'"
                    @mouseleave="hoveredMenu = null"
                    :class="{
                      'bg-blue-700 text-white': nestedOpen === 3,
                      'bg-blue-800': hoveredMenu === 'transaksi' && nestedOpen !== 3
                    }"
                    class="flex items-center p-3 mx-2 rounded-lg w-full transition-all duration-200 group mt-1">
                <div class="relative">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    <span x-show="sidebarOpen" class="ml-3">Transaksi</span>
                    <span x-show="sidebarOpen && nestedOpen === 3" class="absolute left-0 top-1/2 -translate-y-1/2 w-1 h-6 bg-blue-400 rounded-full -ml-2"></span>
                </div>
                <svg x-show="sidebarOpen" :class="nestedOpen===3?'rotate-90 text-blue-300':''" 
                     class="ml-auto w-4 h-4 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
                <span x-show="!sidebarOpen" class="absolute left-full ml-2 px-2 py-1 bg-blue-800 text-white text-xs rounded opacity-0 group-hover:opacity-100 whitespace-nowrap shadow-lg">Transaksi</span>
            </button>
            <div x-show="nestedOpen===3 && sidebarOpen" x-collapse class="pl-8 space-y-1 mt-1">
                <a href="#" class="flex items-center py-2 px-4 mx-2 rounded-lg hover:bg-blue-700 transition-all text-blue-200">
                    <span class="w-1.5 h-1.5 bg-blue-400 rounded-full mr-3"></span>
                    Kas & Bank
                </a>
                <a href="#" class="flex items-center py-2 px-4 mx-2 rounded-lg hover:bg-blue-700 transition-all text-blue-200">
                    <span class="w-1.5 h-1.5 bg-blue-400 rounded-full mr-3"></span>
                    Pendapatan
                </a>
                <a href="#" class="flex items-center py-2 px-4 mx-2 rounded-lg hover:bg-blue-700 transition-all text-blue-200">
                    <span class="w-1.5 h-1.5 bg-blue-400 rounded-full mr-3"></span>
                    Pengeluaran
                </a>
                <a href="#" class="flex items-center py-2 px-4 mx-2 rounded-lg hover:bg-blue-700 transition-all text-blue-200">
                    <span class="w-1.5 h-1.5 bg-blue-400 rounded-full mr-3"></span>
                    Invoice
                </a>
                <a href="#" class="flex items-center py-2 px-4 mx-2 rounded-lg hover:bg-blue-700 transition-all text-blue-200">
                    <span class="w-1.5 h-1.5 bg-blue-400 rounded-full mr-3"></span>
                    Pembayaran
                </a>
                <a href="#" class="flex items-center py-2 px-4 mx-2 rounded-lg hover:bg-blue-700 transition-all text-blue-200">
                    <span class="w-1.5 h-1.5 bg-blue-400 rounded-full mr-3"></span>
                    Rekonsiliasi Bank
                </a>
            </div>
        </div>

        <!-- Laporan -->
        <div>
            <button @click="nestedOpen === 4 ? nestedOpen = null : nestedOpen = 4" 
                    @mouseenter="hoveredMenu = 'laporan'"
                    @mouseleave="hoveredMenu = null"
                    :class="{
                      'bg-blue-700 text-white': nestedOpen === 4,
                      'bg-blue-800': hoveredMenu === 'laporan' && nestedOpen !== 4
                    }"
                    class="flex items-center p-3 mx-2 rounded-lg w-full transition-all duration-200 group mt-1">
                <div class="relative">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    <span x-show="sidebarOpen" class="ml-3">Laporan</span>
                    <span x-show="sidebarOpen && nestedOpen === 4" class="absolute left-0 top-1/2 -translate-y-1/2 w-1 h-6 bg-blue-400 rounded-full -ml-2"></span>
                </div>
                <svg x-show="sidebarOpen" :class="nestedOpen===4?'rotate-90 text-blue-300':''" 
                     class="ml-auto w-4 h-4 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
                <span x-show="!sidebarOpen" class="absolute left-full ml-2 px-2 py-1 bg-blue-800 text-white text-xs rounded opacity-0 group-hover:opacity-100 whitespace-nowrap shadow-lg">Laporan</span>
            </button>
            <div x-show="nestedOpen===4 && sidebarOpen" x-collapse class="pl-8 space-y-1 mt-1">
                <a href="#" class="flex items-center py-2 px-4 mx-2 rounded-lg hover:bg-blue-700 transition-all text-blue-200">
                    <span class="w-1.5 h-1.5 bg-blue-400 rounded-full mr-3"></span>
                    Laporan Transaksi
                </a>
                <a href="#" class="flex items-center py-2 px-4 mx-2 rounded-lg hover:bg-blue-700 transition-all text-blue-200">
                    <span class="w-1.5 h-1.5 bg-blue-400 rounded-full mr-3"></span>
                    Laporan Akta
                </a>
                <a href="#" class="flex items-center py-2 px-4 mx-2 rounded-lg hover:bg-blue-700 transition-all text-blue-200">
                    <span class="w-1.5 h-1.5 bg-blue-400 rounded-full mr-3"></span>
                    Laporan Keuangan
                </a>
                <a href="#" class="flex items-center py-2 px-4 mx-2 rounded-lg hover:bg-blue-700 transition-all text-blue-200">
                    <span class="w-1.5 h-1.5 bg-blue-400 rounded-full mr-3"></span>
                    Laporan Produktivitas
                </a>
                <a href="#" class="flex items-center py-2 px-4 mx-2 rounded-lg hover:bg-blue-700 transition-all text-blue-200">
                    <span class="w-1.5 h-1.5 bg-blue-400 rounded-full mr-3"></span>
                    Laporan Pajak
                </a>
                <a href="#" class="flex items-center py-2 px-4 mx-2 rounded-lg hover:bg-blue-700 transition-all text-blue-200">
                    <span class="w-1.5 h-1.5 bg-blue-400 rounded-full mr-3"></span>
                    Laporan Custom
                </a>
            </div>
        </div>

        <!-- Kalender & Jadwal -->
        <a href="#" 
           @mouseenter="hoveredMenu = 'kalender'"
           @mouseleave="hoveredMenu = null"
           :class="{
             'bg-blue-700 text-white': activeMenu === 'kalender',
             'bg-blue-800': hoveredMenu === 'kalender' && activeMenu !== 'kalender'
           }"
           class="flex items-center p-3 mx-2 rounded-lg transition-all duration-200 group mt-1">
            <div class="relative">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                <span x-show="sidebarOpen" class="ml-3">Kalender</span>
                <span x-show="sidebarOpen && activeMenu === 'kalender'" class="absolute left-0 top-1/2 -translate-y-1/2 w-1 h-6 bg-blue-400 rounded-full -ml-2"></span>
            </div>
            <span x-show="!sidebarOpen" class="absolute left-full ml-2 px-2 py-1 bg-blue-800 text-white text-xs rounded opacity-0 group-hover:opacity-100 whitespace-nowrap shadow-lg">Kalender</span>
        </a>

        <!-- Pengaturan -->
        <div>
            <button @click="nestedOpen === 5 ? nestedOpen = null : nestedOpen = 5" 
                    @mouseenter="hoveredMenu = 'pengaturan'"
                    @mouseleave="hoveredMenu = null"
                    :class="{
                      'bg-blue-700 text-white': nestedOpen === 5,
                      'bg-blue-800': hoveredMenu === 'pengaturan' && nestedOpen !== 5
                    }"
                    class="flex items-center p-3 mx-2 rounded-lg w-full transition-all duration-200 group mt-1">
                <div class="relative">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    <span x-show="sidebarOpen" class="ml-3">Pengaturan</span>
                    <span x-show="sidebarOpen && nestedOpen === 5" class="absolute left-0 top-1/2 -translate-y-1/2 w-1 h-6 bg-blue-400 rounded-full -ml-2"></span>
                </div>
                <svg x-show="sidebarOpen" :class="nestedOpen===5?'rotate-90 text-blue-300':''" 
                     class="ml-auto w-4 h-4 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
                <span x-show="!sidebarOpen" class="absolute left-full ml-2 px-2 py-1 bg-blue-800 text-white text-xs rounded opacity-0 group-hover:opacity-100 whitespace-nowrap shadow-lg">Pengaturan</span>
            </button>
            <div x-show="nestedOpen===5 && sidebarOpen" x-collapse class="pl-8 space-y-1 mt-1">
                <a href="#" class="flex items-center py-2 px-4 mx-2 rounded-lg hover:bg-blue-700 transition-all text-blue-200">
                    <span class="w-1.5 h-1.5 bg-blue-400 rounded-full mr-3"></span>
                    Profil Perusahaan
                </a>
                <a href="#" class="flex items-center py-2 px-4 mx-2 rounded-lg hover:bg-blue-700 transition-all text-blue-200">
                    <span class="w-1.5 h-1.5 bg-blue-400 rounded-full mr-3"></span>
                    Pengguna & Role
                </a>
                <a href="#" class="flex items-center py-2 px-4 mx-2 rounded-lg hover:bg-blue-700 transition-all text-blue-200">
                    <span class="w-1.5 h-1.5 bg-blue-400 rounded-full mr-3"></span>
                    Backup & Restore
                </a>
                <a href="#" class="flex items-center py-2 px-4 mx-2 rounded-lg hover:bg-blue-700 transition-all text-blue-200">
                    <span class="w-1.5 h-1.5 bg-blue-400 rounded-full mr-3"></span>
                    Integrasi API
                </a>
                <a href="#" class="flex items-center py-2 px-4 mx-2 rounded-lg hover:bg-blue-700 transition-all text-blue-200">
                    <span class="w-1.5 h-1.5 bg-blue-400 rounded-full mr-3"></span>
                    Template Email
                </a>
                <a href="#" class="flex items-center py-2 px-4 mx-2 rounded-lg hover:bg-blue-700 transition-all text-blue-200">
                    <span class="w-1.5 h-1.5 bg-blue-400 rounded-full mr-3"></span>
                    Audit Log
                </a>
            </div>
        </div>

        <!-- Help & Support -->
        <a href="#" 
           @mouseenter="hoveredMenu = 'help'"
           @mouseleave="hoveredMenu = null"
           :class="{
             'bg-blue-700 text-white': activeMenu === 'help',
             'bg-blue-800': hoveredMenu === 'help' && activeMenu !== 'help'
           }"
           class="flex items-center p-3 mx-2 rounded-lg transition-all duration-200 group mt-1">
            <div class="relative">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span x-show="sidebarOpen" class="ml-3">Bantuan</span>
                <span x-show="sidebarOpen && activeMenu === 'help'" class="absolute left-0 top-1/2 -translate-y-1/2 w-1 h-6 bg-blue-400 rounded-full -ml-2"></span>
            </div>
            <span x-show="!sidebarOpen" class="absolute left-full ml-2 px-2 py-1 bg-blue-800 text-white text-xs rounded opacity-0 group-hover:opacity-100 whitespace-nowrap shadow-lg">Bantuan</span>
        </a>
    </nav>

    <!-- Collapsed bottom menu -->
    <div class="absolute bottom-0 left-0 right-0 p-2 border-t border-blue-700" x-show="!sidebarOpen">
        <div class="flex justify-around">
            <button class="p-2 rounded-full hover:bg-blue-700 relative group">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                <span class="absolute left-full ml-2 px-2 py-1 bg-blue-800 text-white text-xs rounded opacity-0 group-hover:opacity-100 whitespace-nowrap shadow-lg">Settings</span>
            </button>
            <button class="p-2 rounded-full hover:bg-blue-700 relative group">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                </svg>
                <span class="absolute left-full ml-2 px-2 py-1 bg-blue-800 text-white text-xs rounded opacity-0 group-hover:opacity-100 whitespace-nowrap shadow-lg">Notifications</span>
            </button>
            <button class="p-2 rounded-full hover:bg-blue-700 relative group">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
                <span class="absolute left-full ml-2 px-2 py-1 bg-blue-800 text-white text-xs rounded opacity-0 group-hover:opacity-100 whitespace-nowrap shadow-lg">Profile</span>
            </button>
        </div>
    </div>
</aside>