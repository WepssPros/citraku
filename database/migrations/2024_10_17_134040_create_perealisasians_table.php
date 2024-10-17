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
            // ADMIN
            $table->bigInteger('program_id')->nullable();
            $table->biginteger('kelurahan_id')->nullable();

            $table->string('opd_program')->nullable();


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
