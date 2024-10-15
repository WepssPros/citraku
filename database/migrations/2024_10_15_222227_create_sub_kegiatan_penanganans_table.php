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
        Schema::create('sub_kegiatan_penanganans', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('penanganan_id')->nullable();
            $table->bigInteger('program_id')->nullable();
            $table->bigInteger('kegiatan_id')->nullable();

            $table->biginteger('keb_total_thn1')->nullable();
            $table->biginteger('keb_total_thn2')->nullable();
            $table->biginteger('keb_total_thn3')->nullable();
            $table->biginteger('keb_total_thn4')->nullable();
            $table->biginteger('keb_total_thn5')->nullable();
            $table->biginteger('keb_total_program')->nullable();

            $table->biginteger('indikasi_thn1')->nullable();
            $table->biginteger('indikasi_thn2')->nullable();
            $table->biginteger('indikasi_thn3')->nullable();
            $table->biginteger('indikasi_thn4')->nullable();
            $table->biginteger('indikasi_thn5')->nullable();

            $table->biginteger('indikasi_total')->nullable();

            // Sumber Pendaanaan / Pembiayaan

            $table->biginteger('sp_kota_total')->nullable();
            $table->biginteger('sp_provinsi_total')->nullable();
            $table->biginteger('sp_apbn_total')->nullable();

            $table->biginteger('sp_dak_total')->nullable();
            $table->biginteger('sp_swasta_total')->nullable();
            $table->biginteger('sp_masyarakat_total')->nullable();

            $table->string('header')->nullable();;
            $table->string('opd')->nullable();

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_kegiatan_penanganans');
    }
};
