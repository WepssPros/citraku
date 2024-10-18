<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Penanganan;
use App\Models\Perealisasian;
use App\Models\PermasalahanUtama;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    public function laporanPermasalahan()
    {
        $permasalahans = PermasalahanUtama::with('kelurahan')->get();
        return view('pages.admin.laporan.laporan-permasalahan', compact('permasalahans'));
    }

    public function laporanPenanganan()
    {
        $penanganans = Penanganan::all();
        return view('pages.admin.laporan.laporan-penanganan', compact('penanganans'));
    }

    public function laporanPerealisasian()
    {
        $perealisasians = Perealisasian::all();
        return view('pages.admin.laporan.laporan-perealisasian', compact('perealisasians'));
    }

    public function laporanPerbandingan()
    {
        // Mengambil penanganans dengan relasi perealisasians berdasarkan program_id yang sama
        $penanganans = Penanganan::whereHas('perealisasians', function ($query) {
            $query->whereColumn('penanganans.program_id', 'perealisasians.program_id');
        })->with('perealisasians')->get();

        return view('pages.admin.laporan.laporan-perbandingan', compact('penanganans'));
    }
}
