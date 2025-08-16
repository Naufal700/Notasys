@extends('layouts.app')

@section('page_title', 'Tambah Jenis Akta')

@section('content')
<div class="container mx-auto px-4 sm:px-6 lg:px-8">

    <div class="max-w-4xl mx-auto bg-white dark:bg-gray-800 shadow-xl rounded-2xl p-6 border border-gray-200 dark:border-gray-700">
        {{-- <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-100 mb-6">Tambah Jenis Akta</h2> --}}

        <form action="{{ route('master.jenis-akta.store') }}" method="POST" class="space-y-5">
            @csrf

            <!-- Nama Akta -->
            <div>
                <label class="block text-gray-700 dark:text-gray-200 font-medium mb-2">Nama Akta</label>
                <input type="text" name="nama_akta" value="{{ old('nama_akta') }}" required
                    class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-700 bg-gray-50 dark:bg-gray-900 text-gray-800 dark:text-gray-100 placeholder-gray-400 focus:ring-2 focus:ring-indigo-500 focus:outline-none transition-all"/>
            </div>

            <!-- Deskripsi -->
            <div>
                <label class="block text-gray-700 dark:text-gray-200 font-medium mb-2">Deskripsi</label>
                <textarea name="deskripsi" rows="3" class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-700 bg-gray-50 dark:bg-gray-900 text-gray-800 dark:text-gray-100 placeholder-gray-400 focus:ring-2 focus:ring-indigo-500 focus:outline-none transition-all">{{ old('deskripsi') }}</textarea>
            </div>

            <!-- Buttons -->
            <div class="flex gap-2 pt-3">
                <button type="submit" class="flex-1 bg-indigo-500 hover:bg-indigo-600 text-white font-semibold py-3 rounded-xl shadow-lg transform hover:-translate-y-1 transition-all">Simpan</button>
                <a href="{{ route('master.jenis-akta.index') }}" class="flex-1 bg-gray-500 hover:bg-gray-600 text-white font-semibold py-3 rounded-xl shadow-lg text-center">Batal / Kembali</a>
            </div>

        </form>
    </div>
</div>
@endsection
