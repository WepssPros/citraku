<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\PermasalahanUtama;
use App\Models\Rt;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        return view('pages.frontend.index');
    }

    public function geopasial()
    {
        $kecamatans = Kecamatan::all();
        $kelurahans = Kelurahan::with('kecamatan', 'permasalahan')->get();
        $permasalahans = PermasalahanUtama::all();
        $rts = Rt::with('kelurahan', 'kecamatan')->get();
        return view('pages.frontend.geopasial', compact('kecamatans', 'kelurahans', 'permasalahans', 'rts'));
    }
}
