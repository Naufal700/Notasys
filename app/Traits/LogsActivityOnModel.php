<?php

namespace App\Traits;

use App\Models\ActivityLog;
use Illuminate\Support\Facades\Auth;

trait LogsActivityOnModel
{
    public static function bootLogsActivityOnModel()
    {
        // Saat data dibuat
        static::created(function ($model) {
            $model->logActivity('menambahkan');
        });

        // Saat data diubah
        static::updated(function ($model) {
            $model->logActivity('mengubah');
        });

        // Saat data dihapus
        static::deleted(function ($model) {
            $model->logActivity('menghapus');
        });
    }

    protected function logActivity(string $action)
    {
        $modelName = class_basename($this); // Nama model, misal 'Klien'

        // Coba ambil property logName dulu, kalau tidak ada ambil 'nama' atau 'id'
        if (property_exists($this, 'logName') && !empty($this->logName)) {
            $displayName = $this->logName;
        } elseif (isset($this->nama) && !empty($this->nama)) {
            $displayName = $this->nama;
        } else {
            $displayName = $this->nama_template;
        }

        // Simpan ke tabel activity_logs
        ActivityLog::create([
            'user_id' => Auth::id() ?? 0, // 0 jika user belum login
            'activity' => ucfirst($action) . " $modelName: $displayName",
        ]);
    }
}
