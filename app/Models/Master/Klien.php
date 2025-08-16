<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Model;

class Klien extends Model
{
    protected $table = 'klien';

    protected $fillable = [
        'nama',
        'jenis', // perorangan / badan_hukum
        'jenis_identitas_id',
        'nomor_identitas',
        'npwp',
        'alamat',
        'telepon',
        'email'
    ];

    public function jenisIdentitas()
    {
        return $this->belongsTo(JenisIdentitas::class, 'jenis_identitas_id');
    }

    public function pihakAkta()
    {
        return $this->hasMany(\App\Models\Akta\PihakAkta::class, 'klien_id');
    }

    public function tagihan()
    {
        return $this->hasMany(\App\Models\Keuangan\Tagihan::class, 'klien_id');
    }
}
