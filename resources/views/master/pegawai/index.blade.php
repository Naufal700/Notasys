@extends('layouts.app')

@section('page_title', 'Daftar Pegawai')

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
        <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-100">Daftar Pegawai</h2>
        <a href="{{ route('pegawai.create') }}" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-600 text-white rounded-lg shadow transition-all">Tambah Pegawai</a>
    </div>

    <!-- Table -->
    <div class="overflow-x-auto bg-white dark:bg-gray-800 rounded-lg shadow">
        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
            <thead class="bg-gray-50 dark:bg-gray-700">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">#</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Nama</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Email</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Telepon</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Jabatan</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Departemen</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Role</th>
                    <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                @foreach($pegawai as $item)
                <tr class="hover:bg-gray-100 dark:hover:bg-gray-700 transition-all">
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 dark:text-gray-200">{{ $loop->iteration + ($pegawai->currentPage()-1) * $pegawai->perPage() }}</td>
                    <td class="px-6 py-4 text-sm text-gray-700 dark:text-gray-200">{{ $item->nama }}</td>
                    <td class="px-6 py-4 text-sm text-gray-700 dark:text-gray-200">{{ $item->email }}</td>
                    <td class="px-6 py-4 text-sm text-gray-700 dark:text-gray-200">{{ $item->telepon ?? '-' }}</td>
                    <td class="px-6 py-4 text-sm text-gray-700 dark:text-gray-200">{{ $item->jabatan ?? '-' }}</td>
                    <td class="px-6 py-4 text-sm text-gray-700 dark:text-gray-200">{{ $item->departemen ?? '-' }}</td>
                    <td class="px-6 py-4 text-sm text-gray-700 dark:text-gray-200">{{ ucfirst($item->role) }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium flex justify-center gap-2">
                        <a href="{{ route('pegawai.edit', $item->id) }}" class="px-2 py-1 bg-blue-500 hover:bg-blue-600 text-white rounded-lg transition-all">Edit</a>
                        <form action="{{ route('pegawai.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus pegawai ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-2 py-1 bg-red-500 hover:bg-red-600 text-white rounded-lg transition-all">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-4">
        {{ $pegawai->links('vendor.pagination.tailwind') }}
    </div>

</div>
@endsection
