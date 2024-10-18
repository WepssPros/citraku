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
        $laporanPerbandingan = DB::table('penanganans')
            ->join('perealisasians', 'penanganans.program_id', '=', 'perealisasians.program_id')
            ->join('programs', 'penanganans.program_id', '=', 'programs.id')
            ->join('kelurahans', 'penanganans.kelurahan_id', '=', 'kelurahans.id')
            ->leftJoin('rts', 'kelurahans.id', '=', 'rts.kelurahan_id')
            ->join('kegiatan_penanganans', 'penanganans.id', '=', 'kegiatan_penanganans.penanganan_id')
            ->join('kegiatans', 'kegiatan_penanganans.kegiatan_id', '=', 'kegiatans.id')
            ->leftJoin('sub_kegiatan_penanganans', 'kegiatan_penanganans.id', '=', 'sub_kegiatan_penanganans.kegiatan_penanganan_id')
            ->leftJoin('sub_kegiatans', 'sub_kegiatan_penanganans.sub_kegiatan_id', '=', 'sub_kegiatans.id')
            ->select(
                'penanganans.*',
                'perealisasians.*',
                'programs.program AS program_name',
                'kelurahans.nama AS kelurahan_name',
                'kelurahans.jumlah_kk AS jumlah_kk',
                DB::raw('SUM(rts.luas_ha) AS total_luas_ha'),
                'kegiatan_penanganans.*',
                'kegiatans.kegiatan AS nama_kegiatan',
                'sub_kegiatan_penanganans.*',
                'sub_kegiatans.sub_kegiatan AS nama_sub_kegiatan'
            )
            ->groupBy(
                'penanganans.id',
                'perealisasians.id',
                'programs.program',
                'kelurahans.nama',
                'kelurahans.jumlah_kk',
                'kegiatan_penanganans.id',
                'kegiatans.kegiatan',
                'sub_kegiatan_penanganans.id',
                'sub_kegiatans.sub_kegiatan'
            )
            ->get();

        return view('pages.admin.laporan.laporan-perbandingan', compact('laporanPerbandingan'));
    }
}
