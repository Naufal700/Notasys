@extends('layouts.app')

@section('page_title', 'Master Bank')

@section('content')
<div class="container mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex justify-between items-center mb-6">
        {{-- <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-100">Master Bank</h2> --}}
        <a href="{{ route('bank.create') }}" 
           class="bg-indigo-500 hover:bg-indigo-600 text-white px-4 py-2 rounded-xl shadow-lg">
           Tambah Bank
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-3 rounded mb-4">{{ session('success') }}</div>
    @endif

    <div class="overflow-x-auto bg-white dark:bg-gray-800 rounded-xl shadow-lg border border-gray-200 dark:border-gray-700">
    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700 table-auto">
        <thead class="bg-gray-50 dark:bg-gray-700">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 dark:text-gray-200">#</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 dark:text-gray-200">Nama Bank</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 dark:text-gray-200">Kode Bank</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 dark:text-gray-200">Nomor Rekening</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 dark:text-gray-200">Nama Pemilik</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 dark:text-gray-200">Status</th>
                    <th class="px-6 py-3 text-center text-sm font-medium text-gray-500 dark:text-gray-200">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                @foreach($banks as $bank)
                <tr>
                    <td class="px-6 py-4">{{ $loop->iteration }}</td>
                    <td class="px-6 py-4">{{ $bank->nama_bank }}</td>
                    <td class="px-6 py-4">{{ $bank->kode_bank ?? '-' }}</td>
                    <td class="px-6 py-4">{{ $bank->nomor_rekening ?? '-' }}</td>
                    <td class="px-6 py-4">{{ $bank->nama_pemilik ?? '-' }}</td>
                    <td class="px-6 py-4">
                        <span class="{{ $bank->aktif ? 'text-green-600' : 'text-red-600' }}">
                            {{ $bank->aktif ? 'Aktif' : 'Nonaktif' }}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-center flex justify-center items-center space-x-3">
                        <!-- Edit -->
                        <a href="{{ route('bank.edit', $bank->id) }}" 
                           class="text-yellow-500 hover:text-yellow-600" title="Edit">
                           <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                               <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536M16 3a2.828 2.828 0 014 4L7 20H3v-4L16 3z" />
                           </svg>
                        </a>

                        <!-- Hapus -->
                        <form action="{{ route('bank.destroy', $bank->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-600" onclick="return confirm('Yakin ingin hapus?')" title="Hapus">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M1 7h22M10 3h4a1 1 0 011 1v1H9V4a1 1 0 011-1z" />
                                </svg>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
