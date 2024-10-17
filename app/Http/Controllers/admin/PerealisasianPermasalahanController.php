<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Kegiatan;
use App\Models\Kelurahan;
use App\Models\Perealisasian;
use App\Models\Program;
use App\Models\RKegiatanPenanganan;
use App\Models\SubKegiatan;
use Illuminate\Http\Request;

class PerealisasianPermasalahanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $programs = Program::all();
        $kegiatans = Kegiatan::all();
        $subkegiatans = SubKegiatan::all();
        $kelurahans = Kelurahan::all();
        return view('pages.admin.perealisasian.create', compact('programs', 'kegiatans', 'subkegiatans', 'kelurahans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input yang diperlukan
        $request->validate([
            'program_id' => 'required|exists:programs,id',
            'kegiatan_id' => 'required|exists:kegiatans,id',
            'kelurahan_id' => 'required|exists:kelurahans,id',
            'opd_program' => 'required|string|max:255', // Validasi tambahan

        ]);

        // Buat data penanganan baru
        try {
            $perealisasian = Perealisasian::create([
                'program_id' => $request->program_id,
                'opd_program' => $request->opd_program,
                'kelurahan_id' => $request->kelurahan_id,

            ]);

            RKegiatanPenanganan::create([
                'perealisasian_id' => $perealisasian->id,
                'kegiatan_id' => $request->kegiatan_id,
                'opd_kegiatan' => $request->opd_kegiatan, // Pastikan ini sesuai dengan data yang ingin disimpan

            ]);

            return redirect()->route('dashboard.perealisasian.index')->with('success', 'Data Perealisasian berhasil disimpan!');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan saat menyimpan data: ' . $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Mencari data penanganan berdasarkan ID
        $perealisasian = Perealisasian::findOrFail($id);

        // Menghapus data penanganan
        $perealisasian->delete();

        return redirect()->route('dashboard.perealisasian.index')->with('success', 'Data perealisasian berhasil dihapus!');
    }
}
