<?php

namespace App\Models\Akta;

use Illuminate\Database\Eloquent\Model;

class PenandatanganAkta extends Model
{
    protected $table = 'penandatangan_akta';

    protected $fillable = [
        'akta_id',
        'nama_penandatangan',
        'tipe_penandatangan', // notaris | klien | saksi | lainnya
        'waktu_ttd',
    ];

    protected $casts = [
        'waktu_ttd' => 'datetime',
    ];

    public function akta()
    {
        return $this->belongsTo(Akta::class, 'akta_id');
    }
}
