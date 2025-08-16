<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Model;

class StatusAkta extends Model
{
    protected $table = 'status_akta';

    protected $fillable = [
        'nama_status'
    ];

    public function akta()
    {
        return $this->hasMany(\App\Models\Akta\Akta::class, 'status_akta_id');
    }
}
