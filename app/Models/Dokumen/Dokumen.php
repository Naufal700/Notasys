<?php

namespace App\Models\Dokumen;

use App\Models\Master\TemplateDokumen;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Dokumen extends Model
{
    use HasFactory;

    protected $table = 'dokumen';

    protected $fillable = [
        'template_id',
        'data',
        'created_by',
    ];

    protected $casts = [
        'data' => 'array',
    ];

    public function template()
    {
        return $this->belongsTo(TemplateDokumen::class, 'template_id');
    }

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'created_by');
    }
}
