<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Rt;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $kecamatans = Kecamatan::all();
        $kelurahans = Kelurahan::with('kecamatan')->get();
        $rts = Rt::with('kelurahan', 'kecamatan')->get();
        // Mengubah format data
        $formattedData = [
            'pasar' => [],
        ];

        foreach ($kecamatans as $kecamatan) {
            $koordinat = json_decode($kecamatan->koordinat); // Mengambil dan mendecode koordinat

        }

        // Mengirim data ke view
        return view('pages.admin.dashboard', compact('formattedData', 'kecamatans', 'kelurahans', 'rts'));
    }
}
