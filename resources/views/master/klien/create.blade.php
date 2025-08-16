@extends('layouts.app')

@section('page_title', isset($klien) ? 'Edit Klien' : 'Tambah Klien')

@section('content')
<div class="container mx-auto px-4 sm:px-6 lg:px-8">

   <div class="max-w-4xl mx-auto bg-white dark:bg-gray-800 shadow-xl rounded-2xl p-6 border border-gray-200 dark:border-gray-700">
    
    {{-- Header dengan garis bawah --}}
    <div class="mb-6 pb-2 border-b border-gray-300 dark:border-gray-600">
        {{-- <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-100">
            {{ isset($klien) ? 'Edit Klien' : 'Tambah Klien' }}
        </h2> --}}
    {{-- </div> --}}

        <form action="{{ isset($klien) ? route('master.klien.update', $klien->id) : route('master.klien.store') }}" method="POST" class="space-y-5">
            @csrf
            @if(isset($klien))
                @method('PUT')
            @endif

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                <!-- Nama -->
                <div>
                    <label class="block text-gray-700 dark:text-gray-200 font-medium mb-2">Nama</label>
                    <input type="text" name="nama" value="{{ old('nama', $klien->nama ?? '') }}" required
                        class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-700 bg-gray-50 dark:bg-gray-900 text-gray-800 dark:text-gray-100 placeholder-gray-400 focus:ring-2 focus:ring-indigo-500 focus:outline-none transition-all"/>
                </div>

                <!-- Jenis -->
                <div>
                    <label class="block text-gray-700 dark:text-gray-200 font-medium mb-2">Jenis</label>
                    <select name="jenis" required
                        class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-700 bg-gray-50 dark:bg-gray-900 text-gray-800 dark:text-gray-100 focus:ring-2 focus:ring-indigo-500 focus:outline-none transition-all">
                        <option value="">Pilih Jenis</option>
                        <option value="perorangan" {{ (old('jenis', $klien->jenis ?? '') == 'perorangan') ? 'selected' : '' }}>Perorangan</option>
                        <option value="badan_hukum" {{ (old('jenis', $klien->jenis ?? '') == 'badan_hukum') ? 'selected' : '' }}>Badan Hukum</option>
                    </select>
                </div>

                <!-- Jenis Identitas -->
                <div>
                    <label class="block text-gray-700 dark:text-gray-200 font-medium mb-2">Jenis Identitas</label>
                    <select name="jenis_identitas_id" required
                        class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-700 bg-gray-50 dark:bg-gray-900 text-gray-800 dark:text-gray-100 focus:ring-2 focus:ring-indigo-500 focus:outline-none transition-all">
                        <option value="">Pilih Jenis Identitas</option>
                        @foreach($jenisIdentitas as $jenis)
                            <option value="{{ $jenis->id }}" {{ (old('jenis_identitas_id', $klien->jenis_identitas_id ?? '') == $jenis->id) ? 'selected' : '' }}>
                                {{ $jenis->nama_identitas }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Nomor Identitas -->
                <div>
                    <label class="block text-gray-700 dark:text-gray-200 font-medium mb-2">Nomor Identitas</label>
                    <input type="text" name="nomor_identitas" value="{{ old('nomor_identitas', $klien->nomor_identitas ?? '') }}"
                        class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-700 bg-gray-50 dark:bg-gray-900 text-gray-800 dark:text-gray-100 placeholder-gray-400 focus:ring-2 focus:ring-indigo-500 focus:outline-none transition-all"/>
                </div>

                <!-- NPWP -->
                <div>
                    <label class="block text-gray-700 dark:text-gray-200 font-medium mb-2">NPWP</label>
                    <input type="text" name="npwp" value="{{ old('npwp', $klien->npwp ?? '') }}"
                        class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-700 bg-gray-50 dark:bg-gray-900 text-gray-800 dark:text-gray-100 placeholder-gray-400 focus:ring-2 focus:ring-indigo-500 focus:outline-none transition-all"/>
                </div>

                <!-- Email -->
                <div>
                    <label class="block text-gray-700 dark:text-gray-200 font-medium mb-2">Email</label>
                    <input type="email" name="email" value="{{ old('email', $klien->email ?? '') }}" required
                        class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-700 bg-gray-50 dark:bg-gray-900 text-gray-800 dark:text-gray-100 placeholder-gray-400 focus:ring-2 focus:ring-indigo-500 focus:outline-none transition-all"/>
                </div>

                <!-- Telepon -->
                <div>
                    <label class="block text-gray-700 dark:text-gray-200 font-medium mb-2">Telepon</label>
                    <input type="text" name="telepon" value="{{ old('telepon', $klien->telepon ?? '') }}"
                        class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-700 bg-gray-50 dark:bg-gray-900 text-gray-800 dark:text-gray-100 placeholder-gray-400 focus:ring-2 focus:ring-indigo-500 focus:outline-none transition-all"/>
                </div>

                <!-- Alamat -->
                <div class="md:col-span-2">
                    <label class="block text-gray-700 dark:text-gray-200 font-medium mb-2">Alamat</label>
                    <textarea name="alamat" rows="3"
                        class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-700 bg-gray-50 dark:bg-gray-900 text-gray-800 dark:text-gray-100 placeholder-gray-400 focus:ring-2 focus:ring-indigo-500 focus:outline-none transition-all">{{ old('alamat', $klien->alamat ?? '') }}</textarea>
                </div>

            </div>

            <!-- Submit & Cancel Buttons -->
            <div class="pt-3 flex flex-wrap gap-4">
                <button type="submit" 
                    class="flex-1 bg-indigo-500 hover:bg-indigo-600 text-white font-semibold py-3 rounded-xl shadow-lg transform hover:-translate-y-1 transition-all text-center">
                    {{ isset($klien) ? 'Update Klien' : 'Simpan Klien' }}
                </button>
                <a href="{{ route('master.klien.index') }}"
                    class="flex-1 bg-gray-400 hover:bg-gray-500 text-white font-semibold py-3 rounded-xl shadow-lg text-center transition-all">
                    Batal / Kembali
                </a>
            </div>

        </form>
    </div>
</div>
@endsection
