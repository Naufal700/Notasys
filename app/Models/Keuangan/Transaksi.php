<?php

namespace App\Models\Keuangan;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';

    protected $fillable = [
        'akta_id',
        'tagihan_id',
        'tanggal_transaksi',
        'jumlah',
        'metode_pembayaran',
        'keterangan',
    ];

    protected $casts = [
        'tanggal_transaksi' => 'date',
        'jumlah'            => 'decimal:2',
    ];

    public function tagihan()
    {
        return $this->belongsTo(Tagihan::class, 'tagihan_id');
    }

    public function akta()
    {
        return $this->belongsTo(\App\Models\Akta\Akta::class, 'akta_id');
    }
}
