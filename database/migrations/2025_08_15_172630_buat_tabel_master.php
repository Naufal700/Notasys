<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        // 1. Jenis Identitas
        Schema::create('jenis_identitas', function (Blueprint $table) {
            $table->id();
            $table->string('nama_identitas'); // KTP, Paspor, SIM
            $table->timestamps();
        });

        // 2. Bank
        Schema::create('bank', function (Blueprint $table) {
            $table->id();
            $table->string('nama_bank');
            $table->string('kode_bank')->nullable();
            $table->timestamps();
        });

        // 3. Jenis Akta
        Schema::create('jenis_akta', function (Blueprint $table) {
            $table->id();
            $table->string('nama_akta');
            $table->text('deskripsi')->nullable();
            $table->timestamps();
        });

        // 4. Status Akta (master status)
        Schema::create('status_akta', function (Blueprint $table) {
            $table->id();
            $table->string('nama_status'); // draft, siap_tanda_tangan, selesai, batal, dll.
            $table->string('warna')->nullable(); // opsi untuk UI
            $table->timestamps();
        });

        // 5. Jenis Agenda
        Schema::create('jenis_agenda', function (Blueprint $table) {
            $table->id();
            $table->string('nama_jenis_agenda'); // tanda tangan, pengambilan dokumen, dll.
            $table->timestamps();
        });

        // 6. Jenis Transaksi
        Schema::create('jenis_transaksi', function (Blueprint $table) {
            $table->id();
            $table->string('nama_jenis_transaksi'); // pemasukan, pengeluaran, honorarium, operasional, pajak, dsb
            $table->timestamps();
        });

        // 7. Jenis Pajak
        Schema::create('jenis_pajak', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pajak'); // BPHTB, PPh, PNBP
            $table->timestamps();
        });

        // 8. Klien
        Schema::create('klien', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->enum('jenis', ['perorangan', 'badan_hukum']);
            $table->foreignId('jenis_identitas_id')->nullable()->constrained('jenis_identitas')->nullOnDelete();
            $table->string('nomor_identitas')->nullable();
            $table->string('npwp')->nullable();
            $table->text('alamat')->nullable();
            $table->string('telepon')->nullable();
            $table->string('email')->nullable();
            $table->timestamps();

            $table->index(['nama', 'jenis']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('klien');
        Schema::dropIfExists('jenis_pajak');
        Schema::dropIfExists('jenis_transaksi');
        Schema::dropIfExists('jenis_agenda');
        Schema::dropIfExists('status_akta');
        Schema::dropIfExists('jenis_akta');
        Schema::dropIfExists('bank');
        Schema::dropIfExists('jenis_identitas');
    }
};
