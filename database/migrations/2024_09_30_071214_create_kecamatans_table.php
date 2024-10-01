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
        Schema::create('kecamatans', function (Blueprint $table) {
            $table->id();
            $table->string('nama'); 
            $table->json('koordinat');
            $table->json('marker')->nullable(); 
            $table->string('color')->nullable(); 
            $table->string('luas_wilayah')->nullable();
            $table->string('persentase')->nullable();
            $table->string('jml_kelurahan')->nullable();
            $table->string('jumlah_rt')->nullable();

            $table->softDeletes();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kecamatans');
    }
};
