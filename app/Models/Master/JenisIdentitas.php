<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Model;

class JenisIdentitas extends Model
{
    protected $table = 'jenis_identitas';

    protected $fillable = [
        'nama_identitas'
    ];

    public function klien()
    {
        return $this->hasMany(Klien::class, 'jenis_identitas_id');
    }
}
