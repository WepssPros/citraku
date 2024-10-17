<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kegiatan;
use App\Models\KegiatanPenanganan;
use App\Models\Kelurahan;
use App\Models\Penanganan;
use App\Models\Program;
use App\Models\SubKegiatan;
use App\Models\SubKegiatanPenanganan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PenangananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penanganans = Penanganan::all();
        return view('pages.admin.penanganan.index', compact('penanganans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $penanganans = Penanganan::all();
        return view('pages.admin.opt-penanganan.penanganan', compact('penanganans'));
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

        // Ambil data KegiatanPenanganan beserta relasi yang diperlukan
        $kegiatanPenanganan = KegiatanPenanganan::with(['penanganan.program', 'kegiatan', 'subKegiatanPenanganans'])
            ->findOrFail($id);
        $subkegiatans = SubKegiatan::where('kegiatan_id', $kegiatanPenanganan->kegiatan_id)->get();


        // Kembalikan view dengan data yang diambil
        return view('pages.admin.penanganan.edit', compact('kegiatanPenanganan', 'subkegiatans'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Penanganan $penanganan)
    {
        $data = $request->all();

        // Menghapus simbol "Rp" dan pemisah ribuan (.) menggunakan preg_replace
        // Daftar input yang perlu diproses
        $fields = [

            'indikasi_thn1',
            'indikasi_thn2',
            'indikasi_thn3',
            'indikasi_thn4',
            'indikasi_thn5',

            'indikasi_total',

            'spb_kota',
            'spb_provinsi',
            'spb_apbn',
            'spb_dak',
            'spb_swasta',
            'spb_masyarakat',

        ];


        // Fungsi untuk membersihkan dan mengonversi nilai
        function cleanAndConvert($value)
        {
            // Menghapus 'Rp.' dan karakter lain dari string
            $cleanedValue = preg_replace('/[Rp.]/', '', $value);
            // Menghapus koma jika ada, kemudian mengonversi ke integer
            return intval(str_replace(',', '', $cleanedValue));
        }

        // Memproses setiap field
        foreach ($fields as $field) {
            if (isset($data[$field])) {
                $data[$field] = cleanAndConvert($data[$field]); // Memproses setiap field dan menyimpannya ke dalam $data
            }
        }
        $data['keb_thn1'] = $request->keb_thn1;
        $data['keb_thn2'] = $request->keb_thn2;
        $data['keb_thn3'] = $request->keb_thn3;
        $data['keb_thn4'] = $request->keb_thn4;
        $data['keb_thn5'] = $request->keb_thn5;




        // Menghitung total untuk program, kegiatan, dan sub-kegiatan
        $keb_total = 0;
        $indikasi_total = 0;


        $keb_total += $data['keb_thn1'] +
            $data['keb_thn2'] +
            $data['keb_thn3'] +
            $data['keb_thn4'] +
            $data['keb_thn5'];

        $indikasi_total += $data['indikasi_thn1'] +
            $data['indikasi_thn2'] +
            $data['indikasi_thn3'] +
            $data['indikasi_thn4'] +
            $data['indikasi_thn5'];


        // Menyimpan total ke dalam $data
        $data['keb_total'] = $keb_total;
        $data['indikasi_total'] = $indikasi_total;


        SubKegiatanPenanganan::create($data);
        // Melakukan update pada penanganan
        $penanganan->update();


        return back()->with('success', 'Data berhasil disimpan');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
