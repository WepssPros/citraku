<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kegiatan;
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
            'sub_kegiatan_id' => 'required|exists:sub_kegiatans,id',
            'kelurahan_id' => 'required|exists:kelurahans,id',
            // Tambahkan validasi lainnya sesuai kebutuhan Anda
        ]);

        // Buat data penanganan baru
        Penanganan::create([
            'program_id' => $request->program_id,
            'kegiatan_id' => $request->kegiatan_id,
            'sub_kegiatan_id' => $request->sub_kegiatan_id,
            'kelurahan_id' => $request->kelurahan_id,
            'sat_program' => $request->sat_program,
            'sat_kegiatan' => $request->sat_kegiatan,
            'sat_sub_kegiatan' => $request->sat_sub_kegiatan,

        ]);

        return redirect()->route('dashboard.penanganan.index')->with('success', 'Data penanganan berhasil disimpan!');
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
        //
    }
}
