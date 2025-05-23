<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    use HasFactory;

    protected $table = 'pengaduan';

    protected $guard = [];
    
    protected $fillable = [
        'nama_pelapor',
        'no_hp',
        'lokasi_permasalahan',
        'nomor_identitas',
        'jenis_layanan',
        'judul_permasalahan',
        'deskripsi_permasalahan',
        'status_pelapor',
        'status_laporan',
        'upload_bukti'
    ];

    public function detailPengaduan()
    {
        return $this->hasMany(DetailPengaduan::class);
    }
}