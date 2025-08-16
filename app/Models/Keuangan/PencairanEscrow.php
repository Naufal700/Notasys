<?php

namespace App\Models\Keuangan;

use Illuminate\Database\Eloquent\Model;

class PencairanEscrow extends Model
{
    protected $table = 'pencairan_escrow';

    protected $fillable = [
        'rekening_escrow_id',
        'tanggal_pencairan',
        'jumlah',
        'penerima',
        'keterangan',
    ];

    protected $casts = [
        'tanggal_pencairan' => 'date',
        'jumlah'            => 'decimal:2',
    ];

    public function rekeningEscrow()
    {
        return $this->belongsTo(RekeningEscrow::class, 'rekening_escrow_id');
    }
}
