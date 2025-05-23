<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pengaduan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pelapor');
            $table->string('no_hp');
            $table->string('lokasi_permasalahan');
            $table->string('nomor_identitas');
            $table->string('jenis_layanan');
            $table->string('judul_permasalahan');
            $table->string('deskripsi_permasalahan');
            $table->enum('status_pelapor',['dosen','mahasiswa','tendik']);
            $table->string('upload_bukti');
            $table->string('status_laporan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengaduan');
    }
};