@extends('layouts.app')

@section('page_title','Edit Bank')

@section('content')
<div class="max-w-4xl mx-auto bg-white dark:bg-gray-800 shadow-xl rounded-2xl p-6 border border-gray-200 dark:border-gray-700">
    {{-- <h2 class="text-xl font-bold mb-4">Edit Bank</h2> --}}

    <form action="{{ route('bank.update', $bank->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block text-sm font-medium">Nama Bank</label>
            <input type="text" name="nama_bank" value="{{ old('nama_bank', $bank->nama_bank) }}" required
                class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-700 bg-gray-50 dark:bg-gray-900 text-gray-800 dark:text-gray-100 placeholder-gray-400 focus:ring-2 focus:ring-indigo-500 focus:outline-none transition-all"/>
        </div>

        <div>
            <label class="block text-sm font-medium">Kode Bank</label>
            <input type="text" name="kode_bank" value="{{ old('kode_bank', $bank->kode_bank) }}"
                class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-700 bg-gray-50 dark:bg-gray-900 text-gray-800 dark:text-gray-100 placeholder-gray-400 focus:ring-2 focus:ring-indigo-500 focus:outline-none transition-all"/>
        </div>

        <div>
            <label class="block text-sm font-medium">Nomor Rekening</label>
            <input type="text" name="nomor_rekening" value="{{ old('nomor_rekening', $bank->nomor_rekening) }}"
                class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-700 bg-gray-50 dark:bg-gray-900 text-gray-800 dark:text-gray-100 placeholder-gray-400 focus:ring-2 focus:ring-indigo-500 focus:outline-none transition-all"/>
        </div>

        <div>
            <label class="block text-sm font-medium">Nama Pemilik</label>
            <input type="text" name="nama_pemilik" value="{{ old('nama_pemilik', $bank->nama_pemilik) }}"
                class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-700 bg-gray-50 dark:bg-gray-900 text-gray-800 dark:text-gray-100 placeholder-gray-400 focus:ring-2 focus:ring-indigo-500 focus:outline-none transition-all"/>
        </div>

        <div class="flex items-center space-x-2">
            <input type="checkbox" name="aktif" value="1" {{ $bank->aktif ? 'checked' : '' }}>
            <label class="text-sm font-medium">Aktif</label>
        </div>

        <div>
            <label class="block text-sm font-medium">Keterangan</label>
            <textarea name="keterangan" rows="3"
                class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-700 bg-gray-50 dark:bg-gray-900 text-gray-800 dark:text-gray-100 placeholder-gray-400 focus:ring-2 focus:ring-indigo-500 focus:outline-none transition-all"/>{{ old('keterangan', $bank->keterangan) }}</textarea>
        </div>

        <div class="flex justify-end space-x-2">
            <a href="{{ route('bank.index') }}" class="px-4 py-2 bg-gray-400 text-white rounded hover:bg-gray-500">Batal</a>
            <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">Update</button>
        </div>
    </form>
</div>
@endsection
