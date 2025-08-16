<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Model;

class JenisAkta extends Model
{
    protected $table = 'jenis_akta';

    protected $fillable = [
        'nama_akta',
        'deskripsi'
    ];

    public function akta()
    {
        return $this->hasMany(\App\Models\Akta\Akta::class, 'jenis_akta_id');
    }
}
