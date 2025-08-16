<?php

namespace App\Models\Akta;

use Illuminate\Database\Eloquent\Model;

class SaksiAkta extends Model
{
    protected $table = 'saksi_akta';

    protected $fillable = [
        'akta_id',
        'nama_saksi',
        'nomor_identitas',
    ];

    public function akta()
    {
        return $this->belongsTo(Akta::class, 'akta_id');
    }
}
