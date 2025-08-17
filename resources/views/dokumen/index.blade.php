@extends('layouts.app')

@section('page_title', 'Daftar Dokumen')

@section('content')
<div class="p-6">
    <a href="{{ route('dokumen.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 mb-4 inline-block">Buat Dokumen Baru</a>

    <table class="w-full table-auto border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-200">
                <th class="border px-4 py-2">ID</th>
                <th class="border px-4 py-2">Template</th>
                <th class="border px-4 py-2">Dibuat Oleh</th>
                <th class="border px-4 py-2">Tanggal</th>
                <th class="border px-4 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($dokumen as $doc)
            <tr>
                <td class="border px-4 py-2">{{ $doc->id }}</td>
                <td class="border px-4 py-2">{{ $doc->template->nama_template }}</td>
                <td class="border px-4 py-2">{{ $doc->user->name }}</td>
                <td class="border px-4 py-2">{{ $doc->created_at->format('d-m-Y') }}</td>
                <td class="border px-4 py-2 space-x-2">
                    <a href="{{ route('dokumen.edit', $doc->id) }}" class="bg-yellow-500 text-white px-2 py-1 rounded hover:bg-yellow-600">Edit</a>
                    <a href="{{ route('dokumen.pdf', $doc->id) }}" target="_blank" class="bg-green-500 text-white px-2 py-1 rounded hover:bg-green-600">PDF</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-4">{{ $dokumen->links() }}</div>
</div>
@endsection
