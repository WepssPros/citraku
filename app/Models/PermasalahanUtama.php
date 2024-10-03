<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class PermasalahanUtama extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'permasalahan_utamas';

    protected $fillable = [
        'kelurahan_id',
        'permasalahan_utama',
        'foto_1',
        'foto_2',
        'foto_3',
        'foto_4',
        'foto_5',

        'kategori_kumuh',
        'tipologi_kumuh',
        'karakteristik_pemukimans',
    ];

    /**
     * Mengambil URL lengkap untuk foto 1.
     */
    public function getFoto1UrlAttribute()
    {
        return $this->foto_1 ? config('app.url') . Storage::url($this->foto_1) : null;
    }

    /**
     * Mengambil URL lengkap untuk foto 2.
     */
    public function getFoto2UrlAttribute()
    {
        return $this->foto_2 ? config('app.url') . Storage::url($this->foto_2) : null;
    }

    /**
     * Mengambil URL lengkap untuk foto 3.
     */
    public function getFoto3UrlAttribute()
    {
        return $this->foto_3 ? config('app.url') . Storage::url($this->foto_3) : null;
    }

    /**
     * Mengambil URL lengkap untuk foto 4.
     */
    public function getFoto4UrlAttribute()
    {
        return $this->foto_4 ? config('app.url') . Storage::url($this->foto_4) : null;
    }

    /**
     * Mengambil URL lengkap untuk foto 5.
     */
    public function getFoto5UrlAttribute()
    {
        return $this->foto_5 ? config('app.url') . Storage::url($this->foto_5) : null;
    }

    public function kelurahan()
    {
        return $this->belongsTo(Kelurahan::class);
    }
}


    