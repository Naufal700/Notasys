<?php

namespace App\Models\Keuangan;

use Illuminate\Database\Eloquent\Model;

class RekeningEscrow extends Model
{
    protected $table = 'rekening_escrow';

    protected $fillable = [
        'bank_id',
        'nomor_rekening',
        'atas_nama',
        'saldo',
    ];

    protected $casts = [
        'saldo' => 'decimal:2',
    ];

    public function bank()
    {
        return $this->belongsTo(\App\Models\Master\Bank::class, 'bank_id');
    }
}
