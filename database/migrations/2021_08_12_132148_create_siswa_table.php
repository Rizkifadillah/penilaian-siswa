<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswa', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('kelas_id');
            $table->string('nis')->unique();
            // $table->string('nama');
            $table->string('tempat_lahir');
            $table->datetime('tanggal_lahir');
            $table->string('jenis_kelamin');
            $table->string('agama');
            $table->text('alamat');
            $table->string('no_tlp_siswa');
            $table->string('nama_ayah');
            $table->string('nama_ibu');
            $table->text('alamat_ortu');
            $table->string('no_tlp_ortu');
            $table->string('pekerjaan_ayah');
            $table->string('pekerjaan_ibu');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('kelas_id')->references('id')->on('kelas')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('siswa');
    }
}
