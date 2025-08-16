<?php

namespace App\Models\Agenda;

use Illuminate\Database\Eloquent\Model;

class PengingatAgenda extends Model
{
    protected $table = 'pengingat_agenda';

    protected $fillable = [
        'agenda_id',
        'waktu_pengingat',
        'status', // terkirim | pending
    ];

    protected $casts = [
        'waktu_pengingat' => 'datetime',
    ];

    public function agenda()
    {
        return $this->belongsTo(Agenda::class, 'agenda_id');
    }
}
