<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kegiatan;
use App\Models\Kelurahan;
use App\Models\Penanganan;
use App\Models\Program;
use App\Models\SubKegiatan;
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
        return view('pages.admin.opt-penanganan.index', compact('penanganans'));
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
        // Ambil data penanganan berdasarkan ID
        $penanganan = Penanganan::findOrFail($id);

        // Jika Anda perlu memuat data terkait lainnya, misalnya program, kegiatan, sub kegiatan, dan kelurahan
        $programs = Program::all();
        $kegiatans = Kegiatan::all();
        $subkegiatans = SubKegiatan::all();
        $kelurahans = Kelurahan::all();

        // Kembalikan view dengan data yang diambil
        return view('pages.admin.penanganan.edit', compact('penanganan', 'programs', 'kegiatans', 'subkegiatans', 'kelurahans'));
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
            'ind_b_program_2025',
            'ind_b_program_2026',
            'ind_b_program_2027',
            'ind_b_program_2028',
            'ind_b_program_2029',

            'ind_b_kegiatan_2025',
            'ind_b_kegiatan_2026',
            'ind_b_kegiatan_2027',
            'ind_b_kegiatan_2028',
            'ind_b_kegiatan_2029',

            'ind_b_sub_kegiatan_2025',
            'ind_b_sub_kegiatan_2026',
            'ind_b_sub_kegiatan_2027',
            'ind_b_sub_kegiatan_2028',
            'ind_b_sub_kegiatan_2029',

            'sp_kota_program',
            'sp_kota_kegiatan',
            'sp_kota_sub_kegiatan',

            'sp_provinsi_program',
            'sp_provinsi_kegiatan',
            'sp_provinsi_sub_kegiatan',

            'sp_apbn_program',
            'sp_apbn_kegiatan',
            'sp_apbn_sub_kegiatan',

            'sp_dak_program',
            'sp_dak_kegiatan',
            'sp_dak_sub_kegiatan',

            'sp_swasta_program',
            'sp_swasta_kegiatan',
            'sp_swasta_sub_kegiatan',

            'sp_masyarakat_program',
            'sp_masyarakat_kegiatan',
            'sp_masyarakat_sub_kegiatan',

            'ind_b_total_program',
            'ind_b_total_kegiatan',
            'ind_b_total_sub_kegiatan',
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

        // Menghitung total untuk program, kegiatan, dan sub-kegiatan
        $totalProgram = 0;
        $totalKegiatan = 0;
        $totalSubKegiatan = 0;

        $totalProgram += $data['ind_b_program_2025'] +
            $data['ind_b_program_2026'] +
            $data['ind_b_program_2027'] +
            $data['ind_b_program_2028'] +
            $data['ind_b_program_2029'];

        $totalKegiatan += $data['ind_b_kegiatan_2025'] +
            $data['ind_b_kegiatan_2026'] +
            $data['ind_b_kegiatan_2027'] +
            $data['ind_b_kegiatan_2028'] +
            $data['ind_b_kegiatan_2029'];

        $totalSubKegiatan += $data['ind_b_sub_kegiatan_2025'] +
            $data['ind_b_sub_kegiatan_2026'] +
            $data['ind_b_sub_kegiatan_2027'] +
            $data['ind_b_sub_kegiatan_2028'] +
            $data['ind_b_sub_kegiatan_2029'];

        // Menyimpan total ke dalam $data
        $data['ind_b_total_program'] = $totalProgram;
        $data['ind_b_total_kegiatan'] = $totalKegiatan;
        $data['ind_b_total_sub_kegiatan'] = $totalSubKegiatan;

        // Melakukan update pada penanganan
        $penanganan->update($data);


        return redirect()->route('dashboard.penanganan.edit', $penanganan->id)->with('success', 'Data berhasil disimpan');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
