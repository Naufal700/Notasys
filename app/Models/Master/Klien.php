<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Model;
use App\Traits\LogsActivityOnModel;

class Klien extends Model
{
    use LogsActivityOnModel;

    protected $table = 'klien';

    protected $fillable = [
        'nama',
        'jenis',
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
