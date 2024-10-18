<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KegiatanPenanganan extends Model
{
    use HasFactory, SoftDeletes;

    // Specify the table name if it differs from the pluralized model name
    protected $table = 'kegiatan_penanganans';

    // Define the fillable attributes for mass assignment
    protected $fillable = [
        'penanganan_id',
        'kegiatan_id',
        'opd_kegiatan',
    ];

    // Define relationships

    public function penanganan()
    {
        return $this->belongsTo(Penanganan::class, 'penanganan_id');
    }

    public function kegiatan()
    {
        return $this->belongsTo(Kegiatan::class, 'kegiatan_id');
    }
    public function subKegiatanPenanganans()
    {
        return $this->hasMany(SubKegiatanPenanganan::class, 'kegiatan_penanganan_id');
    }

    public function r_KegiatanPenanganans()
    {
        return $this->hasMany(RKegiatanPenanganan::class, 'kegiatan_id', 'kegiatan_id');
    }



    // Add any additional methods or functionality as necessary
}
