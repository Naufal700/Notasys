<?php

namespace App\Models\Akta;

use Illuminate\Database\Eloquent\Model;

class PihakAkta extends Model
{
    protected $table = 'pihak_akta';

    protected $fillable = [
        'akta_id',
        'klien_id',
        'peran',       // pihak_1 | pihak_2 | pihak_lain | saksi | kuasa
        'keterangan',
    ];

    public function akta()
    {
        return $this->belongsTo(Akta::class, 'akta_id');
    }

    public function klien()
    {
        return $this->belongsTo(\App\Models\Master\Klien::class, 'klien_id');
    }
}
