<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Kelurahan;
use App\Models\SubPermasalahan;
use Illuminate\Http\Request;

class SubPermasalahanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subpermasalahans = SubPermasalahan::all();
        return view('pages.admin.subpermasalahan.index', compact('subpermasalahans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kelurahans = Kelurahan::all();
        return view('pages.admin.subpermasalahan.create', compact('kelurahans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data
        $validatedData = $request->validate([
            'kelurahan_id' => 'required|exists:kelurahans,id',
            'header_no_1' => 'required|string|max:255',
            'text_1' => 'required|string',
            'header_no_2' => 'required|string|max:255',
            'text_2' => 'required|string',
            'header_no_3' => 'required|string|max:255',
            'text_3' => 'required|string',
            'header_no_4' => 'required|string|max:255',
            'text_4' => 'required|string',
            'header_no_5' => 'required|string|max:255',
            'text_5' => 'required|string',
            'header_no_6' => 'required|string|max:255',
            'text_6' => 'required|string',
            'header_no_7' => 'required|string|max:255',
            'text_7' => 'required|string',
            'header_no_8' => 'required|string|max:255',
            'text_8' => 'required|string',
            'header_no_9' => 'required|string|max:255',
            'text_9' => 'required|string',
            'header_no_10' => 'required|string|max:255',
            'text_10' => 'required|string',
        ]);

        // Menyimpan data ke dalam database
        SubPermasalahan::create($validatedData);

        // Redirect atau menampilkan pesan sukses
        return redirect()->route('dashboard.subpermasalahan.index')
            ->with('success', 'Sub Permasalahan berhasil ditambahkan.');
    }


    /**
     * Display the specified resource.
     */


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Mencari data berdasarkan ID
        $subPermasalahan = SubPermasalahan::findOrFail($id);
        $kelurahans = Kelurahan::all();
        // Mengirim data ke view edit
        return view('pages.admin.subpermasalahan.edit', compact('subPermasalahan', 'kelurahans'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi data
        $validatedData = $request->validate([
            'kelurahan_id' => 'required|exists:kelurahans,id',
            'header_no_1' => 'required|string|max:255',
            'text_1' => 'required|string',
            'header_no_2' => 'required|string|max:255',
            'text_2' => 'required|string',
            'header_no_3' => 'required|string|max:255',
            'text_3' => 'required|string',
            'header_no_4' => 'required|string|max:255',
            'text_4' => 'required|string',
            'header_no_5' => 'required|string|max:255',
            'text_5' => 'required|string',
            'header_no_6' => 'required|string|max:255',
            'text_6' => 'required|string',
            'header_no_7' => 'required|string|max:255',
            'text_7' => 'required|string',
            'header_no_8' => 'required|string|max:255',
            'text_8' => 'required|string',
            'header_no_9' => 'required|string|max:255',
            'text_9' => 'required|string',
            'header_no_10' => 'required|string|max:255',
            'text_10' => 'required|string',
        ]);

        // Mencari data yang akan diupdate
        $subPermasalahan = SubPermasalahan::findOrFail($id);

        // Mengupdate data
        $subPermasalahan->update($validatedData);

        // Redirect atau menampilkan pesan sukses
        return redirect()->route('dashboard.subpermasalahan.index')
            ->with('success', 'Sub Permasalahan berhasil diperbarui.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Mencari data yang akan dihapus
        $subPermasalahan = SubPermasalahan::findOrFail($id);

        // Menghapus data
        $subPermasalahan->delete();

        // Redirect atau menampilkan pesan sukses
        return redirect()->route('dashboard.subpermasalahan.index')
            ->with('success', 'Sub Permasalahan berhasil dihapus.');
    }
}
