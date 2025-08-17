@extends('layouts.app')

@section('page_title', 'Tambah Template Dokumen')

@section('content')
<div class="max-w-3xl mx-auto p-6 bg-white rounded shadow">

    <h1 class="text-xl font-bold mb-4">Tambah Template Dokumen</h1>

    @if($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <ul>
                @foreach($errors->all() as $error)
                    <li>- {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('template.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label class="block mb-1 font-semibold">Nama Template</label>
            <input type="text" name="nama_template" class="w-full border rounded px-3 py-2" value="{{ old('nama_template') }}" required>
        </div>

        <div class="mb-4">
            <label class="block mb-1 font-semibold">Deskripsi</label>
            <textarea name="deskripsi" class="w-full border rounded px-3 py-2">{{ old('deskripsi') }}</textarea>
        </div>

        <div class="mb-4">
            <label class="block mb-1 font-semibold">Pilih Template Blade</label>
            <select name="file_path" class="w-full border rounded px-3 py-2" required>
                <option value="">-- Pilih Template --</option>
                @foreach($templates_blade as $tpl)
                    @php
                        // Hilangkan ekstensi .blade.php dari value untuk simpan di DB
                        $value = preg_replace('/\.blade(\.php)?$/', '', $tpl);
                    @endphp
                    <option value="{{ $value }}" {{ old('file_path') == $value ? 'selected' : '' }}>
                        {{ $tpl }} {{-- Tampilkan full nama file untuk user --}}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label class="block mb-1 font-semibold">Jenis Template (Jenis Akta)</label>
            <select name="jenis_akta_id" class="w-full border rounded px-3 py-2" required>
                <option value="">-- Pilih Jenis Akta --</option>
                @foreach($jenis_akta as $ja)
                    <option value="{{ $ja->id }}" {{ old('jenis_akta_id') == $ja->id ? 'selected' : '' }}>
                        {{ $ja->nama_akta }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label class="inline-flex items-center">
                <input type="checkbox" name="is_active" class="form-checkbox" checked>
                <span class="ml-2">Aktif</span>
            </label>
        </div>

        <div class="flex justify-end space-x-2">
            <a href="{{ route('template.index') }}" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Batal</a>
            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Simpan</button>
        </div>
    </form>

</div>
@endsection
