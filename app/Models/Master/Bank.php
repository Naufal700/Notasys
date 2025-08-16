<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    protected $table = 'bank';

    protected $fillable = [
        'nama_bank',
        'kode_bank'
    ];

    public function rekeningEscrow()
    {
        return $this->hasMany(\App\Models\Keuangan\RekeningEscrow::class, 'bank_id');
    }
}
