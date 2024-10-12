<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Kegiatan;
use App\Models\SubKegiatan;
use Illuminate\Http\Request;

class SubkegiatanController extends Controller
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
        // Mengambil data kegiatan untuk dropdown
        $kegiatan = Kegiatan::all();
        return view('pages.admin.subkegiatan.create', compact('kegiatan'));
    }

    /**
     * Store a newly created resource in storage.
     */
   

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required|string|max:255',
            'kegiatan_id' => 'required|exists:kegiatans,id',
            'sub_kegiatan' => 'required|string|max:255',
            'kinerja' => 'required|string|max:255',
            'indikator' => 'required|string|max:255',
            'satuan' => 'required|string|max:255',
        ]);

        // Membuat SubKegiatan baru
        SubKegiatan::create($request->all());

        // Redirect ke index program setelah berhasil
        return redirect()->route('dashboard.program.index')->with('success', 'Sub Kegiatan berhasil dibuat.');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $subKegiatan = SubKegiatan::findOrFail($id);
        $kegiatan = Kegiatan::all(); // Mengambil data kegiatan untuk dropdown
        return view('pages.admin.subkegiatan.edit', compact('subKegiatan', 'kegiatan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'kode' => 'required|string|max:255',
            'kegiatan_id' => 'required|exists:kegiatans,id',
            'sub_kegiatan' => 'required|string|max:255',
            'kinerja' => 'required|string|max:255',
            'indikator' => 'required|string|max:255',
            'satuan' => 'required|string|max:255',
        ]);

        $subKegiatan = SubKegiatan::findOrFail($id);
        $subKegiatan->update($request->all());

        // Redirect ke index program setelah berhasil
        return redirect()->route('dashboard.program.index')->with('success', 'Sub Kegiatan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $subKegiatan = SubKegiatan::findOrFail($id);
        $subKegiatan->delete();

        // Redirect ke index program setelah berhasil
        return redirect()->route('dashboard.program.index')->with('success', 'Sub Kegiatan berhasil dihapus.');
    }
}
