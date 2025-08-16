<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('bank', function (Blueprint $table) {
            // Tambahkan kolom baru jika belum ada
            if (!Schema::hasColumn('bank', 'nomor_rekening')) {
                $table->string('nomor_rekening')->nullable()->after('kode_bank');
            }
            if (!Schema::hasColumn('bank', 'nama_pemilik')) {
                $table->string('nama_pemilik')->nullable()->after('nomor_rekening');
            }
            if (!Schema::hasColumn('bank', 'aktif')) {
                $table->boolean('aktif')->default(true)->after('nama_pemilik');
            }
            if (!Schema::hasColumn('bank', 'keterangan')) {
                $table->text('keterangan')->nullable()->after('aktif');
            }

            // Ubah kolom kode_bank menjadi unik (jika belum unik)
            $table->string('kode_bank')->nullable()->unique()->change();
        });
    }

    public function down(): void
    {
        Schema::table('bank', function (Blueprint $table) {
            // Hapus kolom tambahan
            $table->dropColumn(['nomor_rekening', 'nama_pemilik', 'aktif', 'keterangan']);

            // Ubah kolom kode_bank kembali ke sebelumnya (nullable tanpa unique)
            $table->string('kode_bank')->nullable()->change();
        });
    }
};
