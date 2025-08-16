<?php

namespace App\Imports;

use App\Models\Master\Klien;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class KlienImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Klien([
            'nama' => $row['nama'],
            'jenis' => $row['jenis'],
            'jenis_identitas_id' => $row['jenis_identitas_id'],
            'nomor_identitas' => $row['nomor_identitas'],
            'npwp' => $row['npwp'],
            'alamat' => $row['alamat'],
            'telepon' => $row['telepon'],
            'email' => $row['email'],
        ]);
    }
}
