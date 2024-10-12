<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kegiatan extends Model
{
    use HasFactory, SoftDeletes;



    protected $fillable = [
        'kode',
        'kegiatan',
        'program_id',
    ];

    /**
     * Relasi ke model Program.
     * Setiap kegiatan berelasi dengan satu program.
     */
    public function program()
    {
        return $this->belongsTo(Program::class, 'program_id');
    }

    public function subkegiatan()
    {
        return $this->hasMany(SubKegiatan::class);
    }
}
