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
        Schema::create('permasalahan_utamas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('kelurahan_id')->nullable();
            $table->text('permasalahan_utama')->nullable();
            $table->text('foto_1')->nullable();
            $table->text('foto_2')->nullable();
            $table->text('foto_3')->nullable();
            $table->text('foto_4')->nullable();
            $table->text('foto_5')->nullable();

            $table->string('kategori_kumuh')->nullable();
            $table->string('tipologi_kumuh')->nullable();
            $table->string('karakteristik')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permasalahan_utamas');
    }
};
