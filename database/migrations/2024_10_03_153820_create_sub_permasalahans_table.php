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
        Schema::create('sub_permasalahans', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('kelurahan_id')->nullable();
            
            $table->string('header_no_1')->nullable();
            $table->text('text_1');
            $table->string('header_no_2')->nullable();
            $table->text('text_2');
            $table->string('header_no_3')->nullable();
            $table->text('text_3');
            $table->string('header_no_4')->nullable();
            $table->text('text_4');
            $table->string('header_no_5')->nullable();
            $table->text('text_5');
            $table->string('header_no_6')->nullable();
            $table->text('text_6');
            $table->string('header_no_7')->nullable();
            $table->text('text_7');
            $table->string('header_no_8')->nullable();
            $table->text('text_8');
            $table->string('header_no_9')->nullable();
            $table->text('text_9');
            $table->string('header_no_10')->nullable();
            $table->text('text_10');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_permasalahans');
    }
};
