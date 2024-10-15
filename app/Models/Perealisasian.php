<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Perealisasian extends Model
{
    use HasFactory, SoftDeletes;

    // Nama tabel
    protected $table = 'perealisasians';

    // Kolom yang dapat diisi
    protected $fillable = [
        'program_id',
        'kegiatan_id',
        'sub_kegiatan_id',
        'kelurahan_id',
        'sat_program',
        'sat_kegiatan',
        'sat_sub_kegiatan',

        'r_keb_p_program_2025',
        'r_keb_p_program_2026',
        'r_keb_p_program_2027',
        'r_keb_p_program_2028',
        'r_keb_p_program_2029',

        'r_keb_p_kegiatan_2025',
        'r_keb_p_kegiatan_2026',
        'r_keb_p_kegiatan_2027',
        'r_keb_p_kegiatan_2028',
        'r_keb_p_kegiatan_2029',

        'r_keb_p_sub_kegiatan_2025',
        'r_keb_p_sub_kegiatan_2026',
        'r_keb_p_sub_kegiatan_2027',
        'r_keb_p_sub_kegiatan_2028',
        'r_keb_p_sub_kegiatan_2029',

        'r_keb_p_total_program',
        'r_keb_p_total_kegiatan',
        'r_keb_p_total_sub_kegiatan',

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

        'r_ind_b_total_program',
        'r_ind_b_total_kegiatan',
        'r_ind_b_total_sub_kegiatan',

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

        'r_opd_program',
        'r_opd_kegiatan',
        'r_opd_sub_kegiatan',
    ];

    public function program()
    {
        return $this->belongsTo(Program::class, 'program_id');
    }
    public function kegiatan()
    {
        return $this->belongsTo(Kegiatan::class, 'kegiatan_id');
    }
    public function subkegiatan()
    {
        return $this->belongsTo(SubKegiatan::class, 'sub_kegiatan_id');
    }
    public function kelurahan()
    {
        return $this->belongsTo(Kelurahan::class, 'kelurahan_id');
    }
}
