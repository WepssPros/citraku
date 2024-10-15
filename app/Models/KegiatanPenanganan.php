<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KegiatanPenanganan extends Model
{
    use HasFactory, SoftDeletes;

    // Kolom yang bisa diisi secara massal (mass assignable)
    protected $fillable = ['penanganan_id', 'kegiatan_id', 'opd_kegiatan'];

    // Relasi ke Penanganan
    public function penanganan()
    {
        return $this->belongsTo(Penanganan::class, 'penanganan_id');
    }

    // Relasi ke Kegiatan
    public function kegiatan()
    {
        return $this->belongsTo(Kegiatan::class, 'kegiatan_id');
    }

    // Relasi ke OPD Kegiatan (jika opd_kegiatan merupakan model terpisah)
    public function subkegiatan()
    {
        return $this->hasMany(SubKegiatanPenanganan::class, 'sub_kegiatan_id');
    }
}
