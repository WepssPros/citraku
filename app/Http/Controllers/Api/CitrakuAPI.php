<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Rt;
use App\Models\Tematik;
use Illuminate\Http\Request;

class CitrakuAPI extends Controller
{
    public function getAllKecamatan()
    {
        $kecamatan = Kecamatan::all(); // Contoh mengambil semua data kecamatan
        return response()->json($kecamatan);
    }

    public function getAllKelurahan()
    {
        $kelurahan = Kelurahan::all();
        return response()->json($kelurahan);
    }

    public function getAllRt()
    {
        $rt = Rt::all();
        return response()->json($rt);
    }

    public function getKawasanKumuh()
    {
        // Query untuk mengambil data RT yang tingkat_status-nya KUMUH RINGAN, KUMUH SEDANG, atau KUMUH TINGGI
        $kawasanKumuh = Rt::whereIn('tingkat_status', ['KUMUH RINGAN', 'KUMUH SEDANG', 'KUMUH TINGGI'])
            ->get();

        // Mengembalikan data dalam format JSON
        return response()->json($kawasanKumuh);
    }

    public function getRawanBanjir()
    {
        // Mengambil data yang namanya mengandung 'Rawan Banjir'
        $banjir = Tematik::where('nama_tipe', 'like', '%Rawan Banjir%')->get();

        // Mengembalikan data dalam format JSON
        return response()->json($banjir);
    }

    public function getRawanKebakaran()
    {
        // Mengambil data yang namanya mengandung 'Rawan Banjir'
        $kebakaran = Tematik::where('nama_tipe', 'like', '%Rawan Kebakaran%')->get();

        // Mengembalikan data dalam format JSON
        return response()->json($kebakaran);
    }

    public function getKelurahan($kecamatanID)
    {
        $kelurahans = Kelurahan::where('kecamatan_id', $kecamatanID)->get();

        // Return data dalam format JSON
        return response()->json($kelurahans);
    }
}
