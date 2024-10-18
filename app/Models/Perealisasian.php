<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Perealisasian extends Model
{
    use HasFactory, SoftDeletes;

    // Specify the table name if it differs from the pluralized model name
    protected $table = 'perealisasians';

    // Define the fillable attributes for mass assignment
    protected $fillable = [
        'program_id',
        'kelurahan_id',
        'opd_program',
    ];

    // Define relationships

    public function program()
    {
        return $this->belongsTo(Program::class, 'program_id');
    }

    public function kelurahan()
    {
        return $this->belongsTo(Kelurahan::class, 'kelurahan_id');
    }

    public function R_KegiatanPenanganans()
    {
        return $this->hasMany(RKegiatanPenanganan::class, 'perealisasian_id');
    }

    public function penanganan()
    {
        return $this->belongsTo(Penanganan::class, 'program_id', 'program_id');
    }
}
