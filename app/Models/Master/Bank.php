<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    protected $table = 'bank';

    protected $fillable = [
        'nama_bank',
        'kode_bank',
        'nomor_rekening',
        'nama_pemilik',
        'aktif',
        'keterangan',
    ];

    /**
     * Relasi ke Rekening Escrow
     */
    public function rekeningEscrow()
    {
        return $this->hasMany(\App\Models\Keuangan\RekeningEscrow::class, 'bank_id');
    }

    /**
     * Scope untuk bank yang aktif
     */
    public function scopeAktif($query)
    {
        return $query->where('aktif', true);
    }
}
