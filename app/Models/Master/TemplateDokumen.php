<?php

namespace App\Models\Master;

use App\Models\Master\JenisAkta;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TemplateDokumen extends Model
{
    use HasFactory;

    protected $table = 'template_dokumen';

    protected $fillable = [
        'nama_template',
        'deskripsi',
        'file_path',
        'is_active',
        'jenis_akta_id',
        'created_by',
        'updated_by',
    ];

    // Relasi ke jenis akta
    public function jenisAkta()
    {
        return $this->belongsTo(JenisAkta::class, 'jenis_akta_id');
    }
}
