<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('pegawai_m', function (Blueprint $table) {
            $table->id();

            // Data pribadi
            $table->string('nama');
            $table->string('nip')->nullable()->unique(); // Nomor Induk Pegawai
            $table->string('email')->unique();
            $table->string('telepon')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->text('alamat')->nullable();

            // Jabatan / Departemen
            $table->string('jabatan')->nullable(); // Notaris, Staff, Kasir, dll.
            $table->string('departemen')->nullable(); // Administrasi, Keuangan, dll.

            // Login
            $table->string('username')->nullable()->unique();
            $table->string('password')->nullable();

            // Hak akses / role
            $table->enum('role', ['admin', 'notaris', 'staff', 'kasir'])->default('staff');

            // Status pegawai
            $table->enum('status', ['aktif', 'nonaktif'])->default('aktif');


            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pegawai_m');
    }
};
