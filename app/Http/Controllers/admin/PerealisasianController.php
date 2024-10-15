<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kegiatan;
use App\Models\Kelurahan;
use App\Models\Perealisasian;
use App\Models\Program;
use App\Models\SubKegiatan;
use Illuminate\Http\Request;

class PerealisasianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $perealisasians = Perealisasian::all();
        return view('pages.admin.perealisasian.index', compact('perealisasians'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $perealisasians = Perealisasian::all();
        return view('pages.admin.opt-penanganan.perealisasian', compact('perealisasians'));
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
        $perealisasian = Perealisasian::findOrFail($id);

        // Jika Anda perlu memuat data terkait lainnya, misalnya program, kegiatan, sub kegiatan, dan kelurahan
        $programs = Program::all();
        $kegiatans = Kegiatan::all();
        $subkegiatans = SubKegiatan::all();
        $kelurahans = Kelurahan::all();

        // Kembalikan view dengan data yang diambil
        return view('pages.admin.perealisasian.edit', compact('perealisasian', 'programs', 'kegiatans', 'subkegiatans', 'kelurahans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Perealisasian $perealisasian)
    {
        $data = $request->all();

        // Menghapus simbol "Rp" dan pemisah ribuan (.) menggunakan preg_replace
        // Daftar input yang perlu diproses
        $fields = [
            'r_ind_b_program_2025',
            'r_ind_b_program_2026',
            'r_ind_b_program_2027',
            'r_ind_b_program_2028',
            'r_ind_b_program_2029',

            'r_ind_b_kegiatan_2025',
            'r_ind_b_kegiatan_2026',
            'r_ind_b_kegiatan_2027',
            'r_ind_b_kegiatan_2028',
            'r_ind_b_kegiatan_2029',

            'r_ind_b_sub_kegiatan_2025',
            'r_ind_b_sub_kegiatan_2026',
            'r_ind_b_sub_kegiatan_2027',
            'r_ind_b_sub_kegiatan_2028',
            'r_ind_b_sub_kegiatan_2029',

            'r_sp_kota_program',
            'r_sp_kota_kegiatan',
            'r_sp_kota_sub_kegiatan',

            'r_sp_provinsi_program',
            'r_sp_provinsi_kegiatan',
            'r_sp_provinsi_sub_kegiatan',

            'r_sp_apbn_program',
            'r_sp_apbn_kegiatan',
            'r_sp_apbn_sub_kegiatan',

            'r_sp_dak_program',
            'r_sp_dak_kegiatan',
            'r_sp_dak_sub_kegiatan',

            'r_sp_swasta_program',
            'r_sp_swasta_kegiatan',
            'r_sp_swasta_sub_kegiatan',

            'r_sp_masyarakat_program',
            'r_sp_masyarakat_kegiatan',
            'r_sp_masyarakat_sub_kegiatan',

            'r_ind_b_total_program',
            'r_ind_b_total_kegiatan',
            'r_ind_b_total_sub_kegiatan',
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

        $totalProgram += $data['r_ind_b_program_2025'] +
            $data['r_ind_b_program_2026'] +
            $data['r_ind_b_program_2027'] +
            $data['r_ind_b_program_2028'] +
            $data['r_ind_b_program_2029'];

        $totalKegiatan += $data['r_ind_b_kegiatan_2025'] +
            $data['r_ind_b_kegiatan_2026'] +
            $data['r_ind_b_kegiatan_2027'] +
            $data['r_ind_b_kegiatan_2028'] +
            $data['r_ind_b_kegiatan_2029'];

        $totalSubKegiatan += $data['r_ind_b_sub_kegiatan_2025'] +
            $data['r_ind_b_sub_kegiatan_2026'] +
            $data['r_ind_b_sub_kegiatan_2027'] +
            $data['r_ind_b_sub_kegiatan_2028'] +
            $data['r_ind_b_sub_kegiatan_2029'];

        // Menyimpan total ke dalam $data
        $data['r_ind_b_total_program'] = $totalProgram;
        $data['r_ind_b_total_kegiatan'] = $totalKegiatan;
        $data['r_ind_b_total_sub_kegiatan'] = $totalSubKegiatan;

        $data['r_keb_p_total_program'] = $request->r_keb_p_program_2025 +  $request->r_keb_p_program_2026 + $request->r_keb_p_program_2027 + $request->r_keb_p_program_2028 + $request->r_keb_p_program_2029;
        $data['r_keb_p_total_kegiatan'] = $request->r_keb_p_kegiatan_2025 +  $request->r_keb_p_kegiatan_2026 + $request->r_keb_p_kegiatan_2027 + $request->r_keb_p_kegiatan_2028 + $request->r_keb_p_kegiatan_2029;
        $data['r_keb_p_total_sub_kegiatan'] = $request->r_keb_p_sub_kegiatan_2025 +  $request->r_keb_p_sub_kegiatan_2026 + $request->r_keb_p_sub_kegiatan_2027 + $request->r_keb_p_sub_kegiatan_2028 + $request->r_keb_p_sub_kegiatan_2029;

        // Melakukan update pada penanganan
        $perealisasian->update($data);


        return redirect()->route('dashboard.perealisasian.edit', $perealisasian->id)->with('success', 'Data berhasil disimpan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
