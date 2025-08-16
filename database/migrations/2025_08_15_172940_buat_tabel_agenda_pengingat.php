<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        // Agenda
        Schema::create('agenda', function (Blueprint $table) {
            $table->id();
            $table->foreignId('akta_id')->nullable()->constrained('akta')->nullOnDelete();
            $table->foreignId('jenis_agenda_id')->nullable()->constrained('jenis_agenda')->nullOnDelete();
            $table->dateTime('waktu_mulai');
            $table->dateTime('waktu_selesai')->nullable();
            $table->string('kegiatan');
            $table->text('keterangan')->nullable();
            $table->boolean('selesai')->default(false);
            $table->timestamps();

            $table->index(['akta_id', 'waktu_mulai']);
        });

        // Pengingat Agenda
        Schema::create('pengingat_agenda', function (Blueprint $table) {
            $table->id();
            $table->foreignId('agenda_id')->constrained('agenda')->cascadeOnDelete();
            $table->dateTime('waktu_pengingat');
            $table->enum('via', ['email', 'whatsapp', 'sms', 'aplikasi'])->default('aplikasi');
            $table->boolean('terkirim')->default(false);
            $table->timestamps();

            $table->index(['agenda_id', 'waktu_pengingat']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pengingat_agenda');
        Schema::dropIfExists('agenda');
    }
};
