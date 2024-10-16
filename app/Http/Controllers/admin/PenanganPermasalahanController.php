<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kegiatan;
use App\Models\KegiatanPenanganan;
use App\Models\Kelurahan;
use App\Models\Penanganan;
use App\Models\Program;
use App\Models\SubKegiatan;
use Illuminate\Http\Request;

class PenanganPermasalahanController extends Controller
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
        return view('pages.admin.penanganan.create', compact('programs', 'kegiatans', 'subkegiatans', 'kelurahans'));
    }
    public function getKegiatan($program_id)
    {
        $kegiatan = Kegiatan::where('program_id', $program_id)->get();
        return response()->json($kegiatan);
    }

    // Method untuk mendapatkan sub kegiatan berdasarkan kegiatan_id
    public function getSubKegiatan($kegiatan_id)
    {
        $subKegiatan = SubKegiatan::where('kegiatan_id', $kegiatan_id)->get();
        return response()->json($subKegiatan);
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
            $penanganan = Penanganan::create([
                'program_id' => $request->program_id,
                'opd_program' => $request->opd_program,
                'kelurahan_id' => $request->kelurahan_id,

            ]);

            KegiatanPenanganan::create([
                'penanganan_id' => $penanganan->id,
                'kegiatan_id' => $request->kegiatan_id,
                'opd_kegiatan' => $request->opd_kegiatan, // Pastikan ini sesuai dengan data yang ingin disimpan

            ]);

            return redirect()->route('dashboard.penanganan.index')->with('success', 'Data penanganan berhasil disimpan!');
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
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Mencari data penanganan berdasarkan ID
        $penanganan = Penanganan::findOrFail($id);

        // Menghapus data penanganan
        $penanganan->delete();

        return redirect()->route('dashboard.penanganan.index')->with('success', 'Data penanganan berhasil dihapus!');
    }
}
