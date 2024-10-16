<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Program extends Model
{

    use HasFactory, SoftDeletes;


    protected $fillable = [
        'header',
        'kode',
        'program',
    ];
    public function kegiatan()
    {
        return $this->hasMany(Kegiatan::class);
    }
}
