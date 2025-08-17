@extends('layouts.app')
@section('page_title', $dokumen->id ?? '' ? 'Edit Dokumen' : 'Buat Dokumen Baru')

@section('content')
<div class="p-6 max-w-7xl mx-auto" 
     x-data="documentBuilder(@json($templates), @json($dokumen ?? null))">

    <h1 class="text-3xl font-bold mb-6">{{ $dokumen->id ?? '' ? 'Edit Dokumen' : 'Buat Dokumen Baru' }}</h1>

    <!-- Pilih Template -->
    <div class="mb-6">
        <label class="block mb-2 font-medium">Pilih Template:</label>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <template x-for="template in templates" :key="template.id">
                <div @click="selectTemplate(template)"
                     :class="selectedTemplate?.id === template.id ? 'border-blue-500 ring ring-blue-300' : 'border-gray-200'"
                     class="cursor-pointer border rounded-lg p-4 hover:shadow-lg transition relative">
                    <h2 class="text-xl font-semibold" x-text="template.nama_template"></h2>
                    <p class="text-gray-500 mt-2" x-text="template.deskripsi || '-'"></p>
                    <span class="absolute top-3 right-3 px-2 py-0.5 bg-blue-500 text-white text-xs rounded">Pilih</span>
                </div>
            </template>
        </div>
    </div>

    <!-- Form + Preview -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6" x-show="selectedTemplate">
        <!-- Form -->
        <form :action="formAction" method="POST" class="space-y-4 bg-white p-6 rounded shadow">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="template_id" :value="selectedTemplate.id">
            <template x-for="field in currentFields" :key="field.name">
                <div>
                    <label class="block mb-1 font-medium" x-text="field.label"></label>
                    <template x-if="field.type === 'textarea'">
                        <textarea :name="'data['+field.name+']'" x-model="data[field.name]" class="w-full border px-3 py-2 rounded"></textarea>
                    </template>
                    <template x-if="field.type !== 'textarea'">
                        <input :type="field.type" :name="'data['+field.name+']'" x-model="data[field.name]" class="w-full border px-3 py-2 rounded">
                    </template>
                </div>
            </template>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 mt-4">Simpan Dokumen</button>
        </form>

        <!-- Preview -->
        <div class="bg-gray-50 p-6 rounded shadow overflow-auto" style="max-height: 800px;">
            <h2 class="text-xl font-semibold mb-4">Preview</h2>
            <template x-for="field in currentFields" :key="field.name">
                <div class="mb-2">
                    <span class="font-medium" x-text="field.label+':'"></span>
                    <span class="ml-2 text-gray-700" x-text="data[field.name] || '...'"></span>
                </div>
            </template>
        </div>
    </div>
</div>

<script>
function documentBuilder(templatesData, dokumenData) {
    return {
        templates: templatesData,
        selectedTemplate: dokumenData ? dokumenData.template : null,
        data: dokumenData ? dokumenData.data : {},
        get formAction() {
            return this.selectedTemplate
                ? (dokumenData ? `/dokumen/${dokumenData.id}/update` : '/dokumen/store')
                : '#';
        },
        get currentFields() {
            if(!this.selectedTemplate) return [];
            // field default akta jika tidak ada fields di template
            return this.selectedTemplate.fields || (this.selectedTemplate.nama_template.toLowerCase().includes('akta') ? [
                {name:'nomor_akta', label:'Nomor Akta', type:'text'},
                {name:'tanggal', label:'Tanggal', type:'text'},
                {name:'penjual_nama', label:'Nama Penjual', type:'text'},
                {name:'penjual_alamat', label:'Alamat Penjual', type:'textarea'},
                {name:'pembeli_nama', label:'Nama Pembeli', type:'text'},
                {name:'pembeli_alamat', label:'Alamat Pembeli', type:'textarea'},
                {name:'objek_alamat', label:'Alamat Objek', type:'textarea'},
                {name:'objek_sertifikat', label:'Sertifikat / Nomor', type:'text'},
                {name:'saksi1_nama', label:'Saksi 1', type:'text'},
                {name:'saksi2_nama', label:'Saksi 2', type:'text'},
                {name:'catatan', label:'Catatan', type:'textarea'}
            ] : []);
        },
        selectTemplate(template) {
            this.selectedTemplate = template;
            // init data kosong untuk setiap field
            this.data = {};
            this.currentFields.forEach(f => { if(!this.data[f.name]) this.data[f.name] = ''; });
        }
    }
}
</script>
@endsection
