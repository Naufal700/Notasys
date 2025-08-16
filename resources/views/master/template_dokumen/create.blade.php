@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto bg-white dark:bg-gray-800 shadow-xl rounded-2xl p-6 border border-gray-200 dark:border-gray-700">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Tambah Template Dokumen</h1>

    @if($errors->any())
        <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
            <ul class="list-disc list-inside">
                @foreach($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('template_dokumen.store') }}" method="POST" enctype="multipart/form-data" 
          x-data="{ useUpload: false, fileName: '', checkedActive: true, selectedJenis: '' }">
        @csrf

        <!-- Nama Template -->
        <div class="mb-4">
            <label class="block font-medium text-gray-700 mb-1">Nama Template</label>
            <input type="text" name="nama_template" required
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
        </div>

        <!-- Deskripsi -->
        <div class="mb-4">
            <label class="block font-medium text-gray-700 mb-1">Deskripsi</label>
            <textarea name="deskripsi" rows="3"
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"></textarea>
        </div>

        <!-- Jenis Akta -->
        <div class="mb-4">
            <label class="block font-medium text-gray-700 mb-1">Jenis Akta</label>
            <select name="jenis_akta_id" x-model="selectedJenis"
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                <option value="">-- Pilih --</option>
                @foreach(\App\Models\Master\JenisAkta::all() as $akta)
                    <option value="{{ $akta->id }}">{{ $akta->nama_akta }}</option>
                @endforeach
            </select>
        </div>

        <!-- Toggle Upload -->
        <div class="mb-4">
            <label class="flex items-center cursor-pointer mb-2">
                <span class="mr-2 font-medium text-gray-700">Gunakan Upload File?</span>
                <input type="checkbox" x-model="useUpload" class="sr-only">
                <div class="w-11 h-6 bg-gray-300 rounded-full shadow-inner relative">
                    <div :class="useUpload ? 'translate-x-5 bg-indigo-500' : 'translate-x-0 bg-white'" 
                         class="absolute w-5 h-5 bg-white rounded-full shadow transform transition-transform duration-200"></div>
                </div>
            </label>

            <!-- Upload File -->
            <div x-show="useUpload" class="mt-2">
                <input type="file" name="file_path" accept=".doc,.docx,.pdf" 
                    class="w-full text-gray-700 file:border-0 file:bg-indigo-500 file:text-white file:rounded file:px-4 file:py-2 hover:file:bg-indigo-600"
                    @change="fileName = $event.target.files[0]?.name">
                <p x-text="fileName" class="text-sm text-gray-500 mt-1" x-show="fileName"></p>
            </div>

            <!-- Default Template -->
            <div x-show="!useUpload" class="mt-2 text-gray-600">
                <p x-text="selectedJenis ? 'Menggunakan template default untuk: ' + selectedJenis : 'Menggunakan template default sistem.'"></p>
            </div>
        </div>

        <!-- Status Aktif -->
        <div class="mb-6 flex items-center">
            <label class="flex items-center cursor-pointer">
                <span class="mr-3 text-gray-700 font-medium">Aktif</span>
                <div class="relative">
                    <input type="checkbox" x-model="checkedActive" class="sr-only">
                    <div class="w-11 h-6 bg-gray-300 rounded-full shadow-inner"></div>
                    <div :class="checkedActive ? 'translate-x-5 bg-green-500' : 'translate-x-0 bg-white'" 
                         class="absolute w-5 h-5 bg-white rounded-full shadow transform transition-transform duration-200"></div>
                </div>
            </label>
            <!-- Hidden input untuk memastikan selalu terkirim -->
            <input type="hidden" name="is_active" :value="checkedActive ? 1 : 0">
        </div>

        <!-- Buttons -->
        <div class="flex space-x-3">
            <button type="submit"
                class="px-6 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition">Simpan</button>
            <a href="{{ route('template_dokumen.index') }}"
                class="px-6 py-2 bg-gray-300 text-gray-800 rounded-lg hover:bg-gray-400 transition">Batal</a>
        </div>
    </form>
</div>
@endsection
