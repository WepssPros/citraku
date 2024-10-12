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
        Schema::create('sub_kegiatans', function (Blueprint $table) {
            $table->id();
            $table->string('kode')->nullable();
            $table->bigInteger('kegiatan_id')->nullable();
            $table->text('sub_kegiatan')->nullable();
            $table->text('kinerja')->nullable();
            $table->text('indikator')->nullable();
            $table->text('satuan')->nullable();

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_kegiatans');
    }
};
