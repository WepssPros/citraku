<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('perealisasians', function (Blueprint $table) {
            $table->id();


            $table->bigInteger('program_id')->nullable();
            $table->biginteger('kegiatan_id')->nullable();
            $table->biginteger('sub_kegiatan_id')->nullable();
            $table->biginteger('kelurahan_id')->nullable();

            // OPD
            $table->string('sat_program')->nullable();
            $table->string('sat_kegiatan')->nullable();
            $table->string('sat_sub_kegiatan')->nullable();

            $table->biginteger('r_keb_p_program_2025')->nullable();
            $table->biginteger('r_keb_p_program_2026')->nullable();
            $table->biginteger('r_keb_p_program_2027')->nullable();
            $table->biginteger('r_keb_p_program_2028')->nullable();
            $table->biginteger('r_keb_p_program_2029')->nullable();

            $table->biginteger('r_keb_p_kegiatan_2025')->nullable();
            $table->biginteger('r_keb_p_kegiatan_2026')->nullable();
            $table->biginteger('r_keb_p_kegiatan_2027')->nullable();
            $table->biginteger('r_keb_p_kegiatan_2028')->nullable();
            $table->biginteger('r_keb_p_kegiatan_2029')->nullable();

            $table->biginteger('r_keb_p_sub_kegiatan_2025')->nullable();
            $table->biginteger('r_keb_p_sub_kegiatan_2026')->nullable();
            $table->biginteger('r_keb_p_sub_kegiatan_2027')->nullable();
            $table->biginteger('r_keb_p_sub_kegiatan_2028')->nullable();
            $table->biginteger('r_keb_p_sub_kegiatan_2029')->nullable();

            $table->biginteger('r_keb_p_total_program')->nullable();
            $table->biginteger('r_keb_p_total_kegiatan')->nullable();
            $table->biginteger('r_keb_p_total_sub_kegiatan')->nullable();

            // Indikasi biayan
            $table->biginteger('r_ind_b_program_2025')->nullable();
            $table->biginteger('r_ind_b_program_2026')->nullable();
            $table->biginteger('r_ind_b_program_2027')->nullable();
            $table->biginteger('r_ind_b_program_2028')->nullable();
            $table->biginteger('r_ind_b_program_2029')->nullable();

            $table->biginteger('r_ind_b_kegiatan_2025')->nullable();
            $table->biginteger('r_ind_b_kegiatan_2026')->nullable();
            $table->biginteger('r_ind_b_kegiatan_2027')->nullable();
            $table->biginteger('r_ind_b_kegiatan_2028')->nullable();
            $table->biginteger('r_ind_b_kegiatan_2029')->nullable();

            $table->biginteger('r_ind_b_sub_kegiatan_2025')->nullable();
            $table->biginteger('r_ind_b_sub_kegiatan_2026')->nullable();
            $table->biginteger('r_ind_b_sub_kegiatan_2027')->nullable();
            $table->biginteger('r_ind_b_sub_kegiatan_2028')->nullable();
            $table->biginteger('r_ind_b_sub_kegiatan_2029')->nullable();

            $table->biginteger('r_ind_b_total_program')->nullable();
            $table->biginteger('r_ind_b_total_kegiatan')->nullable();
            $table->biginteger('r_ind_b_total_sub_kegiatan')->nullable();

            // Sumber Pendaanaan / Pembiayaan

            $table->string('r_sp_kota_program')->nullable();
            $table->string('r_sp_kota_kegiatan')->nullable();
            $table->string('r_sp_kota_sub_kegiatan')->nullable();

            $table->string('r_sp_provinsi_program')->nullable();
            $table->string('r_sp_provinsi_kegiatan')->nullable();
            $table->string('r_sp_provinsi_sub_kegiatan')->nullable();

            $table->string('r_sp_apbn_program')->nullable();
            $table->string('r_sp_apbn_kegiatan')->nullable();
            $table->string('r_sp_apbn_sub_kegiatan')->nullable();

            $table->string('r_sp_dak_program')->nullable();
            $table->string('r_sp_dak_kegiatan')->nullable();
            $table->string('r_sp_dak_sub_kegiatan')->nullable();

            $table->string('r_sp_swasta_program')->nullable();
            $table->string('r_sp_swasta_kegiatan')->nullable();
            $table->string('r_sp_swasta_sub_kegiatan')->nullable();

            $table->string('r_sp_masyarakat_program')->nullable();
            $table->string('r_sp_masyarakat_kegiatan')->nullable();
            $table->string('r_sp_masyarakat_sub_kegiatan')->nullable();

            // OPD

            $table->string('r_opd_program')->nullable();
            $table->string('r_opd_kegiatan')->nullable();
            $table->string('r_opd_sub_kegiatan')->nullable();

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perealisasians');
    }
};
