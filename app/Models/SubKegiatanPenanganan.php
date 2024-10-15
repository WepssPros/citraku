<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubKegiatanPenanganan extends Model
{
    use HasFactory, SoftDeletes;

    // Kolom yang bisa diisi secara massal (mass assignable)
    protected $fillable = [
        'penanganan_id',
        'program_id',
        'kegiatan_id',
        'keb_total_thn1',
        'keb_total_thn2',
        'keb_total_thn3',
        'keb_total_thn4',
        'keb_total_thn5',
        'keb_total_program',
        'indikasi_thn1',
        'indikasi_thn2',
        'indikasi_thn3',
        'indikasi_thn4',
        'indikasi_thn5',
        'indikasi_total',
        'sp_kota_total',
        'sp_provinsi_total',
        'sp_apbn_total',
        'sp_dak_total',
        'sp_swasta_total',
        'sp_masyarakat_total',
        'header',
        'opd'
    ];

    // Relasi ke Penanganan
    public function penanganan()
    {
        return $this->belongsTo(Penanganan::class, 'penanganan_id');
    }

    // Relasi ke Program
    public function program()
    {
        return $this->belongsTo(Program::class, 'program_id');
    }

    // Relasi ke Kegiatan
    public function kegiatan()
    {
        return $this->belongsTo(Kegiatan::class, 'kegiatan_id');
    }
}
