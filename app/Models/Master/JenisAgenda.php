<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Model;

class JenisAgenda extends Model
{
    protected $table = 'jenis_agenda';

    protected $fillable = [
        'nama_agenda'
    ];

    public function agenda()
    {
        return $this->hasMany(\App\Models\Agenda\Agenda::class, 'jenis_agenda_id');
    }
}
