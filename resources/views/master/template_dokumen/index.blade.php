@extends('layouts.app')

@section('page_title', 'Template Dokumen')

@section('content')
<div class="container mx-auto px-4 sm:px-6 lg:px-8">

    <!-- Notifikasi -->
    @if(session('success'))
    <div class="mb-4 p-4 bg-green-100 text-green-800 rounded-lg shadow">
        {{ session('success') }}
    </div>
    @endif

    <!-- Header Action Buttons -->
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 space-y-2 sm:space-y-0">
        <h2 class="text-2xl font-semibold text-gray-800">Daftar Template Dokumen</h2>
        <a href="{{ route('template.create') }}" class="flex items-center px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-lg shadow transition-all">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            Tambah Template
        </a>
    </div>

    <!-- Filter Jenis Template -->
    <div class="mb-4">
        <form action="{{ route('template.index') }}" method="GET" class="flex space-x-2">
            <select name="template_type" class="border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                <option value="">Semua Jenis</option>
                @foreach($jenis_akta as $ja)
                    <option value="{{ $ja->id }}" {{ request('template_type') == $ja->id ? 'selected' : '' }}>
                        {{ $ja->nama_akta }}
                    </option>
                @endforeach
            </select>
            <button type="submit" class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-lg shadow transition-all">Filter</button>
        </form>
    </div>

    <!-- Table Template -->
    <div class="overflow-x-auto bg-white rounded-xl shadow-lg border border-gray-200">
        <table class="min-w-full divide-y divide-gray-200 table-auto">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">#</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Template</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Deskripsi</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jenis</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($templates as $key => $template)
                <tr class="hover:bg-gray-100 transition-all">
                    <td class="px-6 py-4 text-sm text-gray-700">{{ $key + 1 }}</td>
                    <td class="px-6 py-4 text-sm text-gray-800">{{ $template->nama_template }}</td>
                    <td class="px-6 py-4 text-sm text-gray-700">{{ $template->deskripsi }}</td>
                    <td class="px-6 py-4 text-sm text-gray-800">{{ strtoupper($template->jenisAkta->nama_akta ?? '-') }}</td>
                    <td class="px-6 py-4 text-sm text-gray-700">{{ $template->is_active ? 'Aktif' : 'Nonaktif' }}</td>
                    <td class="px-6 py-4 text-center flex justify-center gap-2">
                        <a href="{{ route('template.load', $template->id) }}" class="px-2 py-1 bg-blue-500 hover:bg-blue-600 text-white rounded-lg transition-all" title="Preview">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </a>
                        <a href="{{ route('template.edit', $template->id) }}" class="px-2 py-1 bg-yellow-500 hover:bg-yellow-600 text-white rounded-lg transition-all" title="Edit">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5h6m0 0v6m0-6L5 17l-2 2 2-2 12-12z"/>
                            </svg>
                        </a>
                        <form action="{{ route('template.destroy', $template->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus template ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-2 py-1 bg-red-500 hover:bg-red-600 text-white rounded-lg transition-all" title="Hapus">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-6 py-6 text-center text-gray-500">Belum ada template</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-4">
        {{ $templates->links('vendor.pagination.tailwind') }}
    </div>

</div>
@endsection
