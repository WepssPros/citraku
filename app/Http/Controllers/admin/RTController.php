<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Rt;
use Illuminate\Http\Request;

class RTController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rts = Rt::all();
        return view('pages.admin.rt.index', compact('rts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kelurahans = Kelurahan::all();
        $kecamatans = Kecamatan::all();
        return view('pages.admin.rt.create', compact('kelurahans', 'kecamatans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'kecamatan_id' => 'required|integer',
            'kelurahan_id' => 'required|integer',
            'nomor' => 'required|string',
            'color' => 'nullable|string',
            'geojson_file' => 'nullable|file|mimes:json',

            'jumlah_jiwa' => 'nullable|integer',
            'kepadatan' => 'nullable|string',
            'nilai_kekumuhan' => 'nullable|string',
            'nilai_pertimbangan_lain' => 'nullable|string',
            'jumlah_kk' => 'nullable|string',
            'tingkat' => 'nullable|string',
            'tingkat_status' => 'nullable|string',
            'prioritas' => 'nullable|string',
            'legalitas' => 'nullable|string',
            'luas_ha' => 'nullable|numeric|regex:/^\d+(\.\d{1,2})?$/',
        ]);

        // Buat instance baru untuk RT
        $rt = new Rt();

        // Jika file GeoJSON diupload, simpan dan proses
        if ($request->hasFile('geojson_file')) {
            $geojsonPath = $request->file('geojson_file')->store('geojson'); // Simpan file di folder geojson
            $geojson = json_decode(file_get_contents(storage_path('app/' . $geojsonPath)), true);

            // Mendapatkan koordinat dari file GeoJSON
            $coordinates = $geojson['features'][0]['geometry']['coordinates'];

            // Cek apakah geometrinya adalah MultiPolygon
            if ($geojson['features'][0]['geometry']['type'] === 'MultiPolygon') {
                // Ambil seluruh koordinat
                $coordinates = $geojson['features'][0]['geometry']['coordinates'];
            } elseif ($geojson['features'][0]['geometry']['type'] === 'Polygon') {
                // Jika geometrinya Polygon, bungkus menjadi MultiPolygon
                $coordinates = [$geojson['features'][0]['geometry']['coordinates']];
            } else {
                return redirect()->back()->withErrors(['geojson_file' => 'GeoJSON harus berupa MultiPolygon atau Polygon.']);
            }

            // Update koordinat
            $rt->koordinat = json_encode([
                'type' => 'MultiPolygon',
                'coordinates' => $coordinates,
            ]);
        }

        // Update data RT
        $rt->kecamatan_id = $validatedData['kecamatan_id'];
        $rt->kelurahan_id = $validatedData['kelurahan_id'];
        $rt->nomor = $validatedData['nomor'];
        $rt->color = $validatedData['color'];

        $rt->jumlah_jiwa = $validatedData['jumlah_jiwa'];
        $rt->kepadatan = $validatedData['kepadatan'];
        $rt->nilai_kekumuhan = $validatedData['nilai_kekumuhan'];
        $rt->nilai_pertimbangan_lain = $validatedData['nilai_pertimbangan_lain'];
        $rt->jumlah_kk = $validatedData['jumlah_kk'];
        $rt->tingkat = $validatedData['tingkat'];
        $rt->tingkat_status = $validatedData['tingkat_status'];
        $rt->prioritas = $validatedData['prioritas'];
        $rt->legalitas = $validatedData['legalitas'];
        $rt->luas_ha = $validatedData['luas_ha'];
        $rt->created_at = now();
        $rt->updated_at = now();

        // Simpan perubahan
        $rt->save();

        return redirect()->route('dashboard.rt.index')->with('success', 'Data RT berhasil disimpan.');
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
        // Mencari data RT berdasarkan ID
        $rt = Rt::findOrFail($id);
        $kelurahans = Kelurahan::all();
        $kecamatans = Kecamatan::all();
        // Mengembalikan view dengan data RT yang ditemukan
        return view('pages.admin.rt.edit', compact('rt', 'kelurahans', 'kecamatans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi input
        $validatedData = $request->validate([
            'kecamatan_id' => 'required|integer',
            'kelurahan_id' => 'required|integer',
            'nomor' => 'required|string',
            'color' => 'nullable|string',
            'geojson_file' => 'nullable|file|mimes:json',

            'jumlah_jiwa' => 'nullable|integer',
            'kepadatan' => 'nullable|string',
            'nilai_kekumuhan' => 'nullable|string',
            'nilai_pertimbangan_lain' => 'nullable|string',
            'jumlah_kk' => 'nullable|string',
            'tingkat' => 'nullable|string',
            'tingkat_status' => 'nullable|string',
            'prioritas' => 'nullable|string',
            'legalitas' => 'nullable|string',
            'luas_ha' => 'nullable|numeric|regex:/^\d+(\.\d{1,2})?$/',
        ]);

        // Mencari RT berdasarkan ID
        $rt = Rt::findOrFail($id);

        // Jika file GeoJSON diupload, simpan dan proses
        if ($request->hasFile('geojson_file')) {
            $geojsonPath = $request->file('geojson_file')->store('geojson'); // Simpan file di folder geojson
            $geojson = json_decode(file_get_contents(storage_path('app/' . $geojsonPath)), true);

            // Mendapatkan koordinat dari file GeoJSON
            $coordinates = $geojson['features'][0]['geometry']['coordinates'];

            // Cek apakah geometrinya adalah MultiPolygon
            if ($geojson['features'][0]['geometry']['type'] === 'MultiPolygon') {
                // Ambil seluruh koordinat
                $coordinates = $geojson['features'][0]['geometry']['coordinates'];
            } elseif ($geojson['features'][0]['geometry']['type'] === 'Polygon') {
                // Jika geometrinya Polygon, bungkus menjadi MultiPolygon
                $coordinates = [$geojson['features'][0]['geometry']['coordinates']];
            } else {
                return redirect()->back()->withErrors(['geojson_file' => 'GeoJSON harus berupa MultiPolygon atau Polygon.']);
            }

            // Update koordinat
            $rt->koordinat = json_encode([
                'type' => 'MultiPolygon',
                'coordinates' => $coordinates,
            ]);
        }

        // Update data RT
        $rt->kecamatan_id = $validatedData['kecamatan_id'];
        $rt->kelurahan_id = $validatedData['kelurahan_id'];
        $rt->nomor = $validatedData['nomor'];
        $rt->color = $validatedData['color'];

        $rt->jumlah_jiwa = $validatedData['jumlah_jiwa'];
        $rt->kepadatan = $validatedData['kepadatan'];
        $rt->nilai_kekumuhan = $validatedData['nilai_kekumuhan'];
        $rt->nilai_pertimbangan_lain = $validatedData['nilai_pertimbangan_lain'];
        $rt->jumlah_kk = $validatedData['jumlah_kk'];
        $rt->tingkat = $validatedData['tingkat'];
        $rt->tingkat_status = $validatedData['tingkat_status'];
        $rt->prioritas = $validatedData['prioritas'];
        $rt->legalitas = $validatedData['legalitas'];
        $rt->luas_ha = $validatedData['luas_ha'];
        $rt->updated_at = now();

        // Simpan perubahan
        $rt->save();

        return redirect()->route('dashboard.rt.index')->with('success', 'Data RT berhasil diperbarui.');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Mencari RT berdasarkan ID
        $rt = Rt::findOrFail($id);

        // Menghapus data RT
        $rt->delete();

        // Mengarahkan kembali dengan pesan sukses
        return redirect()->route('dashboard.rt.index')->with('success', 'Data RT berhasil dihapus.');
    }
}
