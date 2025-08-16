<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('template_dokumen', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_template', 255);
            $table->text('deskripsi')->nullable();
            $table->string('file_path', 255)->nullable(); // Word/PDF path
            $table->boolean('is_active')->default(true);
            $table->unsignedBigInteger('jenis_akta_id')->nullable();
            $table->foreign('jenis_akta_id')->references('id')->on('jenis_akta')->onDelete('set null');
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('template_dokumen');
    }
};
