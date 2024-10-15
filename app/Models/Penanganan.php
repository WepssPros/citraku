<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Penanganan extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['program_id', 'kelurahan_id', 'opd_program'];



    public function program()
    {
        return $this->belongsTo(Program::class, 'program_id');
    }
    public function kegiatan()
    {
        return $this->hasMany(KegiatanPenanganan::class, 'kegiatan_id');
    }
    public function subkegiatan()
    {
        return $this->hasMany(SubKegiatanPenanganan::class, 'sub_kegiatan_id');
    }
    public function kelurahan()
    {
        return $this->belongsTo(Kelurahan::class, 'kelurahan_id');
    }
}
