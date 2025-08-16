<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        // Akta
        Schema::create('akta', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_akta')->unique();
            $table->foreignId('jenis_akta_id')->constrained('jenis_akta')->cascadeOnDelete();
            $table->date('tanggal');
            $table->string('objek')->nullable();
            $table->decimal('biaya', 15, 2)->default(0);
            $table->foreignId('status_akta_id')->nullable()->constrained('status_akta')->nullOnDelete();
            $table->text('catatan')->nullable();
            $table->timestamps();

            $table->index(['jenis_akta_id', 'tanggal']);
        });

        // Pihak Akta (banyak pihak)
        Schema::create('pihak_akta', function (Blueprint $table) {
            $table->id();
            $table->foreignId('akta_id')->constrained('akta')->cascadeOnDelete();
            $table->foreignId('klien_id')->constrained('klien')->cascadeOnDelete();
            $table->enum('peran', ['pihak_1', 'pihak_2', 'pihak_lain', 'saksi', 'kuasa']);
            $table->string('keterangan')->nullable();
            $table->timestamps();

            $table->unique(['akta_id', 'klien_id', 'peran']);
        });

        // Saksi Akta (opsional jika saksi bukan dari tabel klien)
        Schema::create('saksi_akta', function (Blueprint $table) {
            $table->id();
            $table->foreignId('akta_id')->constrained('akta')->cascadeOnDelete();
            $table->string('nama_saksi');
            $table->string('nomor_identitas')->nullable();
            $table->timestamps();
        });

        // Penandatangan Akta (mis. notaris & pihak yang tanda tangan)
        Schema::create('penandatangan_akta', function (Blueprint $table) {
            $table->id();
            $table->foreignId('akta_id')->constrained('akta')->cascadeOnDelete();
            $table->string('nama_penandatangan');
            $table->enum('tipe_penandatangan', ['notaris', 'klien', 'saksi', 'lainnya']);
            $table->dateTime('waktu_ttd')->nullable();
            $table->timestamps();
        });

        // Riwayat Status Akta (tracking perubahan status)
        Schema::create('riwayat_status_akta', function (Blueprint $table) {
            $table->id();
            $table->foreignId('akta_id')->constrained('akta')->cascadeOnDelete();
            $table->foreignId('status_akta_id')->constrained('status_akta')->cascadeOnDelete();
            $table->timestamp('waktu_set')->useCurrent();
            $table->string('keterangan')->nullable();
            $table->timestamps();

            $table->index(['akta_id', 'status_akta_id', 'waktu_set']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('riwayat_status_akta');
        Schema::dropIfExists('penandatangan_akta');
        Schema::dropIfExists('saksi_akta');
        Schema::dropIfExists('pihak_akta');
        Schema::dropIfExists('akta');
    }
};
