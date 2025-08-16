<?php

namespace App\Models\Akta;

use Illuminate\Database\Eloquent\Model;

class Akta extends Model
{
    protected $table = 'akta';

    protected $fillable = [
        'nomor_akta',
        'jenis_akta_id',
        'tanggal',
        'objek',
        'biaya',
        'status_akta_id',
        'catatan',
    ];

    protected $casts = [
        'tanggal' => 'date',
        'biaya'   => 'decimal:2',
    ];

    // Relasi Master
    public function jenisAkta()
    {
        return $this->belongsTo(\App\Models\Master\JenisAkta::class, 'jenis_akta_id');
    }

    public function status()
    {
        return $this->belongsTo(\App\Models\Master\StatusAkta::class, 'status_akta_id');
    }

    // Relasi Akta
    public function pihak()
    {
        return $this->hasMany(PihakAkta::class, 'akta_id');
    }

    public function saksi()
    {
        return $this->hasMany(SaksiAkta::class, 'akta_id');
    }

    public function penandatangan()
    {
        return $this->hasMany(PenandatanganAkta::class, 'akta_id');
    }

    public function riwayatStatus()
    {
        return $this->hasMany(RiwayatStatusAkta::class, 'akta_id')->latest('waktu_set');
    }

    // Dokumen & Arsip
    public function berkas()
    {
        return $this->hasMany(\App\Models\Dokumen\BerkasAkta::class, 'akta_id');
    }

    public function arsipFisik()
    {
        return $this->hasOne(\App\Models\Dokumen\ArsipFisik::class, 'akta_id');
    }

    // Agenda & Keuangan
    public function agenda()
    {
        return $this->hasMany(\App\Models\Agenda\Agenda::class, 'akta_id');
    }

    public function tagihan()
    {
        return $this->hasMany(\App\Models\Keuangan\Tagihan::class, 'akta_id');
    }

    public function transaksi()
    {
        return $this->hasMany(\App\Models\Keuangan\Transaksi::class, 'akta_id');
    }
}
