<?php

namespace App\Models\Keuangan;

use Illuminate\Database\Eloquent\Model;

class Tagihan extends Model
{
    protected $table = 'tagihan';

    protected $fillable = [
        'akta_id',
        'klien_id',
        'tanggal_tagihan',
        'jumlah',
        'status', // belum_bayar | lunas | sebagian
        'keterangan',
    ];

    protected $casts = [
        'tanggal_tagihan' => 'date',
        'jumlah'          => 'decimal:2',
    ];

    public function akta()
    {
        return $this->belongsTo(\App\Models\Akta\Akta::class, 'akta_id');
    }

    public function klien()
    {
        return $this->belongsTo(\App\Models\Master\Klien::class, 'klien_id');
    }

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, 'tagihan_id');
    }
}
