<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Kegiatan;
use App\Models\Program;
use Illuminate\Http\Request;

class KegiatanController extends Controller
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
        // Mengambil daftar program untuk ditampilkan dalam dropdown
        $programs = Program::all();
        return view('pages.admin.kegiatan.create', compact('programs'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'kode' => 'required|string|max:255',
            'kegiatan' => 'required|string|max:255',
            'program_id' => 'required|exists:programs,id', // Pastikan program_id valid
        ]);

        // Menyimpan data kegiatan baru
        Kegiatan::create($request->all());

        // Redirect ke halaman index setelah berhasil
        return redirect()->route('dashboard.program.index')->with('success', 'Kegiatan berhasil ditambahkan.');
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
        $kegiatan = Kegiatan::findOrFail($id);
        $programs = Program::all(); // Ambil semua program untuk dropdown
        return view('pages.admin.kegiatan.edit', compact('kegiatan', 'programs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi input
        $request->validate([
            'kode' => 'required|string|max:255',
            'kegiatan' => 'required|string|max:255',
            'program_id' => 'required|exists:programs,id', // Pastikan program_id valid
        ]);

        // Mencari kegiatan berdasarkan ID
        $kegiatan = Kegiatan::findOrFail($id);
        // Memperbarui data kegiatan
        $kegiatan->update($request->all());

        // Redirect ke halaman index setelah berhasil
        return redirect()->route('dashboard.program.index')->with('success', 'Kegiatan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Mencari kegiatan berdasarkan ID
        $kegiatan = Kegiatan::findOrFail($id);
        // Menghapus kegiatan
        $kegiatan->delete();

        // Redirect ke halaman index setelah berhasil
        return redirect()->route('dashboard.program.index')->with('success', 'Kegiatan berhasil dihapus.');
    }
}
