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

            $table->biginteger('kegiatan_penanganan_id')->nullable();

            $table->bigInteger('sub_kegiatan_id')->nullable();
            $table->string('sat_sub_kegiatan')->nullable();
            $table->biginteger('keb_thn1')->nullable();
            $table->biginteger('keb_thn2')->nullable();
            $table->biginteger('keb_thn3')->nullable();
            $table->biginteger('keb_thn4')->nullable();
            $table->biginteger('keb_thn5')->nullable();
            $table->biginteger('keb_total')->nullable();

            $table->biginteger('indikasi_thn1')->nullable();
            $table->biginteger('indikasi_thn2')->nullable();
            $table->biginteger('indikasi_thn3')->nullable();
            $table->biginteger('indikasi_thn4')->nullable();
            $table->biginteger('indikasi_thn5')->nullable();

            $table->biginteger('indikasi_total')->nullable();

            // Sumber Pendaanaan / Pembiayaan

            $table->biginteger('spb_kota')->nullable();
            $table->biginteger('spb_provinsi')->nullable();
            $table->biginteger('spb_apbn')->nullable();

            $table->biginteger('spb_dak')->nullable();
            $table->biginteger('spb_swasta')->nullable();
            $table->biginteger('spb_masyarakat')->nullable();

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
