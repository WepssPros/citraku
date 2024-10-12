<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Kegiatan;
use App\Models\Program;
use App\Models\SubKegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $programs = Program::all();
        $kegiatans = Kegiatan::all();
        $subkegiatans = SubKegiatan::all();
        return view('pages.admin.program.index', compact('programs', 'kegiatans', 'subkegiatans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.program.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'header' => 'required|string|max:255',
            'kode' => 'required|string|max:50|unique:programs,kode',
            'program' => 'required|string|max:255',
        ]);

        // Simpan data Program baru
        Program::create($request->all());

        return redirect()->route('dashboard.program.index')->with('success', 'Program berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $program = Program::findOrFail($id);
        return view('pages.admin.program.show', compact('program'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $program = Program::findOrFail($id);
        return view('pages.admin.program.edit', compact('program'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi input
        $request->validate([
            'header' => 'required|string|max:255',
            'kode' => 'required|string|max:50|unique:programs,kode,' . $id,
            'program' => 'required|string|max:255',
        ]);

        // Update data Program
        $program = Program::findOrFail($id);
        $program->update($request->all());

        return redirect()->route('dashboard.program.index')->with('success', 'Program berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $program = Program::findOrFail($id);
        $program->delete();

        return redirect()->route('dashboard.program.index')->with('success', 'Program berhasil dihapus.');
    }
}
