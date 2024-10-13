<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Penanganan extends Model
{
    use HasFactory, SoftDeletes;

    // Nama tabel
    protected $table = 'penanganans';

    // Kolom yang dapat diisi
    protected $fillable = [
        'program_id',
        'kegiatan_id',
        'sub_kegiatan_id',
        'kelurahan_id',
        'sat_program',
        'sat_kegiatan',
        'sat_sub_kegiatan',
        
        'keb_p_program_2025',
        'keb_p_program_2026',
        'keb_p_program_2027',
        'keb_p_program_2028',
        'keb_p_program_2029',

        'keb_p_kegiatan_2025',
        'keb_p_kegiatan_2026',
        'keb_p_kegiatan_2027',
        'keb_p_kegiatan_2028',
        'keb_p_kegiatan_2029',

        'keb_p_sub_kegiatan_2025',
        'keb_p_sub_kegiatan_2026',
        'keb_p_sub_kegiatan_2027',
        'keb_p_sub_kegiatan_2028',
        'keb_p_sub_kegiatan_2029',

        'keb_p_total_program',
        'keb_p_total_kegiatan',
        'keb_p_total_sub_kegiatan',

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
        
        'ind_b_total_program',
        'ind_b_total_kegiatan',
        'ind_b_total_sub_kegiatan',

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
        
        'opd_program',
        'opd_kegiatan',
        'opd_sub_kegiatan',
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
