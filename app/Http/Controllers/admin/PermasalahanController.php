<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Kelurahan;
use App\Models\PermasalahanUtama;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PermasalahanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permasalahans = PermasalahanUtama::with('kelurahan')->get();
        return view('pages.admin.permasalahan.index', compact('permasalahans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kelurahans = Kelurahan::all();
        return view('pages.admin.permasalahan.create', compact('kelurahans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kelurahan_id' => 'required|exists:kelurahans,id',
            'permasalahan_utama' => 'required|string',
            'foto_1' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10000',
            'foto_2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10000',
            'foto_3' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10000',
            'foto_4' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10000',
            'foto_5' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10000',
            'kategori_kumuh' => 'required|string|max:255',
            'tipologi_kumuh' => 'required|string|max:255',
            'karakteristik' => 'required|string',
        ]);

        // Upload foto
        foreach (range(1, 5) as $num) {
            if ($request->hasFile('foto_' . $num)) {
                $validatedData['foto_' . $num] = $request->file('foto_' . $num)->store('permasalahan_utamas/fotos', 'public');
            }
        }

        PermasalahanUtama::create($validatedData);

        return redirect()->route('dashboard.permasalahan.index')->with('success', 'Permasalahan utama berhasil ditambahkan.');
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
        $permasalahan = PermasalahanUtama::findOrFail($id);
        // Ambil semua kelurahan jika perlu
        $kelurahans = Kelurahan::all(); // Sesuaikan dengan model Anda
        return view('pages.admin.permasalahan.edit', compact('permasalahan', 'kelurahans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'kelurahan_id' => 'required|exists:kelurahans,id',
            'permasalahan_utama' => 'required|string',
            'foto_1' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'foto_2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'foto_3' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'foto_4' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'foto_5' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'kategori_kumuh' => 'required|string',
            'tipologi_kumuh' => 'required|string',
            'karakteristik' => 'required|string',
        ]);

        $item = PermasalahanUtama::findOrFail($id);
        $item->kelurahan_id = $request->kelurahan_id;
        $item->permasalahan_utama = $request->permasalahan_utama;
        $item->kategori_kumuh = $request->kategori_kumuh;
        $item->tipologi_kumuh = $request->tipologi_kumuh;
        $item->karakteristik = $request->karakteristik;

        // Proses upload foto jika ada
        for ($i = 1; $i <= 5; $i++) {
            if ($request->hasFile("foto_$i")) {
                // Hapus foto yang lama jika perlu
                if ($item->{"foto_$i"}) {
                    Storage::delete($item->{"foto_$i"});
                }
                // Simpan foto baru
                $item->{"foto_$i"} = $request->file("foto_$i")->store('uploads', 'public');
            }
        }

        $item->save();

        return redirect()->route('dashboard.permasalahan.index')->with('success', 'Data berhasil diperbarui');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PermasalahanUtama $permasalahanUtama)
    {
        // Hapus foto terkait
        foreach (range(1, 5) as $num) {
            if ($permasalahanUtama->{'foto_' . $num}) {
                Storage::disk('public')->delete($permasalahanUtama->{'foto_' . $num});
            }
        }

        // Soft delete data
        $permasalahanUtama->delete();

        return redirect()->back()->with('success', 'Permasalahan utama berhasil dihapus.');
    }
}
