<?php

namespace App\Exports;

use App\Models\Master\Klien;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class KlienExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Klien::select('nama', 'jenis', 'jenis_identitas_id', 'nomor_identitas', 'npwp', 'alamat', 'telepon', 'email')->get();
    }

    public function headings(): array
    {
        return ['Nama', 'Jenis', 'Jenis Identitas ID', 'Nomor Identitas', 'NPWP', 'Alamat', 'Telepon', 'Email'];
    }
}
