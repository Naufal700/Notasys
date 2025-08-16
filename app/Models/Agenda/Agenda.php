<?php

namespace App\Models\Agenda;

use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    protected $table = 'agenda';

    protected $fillable = [
        'judul',
        'deskripsi',
        'tanggal_mulai',
        'tanggal_selesai',
        'jenis_agenda_id',
        'akta_id',
        'klien_id',
        'status', // terjadwal | selesai | dibatalkan
    ];

    protected $casts = [
        'tanggal_mulai'   => 'datetime',
        'tanggal_selesai' => 'datetime',
    ];

    // Relasi ke Master
    public function jenisAgenda()
    {
        return $this->belongsTo(\App\Models\Master\JenisAgenda::class, 'jenis_agenda_id');
    }

    // Relasi ke Akta
    public function akta()
    {
        return $this->belongsTo(\App\Models\Akta\Akta::class, 'akta_id');
    }

    // Relasi ke Klien
    public function klien()
    {
        return $this->belongsTo(\App\Models\Master\Klien::class, 'klien_id');
    }

    // Relasi ke Pengingat
    public function pengingat()
    {
        return $this->hasMany(PengingatAgenda::class, 'agenda_id');
    }
}
