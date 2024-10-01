<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kelurahan extends Model
{

    use HasFactory, SoftDeletes;
    protected $fillable = ['nama', 'koordinat', 'kecamatan_id',]; // Kolom yang bisa diisi

     public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class);
    }
}
