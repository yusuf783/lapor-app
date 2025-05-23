<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPengaduan extends Model
{
    use HasFactory;

    protected $table = 'detail_pengaduan';

    protected $fillable = [
        'pengaduan_id',
        'user_id',
        'catatan',
        'status_laporan',
        'foto_balasan'
    ];

    public function pengaduan()
    {
        return $this->belongsTo(Pengaduan::class);
    }
}
