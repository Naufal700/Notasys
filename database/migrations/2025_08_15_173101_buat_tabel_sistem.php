<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        // Pengguna (jika tidak ingin pakai users default Laravel)
        Schema::create('pengguna', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->string('email')->unique();
            $table->string('password');
            $table->enum('status', ['aktif', 'nonaktif'])->default('aktif');
            $table->rememberToken();
            $table->timestamps();
        });

        // Peran (Roles)
        Schema::create('peran', function (Blueprint $table) {
            $table->id();
            $table->string('nama_peran'); // admin, notaris, staff, keuangan
            $table->timestamps();
        });

        // Izin (Permissions)
        Schema::create('izin', function (Blueprint $table) {
            $table->id();
            $table->string('nama_izin'); // akta.view, akta.create, keuangan.post, dsb.
            $table->timestamps();
        });

        // Pivot Peran-Pengguna (many-to-many)
        Schema::create('peran_pengguna', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pengguna_id')->constrained('pengguna')->cascadeOnDelete();
            $table->foreignId('peran_id')->constrained('peran')->cascadeOnDelete();
            $table->timestamps();

            $table->unique(['pengguna_id', 'peran_id']);
        });

        // Pivot Izin-Peran (many-to-many)
        Schema::create('izin_peran', function (Blueprint $table) {
            $table->id();
            $table->foreignId('peran_id')->constrained('peran')->cascadeOnDelete();
            $table->foreignId('izin_id')->constrained('izin')->cascadeOnDelete();
            $table->timestamps();

            $table->unique(['peran_id', 'izin_id']);
        });

        // Log Aktivitas
        Schema::create('log_aktivitas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pengguna_id')->nullable()->constrained('pengguna')->nullOnDelete();
            $table->string('aksi');                 // CREATE / UPDATE / DELETE / LOGIN / EXPORT / CETAK
            $table->string('tabel')->nullable();    // nama tabel yang terdampak
            $table->unsignedBigInteger('id_record')->nullable();
            $table->ipAddress('ip_address')->nullable();
            $table->text('keterangan')->nullable();
            $table->timestamps();

            $table->index(['pengguna_id', 'tabel', 'id_record']);
        });

        // Riwayat Perubahan (versioning ringkas)
        Schema::create('riwayat_perubahan', function (Blueprint $table) {
            $table->id();
            $table->string('tabel');
            $table->unsignedBigInteger('id_record');
            $table->foreignId('pengguna_id')->nullable()->constrained('pengguna')->nullOnDelete();
            $table->json('data_lama')->nullable();
            $table->json('data_baru')->nullable();
            $table->timestamp('waktu_perubahan')->useCurrent();
            $table->timestamps();

            $table->index(['tabel', 'id_record']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('riwayat_perubahan');
        Schema::dropIfExists('log_aktivitas');
        Schema::dropIfExists('izin_peran');
        Schema::dropIfExists('peran_pengguna');
        Schema::dropIfExists('izin');
        Schema::dropIfExists('peran');
        Schema::dropIfExists('pengguna');
    }
};
