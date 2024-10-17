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
        Schema::create('r_kegiatan_penanganans', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('perealisasian_id')->nullable();
            $table->biginteger('kegiatan_id')->nullable();

            $table->biginteger('keb_total_thn1')->nullable();
            $table->biginteger('keb_total_thn2')->nullable();
            $table->biginteger('keb_total_thn3')->nullable();
            $table->biginteger('keb_total_thn4')->nullable();
            $table->biginteger('keb_total_thn5')->nullable();
            $table->biginteger('keb_total')->nullable();

            $table->biginteger('indikasi_total_thn1')->nullable();
            $table->biginteger('indikasi_total_thn2')->nullable();
            $table->biginteger('indikasi_total_thn3')->nullable();
            $table->biginteger('indikasi_total_thn4')->nullable();
            $table->biginteger('indikasi_total_thn5')->nullable();

            $table->biginteger('indikasi_total')->nullable();

            // Sumber Pendaanaan / Pembiayaan

            $table->biginteger('spb_kota_total')->nullable();
            $table->biginteger('spb_provinsi_total')->nullable();
            $table->biginteger('spb_apbn_total')->nullable();

            $table->biginteger('spb_dak_total')->nullable();
            $table->biginteger('spb_swasta_total')->nullable();
            $table->biginteger('spb_masyarakat_total')->nullable();
            $table->string('opd_kegiatan')->nullable();

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('r_kegiatan_penanganans');
    }
};
