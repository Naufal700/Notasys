@extends('layouts.app')

@section('page_title', 'Master Jenis Akta')

@section('content')
<div class="container mx-auto px-4 sm:px-6 lg:px-8">

    <!-- Notifikasi -->
    @if(session('success'))
    <div class="mb-4 p-4 bg-green-100 text-green-800 rounded-lg">
        {{ session('success') }}
    </div>
    @endif

    <!-- Header Action Buttons -->
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 space-y-2 sm:space-y-0">
        {{-- <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-100">Daftar Jenis Akta</h2> --}}
        <a href="{{ route('master.jenis-akta.create') }}" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-600 text-white rounded-lg shadow">Tambah Jenis Akta</a>
    </div>

    <!-- Table -->
    <div class="overflow-x-auto bg-white dark:bg-gray-800 rounded-xl shadow-lg border border-gray-200 dark:border-gray-700">
    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700 table-auto">
        <thead class="bg-gray-50 dark:bg-gray-700">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">#</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Nama Akta</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Deskripsi</th>
                    <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                @foreach($jenisAkta as $item)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 dark:text-gray-200">{{ $loop->iteration }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 dark:text-gray-200">{{ $item->nama_akta }}</td>
                    <td class="px-6 py-4 text-sm text-gray-700 dark:text-gray-200 break-words whitespace-normal">{{ $item->deskripsi ?? '-' }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium space-x-2">
                        <a href="{{ route('master.jenis-akta.edit', $item->id) }}" class="px-2 py-1 bg-blue-500 hover:bg-blue-600 text-white rounded-lg">Edit</a>
                        <form action="{{ route('master.jenis-akta.destroy', $item->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-2 py-1 bg-red-500 hover:bg-red-600 text-white rounded-lg">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
<!-- Pagination -->
<div class="mt-4">
    {{ $jenisAkta->links('pagination::tailwind') }}
</div>
</div>
@endsection
