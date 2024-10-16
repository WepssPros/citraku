<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Penanganan extends Model
{
    use HasFactory, SoftDeletes;

    // Specify the table name if it differs from the pluralized model name
    protected $table = 'penanganans';

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

    public function kegiatanPenanganans()
    {
        return $this->hasMany(KegiatanPenanganan::class, 'penanganan_id');
    }

    // Add any additional relationships as necessary
}
