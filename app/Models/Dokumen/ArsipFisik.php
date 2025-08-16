<?php

namespace App\Models\Dokumen;

use Illuminate\Database\Eloquent\Model;

class ArsipFisik extends Model
{
    protected $table = 'arsip_fisik';

    protected $fillable = [
        'akta_id',
        'nomor_arsip',
        'lokasi_fisik',
        'tanggal_masuk',
        'keterangan',
    ];

    protected $casts = [
        'tanggal_masuk' => 'date',
    ];

    public function akta()
    {
        return $this->belongsTo(\App\Models\Akta\Akta::class, 'akta_id');
    }
}
