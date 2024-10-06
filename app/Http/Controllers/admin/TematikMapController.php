<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Tematik;
use App\Models\TematikMap;
use Illuminate\Http\Request;

class TematikMapController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tematikMaps = Tematik::all(); // Mengambil semua data dari tabel
        return view('pages.admin.tematik.index', compact('tematikMaps')); // Menampilkan view dengan data
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.tematik.create'); // Menampilkan form create
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'nama_tipe' => 'required|string',
            'color' => 'nullable|string',
            'geojson_file' => 'required|file|mimes:json', // Pastikan file GeoJSON diupload
        ]);

        // Membaca file GeoJSON
        $geojsonPath = $request->file('geojson_file')->store('geojson'); // Simpan file di folder geojson
        $geojson = json_decode(file_get_contents(storage_path('app/' . $geojsonPath)), true);

        // Mendapatkan koordinat dari file GeoJSON
        $coordinates = $geojson['features'][0]['geometry']['coordinates'];

        // Jika koordinat adalah LineString, ubah menjadi Polygon jika perlu
        if ($geojson['features'][0]['geometry']['type'] === 'LineString') {
            $coordinates = [$coordinates]; // Mengubahnya menjadi format Polygon
        }

        // Simpan data TematikMap ke database
        Tematik::create([
            'nama_tipe' => $validatedData['nama_tipe'],
            'koordinat' => json_encode([ // Menyimpan sebagai JSON
                'type' => 'Polygon', // Mengubahnya menjadi Polygon jika LineString
                'coordinates' => $coordinates,
            ]),
            'color' => $validatedData['color'],

        ]);

        return redirect()->route('dashboard.tematik.index')->with('success', 'Data Tematik Map berhasil disimpan.');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $tematikMap = TematikMap::findOrFail($id); // Mencari data berdasarkan ID
        return view('pages.admin.tematik.show', compact('tematikMap')); // Menampilkan detail data
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tematikMap = Tematik::findOrFail($id); // Mencari data berdasarkan ID
        return view('pages.admin.tematik.edit', compact('tematikMap')); // Menampilkan form edit
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi data
        $validated = $request->validate([
            'tipe_tematik' => 'required|string|max:255',
            'koordinat' => 'required|string',
            'color' => 'required|string|max:7',
        ]);

        // Update data di database
        $tematikMap = Tematik::findOrFail($id);
        $tematikMap->update($validated);

        return redirect()->route('dashboard.tematik.index')->with('success', 'Data berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tematikMap = Tematik::findOrFail($id);
        $tematikMap->delete(); // Soft delete

        return redirect()->route('dashboard.tematik.index')->with('success', 'Data berhasil dihapus!');
    }
}
