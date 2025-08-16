@extends('layouts.app')

@section('page_title', 'Master Klien')

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
        <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-100">Daftar Klien</h2>
        <div class="flex flex-wrap gap-2">
            <a href="{{ route('master.klien.create') }}" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-600 text-white rounded-lg shadow transition-all">Tambah Klien</a>
            <a href="{{ route('master.klien.template') }}" class="px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-800 rounded-lg shadow transition-all">Download Template</a>
            <form action="{{ route('master.klien.import') }}" method="POST" enctype="multipart/form-data" class="inline-flex items-center">
                @csrf
                <input type="file" name="file" accept=".xlsx,.xls" required class="hidden" id="importFile">
                <label for="importFile" class="px-4 py-2 bg-yellow-500 hover:bg-yellow-600 text-white rounded-lg shadow cursor-pointer transition-all">Import Excel</label>
                <button type="submit" class="hidden" id="submitImport"></button>
            </form>
            <a href="{{ route('master.klien.export') }}" class="px-4 py-2 bg-green-500 hover:bg-green-600 text-white rounded-lg shadow transition-all">Export Excel</a>
        </div>
    </div>

    <!-- Table -->
    <div class="overflow-x-auto bg-white dark:bg-gray-800 rounded-lg shadow">
        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
            <thead class="bg-gray-50 dark:bg-gray-700">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">#</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Nama</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Jenis Klien</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Jenis Identitas</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">No. Identitas</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">NPWP</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Email</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Telepon</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Alamat</th>
                    <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                @foreach($klien as $item)
                <tr class="hover:bg-gray-100 dark:hover:bg-gray-700 transition-all">
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 dark:text-gray-200">{{ $loop->iteration + ($klien->currentPage()-1) * $klien->perPage() }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 dark:text-gray-200">{{ $item->nama }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 dark:text-gray-200">{{ ucfirst($item->jenis) }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 dark:text-gray-200">{{ $item->jenisIdentitas->nama_identitas ?? '-' }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 dark:text-gray-200">{{ $item->nomor_identitas }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 dark:text-gray-200">{{ $item->npwp }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 dark:text-gray-200">{{ $item->email }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 dark:text-gray-200">{{ $item->telepon }}</td>
                    <td class="px-6 py-4 text-sm text-gray-700 dark:text-gray-200 break-words whitespace-normal">{{ $item->alamat }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium flex justify-center gap-2">
                        <a href="{{ route('master.klien.edit', $item->id) }}" class="px-2 py-1 bg-blue-500 hover:bg-blue-600 text-white rounded-lg transition-all">Edit</a>
                        <form action="{{ route('master.klien.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus klien ini?')">
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
        {{ $klien->links('vendor.pagination.tailwind') }}
    </div>

</div>

<script>
    // Trigger file input submit otomatis
    const importFile = document.getElementById('importFile');
    importFile.addEventListener('change', () => {
        importFile.closest('form').submit();
    });
</script>
@endsection
