<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rt extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'kecamatan_id',
        'kelurahan_id',
        'nomor',
        'koordinat',
        'color',

        
        'jumlah_jiwa',
        'kepadatan',
        'nilai_kekumuhan',
        'nilai_pertimbangan_lain',
        'jumlah_kk',
        'tingkat',
        'tingkat_status',
        'prioritas',
        'legalitas',
        'luas_ha'
    ];

    // protected $casts = [
    //     'koordinat' => 'array', // Mengcast kolom koordinat menjadi array
    //     'marker' => 'array',     // Mengcast kolom marker menjadi array
    // ];

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class);
    }

    public function kelurahan()
    {
        return $this->belongsTo(Kelurahan::class);
    }
}
