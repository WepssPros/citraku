<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubKegiatanPenanganan extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'sub_kegiatan_penanganans';

    protected $fillable = [
        'sub_kegiatan_id',
        'kegiatan_penanganan_id',
        'sat_sub_kegiatan',
        'keb_thn1',
        'keb_thn2',
        'keb_thn3',
        'keb_thn4',
        'keb_thn5',
        'keb_total',
        'indikasi_thn1',
        'indikasi_thn2',
        'indikasi_thn3',
        'indikasi_thn4',
        'indikasi_thn5',
        'indikasi_total',
        'spb_kota',
        'spb_provinsi',
        'spb_apbn',
        'spb_dak',
        'spb_swasta',
        'spb_masyarakat',
        'header',
        'opd',
    ];

    // Definisikan relasi
    public function penanganan()
    {
        return $this->belongsTo(Penanganan::class, 'penanganan_id');
    }

    public function program()
    {
        return $this->belongsTo(Program::class, 'program_id');
    }

    public function kegiatan()
    {
        return $this->belongsTo(Kegiatan::class, 'kegiatan_id');
    }

    public function subKegiatan()
    {
        return $this->belongsTo(SubKegiatan::class, 'sub_kegiatan_id');
    }

    public function KegiatanPenanganan()
    {
        return $this->belongsTo(KegiatanPenanganan::class, 'kegiatan_penanganan_id');
    }

    public function r_subKegiatanPenanganans()
    {
        return $this->hasMany(RSubKegiatanPenanganan::class, 'sub_kegiatan_id', 'sub_kegiatan_id');
    }


    // Tambahkan metode atau fungsionalitas tambahan sesuai kebutuhan
}
