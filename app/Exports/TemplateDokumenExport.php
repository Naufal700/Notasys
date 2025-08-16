<?php

namespace App\Exports;

use App\Models\Master\TemplateDokumen;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TemplateDokumenExport implements FromCollection, WithHeadings
{
    /**
     * Ambil semua data untuk export
     */
    public function collection()
    {
        return TemplateDokumen::select('nama_template', 'jenis_akta', 'file_type', 'created_by', 'created_at')
            ->get();
    }

    /**
     * Header kolom Excel
     */
    public function headings(): array
    {
        return [
            'Nama Template',
            'Jenis Akta',
            'Tipe File',
            'Dibuat Oleh (ID)',
            'Tanggal Dibuat'
        ];
    }
}
