<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RKegiatanPenanganan extends Model
{
    use HasFactory, SoftDeletes;

    // Specify the table name if it differs from the pluralized model name
    protected $table = 'r_kegiatan_penanganans';

    // Define the fillable attributes for mass assignment
    protected $fillable = [
        'perealisasian_id',
        'kegiatan_id',
        'opd_kegiatan',
    ];

    // Define relationships

    public function perealisasian()
    {
        return $this->belongsTo(Perealisasian::class, 'perealisasian_id');
    }

    public function kegiatan()
    {
        return $this->belongsTo(Kegiatan::class, 'kegiatan_id');
    }
    public function R_subKegiatanPenanganans()
    {
        return $this->hasMany(RSubKegiatanPenanganan::class, 'r_kegiatan_penanganan_id');
    }
}
