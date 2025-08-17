<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;

    protected $table = 'pegawai_m';

    protected $fillable = [
        'nama',
        'nip',
        'email',
        'telepon',
        'tanggal_lahir',
        'alamat',
        'jabatan',
        'departemen',
        'username',
        'password',
        'role',
        'status',
    ];

    protected $hidden = [
        'password',
    ];

    protected $casts = [
        'tanggal_lahir' => 'date',
    ];
}
