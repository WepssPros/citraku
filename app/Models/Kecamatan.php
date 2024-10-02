<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kecamatan extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['nama', 'koordinat']; // Kolom yang bisa diisi

    public function kelurahan()
    {
        return $this->hasMany(Kelurahan::class);
    }
    public function rt()
    {
        return $this->hasMany(Rt::class);
    }
}
