<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Kecamatan;
use Illuminate\Http\Request;

class CitrakuAPI extends Controller
{
    public function getAllKecamatan()
    {
        $kecamatan = Kecamatan::all(); // Contoh mengambil semua data kecamatan
        return response()->json($kecamatan);
    }
}
