<?php

namespace App\Models\Keuangan;

use Illuminate\Database\Eloquent\Model;

class PembayaranPajak extends Model
{
    protected $table = 'pembayaran_pajak';

    protected $fillable = [
        'akta_id',
        'jenis_pajak_id',
        'nomor_bukti',
        'tanggal_bayar',
        'jumlah',
    ];

    protected $casts = [
        'tanggal_bayar' => 'date',
        'jumlah'        => 'decimal:2',
    ];

    public function akta()
    {
        return $this->belongsTo(\App\Models\Akta\Akta::class, 'akta_id');
    }

    public function jenisPajak()
    {
        return $this->belongsTo(\App\Models\Master\JenisPajak::class, 'jenis_pajak_id');
    }
}
