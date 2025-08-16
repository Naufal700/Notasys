<?php

namespace App\Models\Akta;

use Illuminate\Database\Eloquent\Model;

class RiwayatStatusAkta extends Model
{
    protected $table = 'riwayat_status_akta';

    protected $fillable = [
        'akta_id',
        'status_akta_id',
        'waktu_set',
        'keterangan',
    ];

    protected $casts = [
        'waktu_set' => 'datetime',
    ];

    public function akta()
    {
        return $this->belongsTo(Akta::class, 'akta_id');
    }

    public function status()
    {
        return $this->belongsTo(\App\Models\Master\StatusAkta::class, 'status_akta_id');
    }
}
