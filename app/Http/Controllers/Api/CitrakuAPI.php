<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Rt;
use Illuminate\Http\Request;

class CitrakuAPI extends Controller
{
    public function getAllKecamatan()
    {
        $kecamatan = Kecamatan::all(); // Contoh mengambil semua data kecamatan
        return response()->json($kecamatan);
    }

    public function getAllKelurahan(){
        $kelurahan = Kelurahan::all();
        return response()->json($kelurahan);
    }

    public function getAllRt()
    {
        $rt = Rt::all();
        return response()->json($rt);
    }


}
