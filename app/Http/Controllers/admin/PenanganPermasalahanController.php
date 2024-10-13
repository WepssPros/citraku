<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kegiatan;
use App\Models\Kelurahan;
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
        //
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
