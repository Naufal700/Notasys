@extends('layouts.app')

@section('page_title', 'Edit Dokumen')

@section('content')
<div class="p-6 max-w-5xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-6" 
     x-data="{ data: @json($dokumen->data ?? []) }">

    <div>
        <h1 class="text-2xl font-bold mb-6">Edit Dokumen</h1>

        <form action="{{ route('dokumen.update', $dokumen->id) }}" method="POST">
            @csrf
            @method('PUT')

            <input type="hidden" name="template_id" value="{{ $template->id ?? '' }}">

            @if($template)
                <h2 class="text-xl font-semibold mb-4">{{ $template->nama_template }}</h2>

                @php $fields = json_decode($template->fields ?? '[]', true); @endphp

                @foreach($fields as $field)
                    <div class="mb-4">
                        <label class="block mb-1 font-medium">{{ $field['label'] }}</label>

                        @if($field['type'] === 'text' || $field['type'] === 'number')
                            <input type="{{ $field['type'] }}" 
                                   name="data[{{ $field['name'] }}]" 
                                   x-model="data['{{ $field['name'] }}']" 
                                   class="w-full border px-3 py-2 rounded" 
                                   value="{{ $dokumen->data[$field['name']] ?? '' }}"
                                   @if(!empty($field['required'])) required @endif>
                        @elseif($field['type'] === 'textarea')
                            <textarea name="data[{{ $field['name'] }}]" 
                                      x-model="data['{{ $field['name'] }}']" 
                                      class="w-full border px-3 py-2 rounded" 
                                      @if(!empty($field['required'])) required @endif>{{ $dokumen->data[$field['name']] ?? '' }}</textarea>
                        @endif
                    </div>
                @endforeach

                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Update Dokumen</button>
            @else
                <p class="text-gray-500">Template dokumen tidak ditemukan.</p>
            @endif
        </form>
    </div>

    <!-- Live Preview -->
    <div class="bg-white dark:bg-gray-800 p-6 rounded shadow overflow-auto">
        <h2 class="text-xl font-semibold mb-4">Preview Dokumen</h2>

        @if($template)
            <div class="space-y-3">
                @foreach($fields as $field)
                    <div>
                        <span class="font-medium">{{ $field['label'] }}:</span>
                        <p x-text="data['{{ $field['name'] }}'] || '...' " class="ml-2 text-gray-700 dark:text-gray-200"></p>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-gray-500">Preview dokumen tidak tersedia.</p>
        @endif
    </div>
</div>
@endsection
