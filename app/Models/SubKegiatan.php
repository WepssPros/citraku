<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubKegiatan extends Model
{
    use HasFactory, SoftDeletes;

 

    protected $fillable = [
        'kode',
        'kegiatan_id',
        'sub_kegiatan',
        'kinerja',
        'indikator',
        'satuan',
    ];

    /**
     * Relasi ke model Kegiatan.
     * Setiap sub kegiatan berelasi dengan satu kegiatan.
     */
    public function kegiatan()
    {
        return $this->belongsTo(Kegiatan::class, 'kegiatan_id');
    }
}
