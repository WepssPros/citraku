<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use Illuminate\Http\Request;

class KelurahanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kelurahans = Kelurahan::all();
        return view('pages.admin.kelurahan.index', compact('kelurahans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kecamatans = Kecamatan::all();
        return view('pages.admin.kelurahan.create', compact('kecamatans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'kecamatan_id' => 'required|integer|exists:kecamatans,id', // Pastikan kecamatan_id ada di tabel kecamatans
            'nama' => 'required|string|max:255', // Nama kelurahan
            'geojson_file' => 'required|file|mimes:json', // Pastikan file GeoJSON diupload
            'marker' => 'nullable|boolean', // Marker opsional
            'color' => 'nullable|string|max:7', // Warna opsional, format hex
            'luas_wilayah' => 'nullable|string', // Luas wilayah opsional
            'persentase' => 'nullable|string', // Persentase opsional
            'jml_kelurahan' => 'nullable|integer', // Jumlah kelurahan opsional
            'jumlah_rt' => 'nullable|integer', // Jumlah RT opsional
        ]);

        // Membaca file GeoJSON
        $geojsonPath = $request->file('geojson_file')->store('geojson'); // Simpan file di folder geojson
        $geojson = json_decode(file_get_contents(storage_path('app/' . $geojsonPath)), true);

        // Mendapatkan koordinat dari file GeoJSON
        $coordinates = $geojson['features'][0]['geometry']['coordinates'];

        // Jika koordinat adalah LineString, ubah menjadi Polygon jika perlu
        if ($geojson['features'][0]['geometry']['type'] === 'MultiPolygon') {
            $coordinates = [$coordinates]; // Mengubahnya menjadi format Polygon
        }

        // Menyimpan data kelurahan ke database
        Kelurahan::create([
            'kecamatan_id' => $validatedData['kecamatan_id'],
            'nama' => $validatedData['nama'],
            'koordinat' => json_encode([ // Menyimpan sebagai JSON
                'type' => 'MultiPolygon', // Anda bisa mengubahnya sesuai jenis geometrinya
                'coordinates' => $coordinates,
            ]), // Pastikan ini tidak ter-escape
            'marker' => $validatedData['marker'], // Menyimpan marker jika ada
            'color' => $validatedData['color'], // Menyimpan color jika ada
            'luas_wilayah' => $validatedData['luas_wilayah'], // Menyimpan luas wilayah jika ada
            'persentase' => $validatedData['persentase'], // Menyimpan persentase jika ada
            'jml_kelurahan' => $validatedData['jml_kelurahan'], // Menyimpan jumlah kelurahan jika ada
            'jumlah_rt' => $validatedData['jumlah_rt'], // Menyimpan jumlah RT jika ada
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('kelurahan.index')->with('success', 'Kelurahan berhasil disimpan.');
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
    public function edit($id)
    {
        // Mencari kelurahan berdasarkan ID
        $kelurahan = Kelurahan::findOrFail($id);
        $kecamatans = Kecamatan::all(); // Mendapatkan semua kecamatan untuk dropdown

        // Menampilkan view edit dengan data kelurahan dan kecamatan
        return view('pages.admin.kelurahan.edit', compact('kelurahan', 'kecamatans'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi input
        $validatedData = $request->validate([
            'kecamatan_id' => 'required|integer|exists:kecamatans,id', // Pastikan kecamatan_id ada di tabel kecamatans
            'nama' => 'required|string|max:255', // Nama kelurahan
            'geojson_file' => 'nullable|file|mimes:json', // File GeoJSON opsional
            'marker' => 'nullable|boolean', // Marker opsional
            'color' => 'nullable|string|max:7', // Warna opsional, format hex
        ]);

        // Mencari kelurahan berdasarkan ID
        $kelurahan = Kelurahan::findOrFail($id);

        // Jika ada file GeoJSON yang diupload, proses file tersebut
        if ($request->hasFile('geojson_file')) {
            $geojsonPath = $request->file('geojson_file')->store('geojson'); // Simpan file di folder geojson
            $geojson = json_decode(file_get_contents(storage_path('app/' . $geojsonPath)), true);

            // Mendapatkan koordinat dari file GeoJSON
            $coordinates = $geojson['features'][0]['geometry']['coordinates'];

            // Memastikan bahwa koordinat adalah dalam format Polygon
            if ($geojson['features'][0]['geometry']['type'] === 'Polygon') {
                // Update data kelurahan dengan format yang benar
                $kelurahan->koordinat = json_encode([
                    'type' => 'Polygon',
                    'coordinates' => [$coordinates[0]], // Simpan semua koordinat dengan satu lapisan tambahan
                ]);
            } elseif ($geojson['features'][0]['geometry']['type'] === 'MultiPolygon') {
                // Jika MultiPolygon, kita ambil hanya koordinat pertama
                $coordinates = array_slice($coordinates, 0, 1);
                // Update data kelurahan dengan format yang benar
                $kelurahan->koordinat = json_encode([
                    'type' => 'Polygon',
                    'coordinates' => [$coordinates[0][0]], // Simpan semua koordinat dengan satu lapisan tambahan
                ]);
            } else {
                return redirect()->back()->withErrors(['geojson_file' => 'GeoJSON tidak valid. Harus Polygon atau MultiPolygon.']);
            }
        }

        // Menyimpan perubahan data kelurahan
        $kelurahan->kecamatan_id = $validatedData['kecamatan_id'];
        $kelurahan->nama = $validatedData['nama'];
        $kelurahan->color = $validatedData['color'];
        $kelurahan->marker = $validatedData['marker'];
        $kelurahan->updated_at = now();
        $kelurahan->save(); // Simpan perubahan ke database

        return redirect()->route('dashboard.kelurahan.index')->with('success', 'Kelurahan berhasil diperbarui.');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
