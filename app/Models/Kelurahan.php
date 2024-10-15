<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kelurahan extends Model
{

    use HasFactory, SoftDeletes;
    protected $fillable = [
        'nama',
        'koordinat',
        'marker',
        'color',
        'jumlah_kk',
        'luas_wilayah',
       
    
    ];

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class);
    }

    public function rt()
    {
        return $this->hasMany(Rt::class);
    }

    public function permasalahan()
    {
        return $this->hasMany(PermasalahanUtama::class);
    }
    public function subpermasalahan()
    {
        return $this->hasMany(SubPermasalahan::class);
    }
}
