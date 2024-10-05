<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubPermasalahan extends Model
{
    use HasFactory, SoftDeletes;

    // Menentukan nama tabel jika berbeda dari nama model (optional)


    // Menentukan atribut yang dapat diisi massal
    protected $fillable = [
        'kelurahan_id',
        'header_no_1',
        'text_1',
        'header_no_2',
        'text_2',
        'header_no_3',
        'text_3',
        'header_no_4',
        'text_4',
        'header_no_5',
        'text_5',
        'header_no_6',
        'text_6',
        'header_no_7',
        'text_7',
        'header_no_8',
        'text_8',
        'header_no_9',
        'text_9',
        'header_no_10',
        'text_10',
        'created_at',
        'updated_at'
    ];

    public function kelurahan()
    {
        return $this->belongsTo(Kelurahan::class);
    }

    // Accessor untuk memformat created_at
    public function getFormattedCreatedAtAttribute()
    {
        return Carbon::parse($this->created_at)->format('d M. Y');
    }

    // Accessor untuk memformat updated_at
    public function getFormattedUpdatedAtAttribute()
    {
        return Carbon::parse($this->updated_at)->format('d M. Y');
    }
}
