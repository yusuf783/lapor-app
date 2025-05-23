<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Pengaduan;
use App\Models\User;
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('detail_pengaduan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pengaduan_id')->onCascadeDelete();
            $table->foreignId('user_id')->constrained();
            $table->string('catatan');
            $table->string('status_laporan');
            $table->string('foto_balasan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_pengaduan');
    }
};
