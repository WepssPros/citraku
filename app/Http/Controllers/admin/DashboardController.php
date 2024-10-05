<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\PermasalahanUtama;
use App\Models\Rt;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $kecamatans = Kecamatan::all();
        $kelurahans = Kelurahan::with('kecamatan', 'permasalahan')->get();
        $permasalahans = PermasalahanUtama::all();
        $rts = Rt::with('kelurahan', 'kecamatan')->get();
        // Mengubah format data



        // Mengirim data ke view
        return view('pages.admin.dashboard', compact('kecamatans', 'kelurahans', 'rts', 'permasalahans'));
    }
}
