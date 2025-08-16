<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Model;

class JenisPajak extends Model
{
    protected $table = 'jenis_pajak';

    protected $fillable = [
        'nama_pajak'
    ];

    public function pembayaranPajak()
    {
        return $this->hasMany(\App\Models\Keuangan\PembayaranPajak::class, 'jenis_pajak_id');
    }
}
