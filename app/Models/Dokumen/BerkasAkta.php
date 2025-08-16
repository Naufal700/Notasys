<?php

namespace App\Models\Dokumen;

use Illuminate\Database\Eloquent\Model;

class BerkasAkta extends Model
{
    protected $table = 'berkas_akta';

    protected $fillable = [
        'akta_id',
        'nama_berkas',
        'path_berkas',
        'jenis_file',
        'keterangan',
    ];

    public function akta()
    {
        return $this->belongsTo(\App\Models\Akta\Akta::class, 'akta_id');
    }
}
