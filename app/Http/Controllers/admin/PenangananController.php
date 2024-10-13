<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kegiatan;
use App\Models\Kelurahan;
use App\Models\Penanganan;
use App\Models\Program;
use App\Models\SubKegiatan;
use Illuminate\Http\Request;

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
    public function update(Request $request, string $id)
    {
        // Validasi input
        // Validasi input
        $request->validate([
            'keb_p_program_2025' => 'nullable|numeric',
            'keb_p_program_2026' => 'nullable|numeric',
            'keb_p_program_2027' => 'nullable|numeric',
            'keb_p_program_2028' => 'nullable|numeric',
            'keb_p_program_2029' => 'nullable|numeric',

            'keb_p_kegiatan_2025' => 'nullable|numeric',
            'keb_p_kegiatan_2026' => 'nullable|numeric',
            'keb_p_kegiatan_2027' => 'nullable|numeric',
            'keb_p_kegiatan_2028' => 'nullable|numeric',
            'keb_p_kegiatan_2029' => 'nullable|numeric',

            'keb_p_sub_kegiatan_2025' => 'nullable|numeric',
            'keb_p_sub_kegiatan_2026' => 'nullable|numeric',
            'keb_p_sub_kegiatan_2027' => 'nullable|numeric',
            'keb_p_sub_kegiatan_2028' => 'nullable|numeric',
            'keb_p_sub_kegiatan_2029' => 'nullable|numeric',

            // Total kebijakan
            'keb_p_total_program' => 'nullable|numeric',
            'keb_p_total_kegiatan' => 'nullable|numeric',
            'keb_p_total_sub_kegiatan' => 'nullable|numeric',

            // Indikator berdasarkan tahun
            'ind_b_program_2025' => 'nullable|numeric',
            'ind_b_program_2026' => 'nullable|numeric',
            'ind_b_program_2027' => 'nullable|numeric',
            'ind_b_program_2028' => 'nullable|numeric',
            'ind_b_program_2029' => 'nullable|numeric',

            'ind_b_kegiatan_2025' => 'nullable|numeric',
            'ind_b_kegiatan_2026' => 'nullable|numeric',
            'ind_b_kegiatan_2027' => 'nullable|numeric',
            'ind_b_kegiatan_2028' => 'nullable|numeric',
            'ind_b_kegiatan_2029' => 'nullable|numeric',

            'ind_b_sub_kegiatan_2025' => 'nullable|numeric',
            'ind_b_sub_kegiatan_2026' => 'nullable|numeric',
            'ind_b_sub_kegiatan_2027' => 'nullable|numeric',
            'ind_b_sub_kegiatan_2028' => 'nullable|numeric',
            'ind_b_sub_kegiatan_2029' => 'nullable|numeric',

            // Sumber pendanaan
            'sp_kota_program' => 'nullable|numeric',
            'sp_kota_kegiatan' => 'nullable|numeric',
            'sp_kota_sub_kegiatan' => 'nullable|numeric',

            'sp_provinsi_program' => 'nullable|numeric',
            'sp_provinsi_kegiatan' => 'nullable|numeric',
            'sp_provinsi_sub_kegiatan' => 'nullable|numeric',

            'sp_apbn_program' => 'nullable|numeric',
            'sp_apbn_kegiatan' => 'nullable|numeric',
            'sp_apbn_sub_kegiatan' => 'nullable|numeric',

            'sp_dak_program' => 'nullable|numeric',
            'sp_dak_kegiatan' => 'nullable|numeric',
            'sp_dak_sub_kegiatan' => 'nullable|numeric',

            'sp_swasta_program' => 'nullable|numeric',
            'sp_swasta_kegiatan' => 'nullable|numeric',
            'sp_swasta_sub_kegiatan' => 'nullable|numeric',

            'sp_masyarakat_program' => 'nullable|numeric',
            'sp_masyarakat_kegiatan' => 'nullable|numeric',
            'sp_masyarakat_sub_kegiatan' => 'nullable|numeric',

            'opd_program' => 'nullable|numeric',
            'opd_kegiatan' => 'nullable|numeric',
            'opd_sub_kegiatan' => 'nullable|numeric',
        ]);

        // Cari data Penanganan berdasarkan ID
        $penanganan = Penanganan::findOrFail($id);

        // Update properti yang diinginkan
        $penanganan->program_id = $penanganan->program->id;
        $penanganan->kegiatan_id = $penanganan->kegiatan->id;
        $penanganan->sub_kegiatan_id = $penanganan->subkegiatan->id;
        $penanganan->kelurahan_id = $penanganan->kelurahan->id;
        $penanganan->sat_program = $penanganan->sat_program;
        $penanganan->sat_kegiatan = $penanganan->sat_kegiatan;
        $penanganan->sat_sub_kegiatan = $penanganan->sat_sub_kegiatan;

        // total  keb_program *
        $penanganan->keb_p_total_program = $request->keb_p_program_2025 +  $request->keb_p_program_2026 +  $request->keb_p_program_2027 +  $request->keb_p_program_2028 +  $request->keb_p_program_2029;
        $penanganan->keb_p_total_kegiatan = $request->keb_p_kegiatan_2025 +  $request->keb_p_kegiatan_2026 +  $request->keb_p_kegiatan_2027 +  $request->keb_p_kegiatan_2028 +  $request->keb_p_kegiatan_2029;
        $penanganan->keb_p_total_sub_kegiatan = $request->keb_p_sub_kegiatan_2025 +  $request->keb_p_sub_kegiatan_2026 +  $request->keb_p_sub_kegiatan_2027 +  $request->keb_p_sub_kegiatan_2028 +  $request->keb_p_sub_kegiatan_2029;
        // Update data penanganan dengan data dari request
        $penanganan->update($request->all());

        // Redirect kembali dengan pesan sukses
        return back()->with('success', 'Data penanganan berhasil diupdate!');

        // Redirect kembali dengan pesan sukses

    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
