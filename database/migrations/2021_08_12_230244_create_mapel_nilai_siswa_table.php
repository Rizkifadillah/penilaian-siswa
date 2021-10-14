<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMapelNilaiSiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mapel_nilai_siswa', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('siswa_id');
            $table->unsignedBigInteger('mapel_id');
            $table->integer('tugas_harian');
            $table->integer('uts');
            $table->integer('uas');
            $table->integer('hasil');
            $table->timestamps();

            $table->foreign('siswa_id')->references('id')->on('siswa')->onDelete('cascade');
            $table->foreign('mapel_id')->references('id')->on('mapel')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mapel_nilai_siswa');
    }
}
