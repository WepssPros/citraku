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
        Schema::create('rts', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('kecamatan_id')->nullable();
            $table->bigInteger('kelurahan_id')->nullable();
            $table->string('nomor')->nullable(); // Nama Kecamatan
            $table->json('koordinat'); // Koordinat dalam format JSON
            $table->string('color')->nullable(); // Koordinat dalam format JSON



            $table->biginteger('jumlah_jiwa')->nullable();
            $table->string('kepadatan')->nullable();
            $table->biginteger('nilai_kekumuhan')->nullable();
            $table->biginteger('nilai_pertimbangan_lain')->nullable();
            $table->bigInteger('jumlah_kk')->nullable();
            $table->string('tingkat')->nullable();
            $table->string('tingkat_status')->nullable();
            $table->string('prioritas')->nullable();
            $table->string('legalitas')->nullable();
            $table->decimal('luas_ha', 5, 2)->nullable();


            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rts');
    }
};
