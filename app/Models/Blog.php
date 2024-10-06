<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Blog extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'header_name',
        'category_name',
        'tumbnail', // menyimpan foto
        'slug',
        'blog_content',
    ];

    // Mendapatkan URL lengkap untuk tumbnail yang disimpan
    public function getTumbnailUrlAttribute()
    {
        return $this->tumbnail ? config('app.url') . Storage::url($this->tumbnail) : null;
    }
}
