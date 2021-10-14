<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuruTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guru', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('nip')->unique();
            // $table->string('nama');
            $table->string('tempat_lahir');
            $table->datetime('tanggal_lahir');
            $table->string('jenis_kelamin');
            $table->string('agama');
            $table->text('alamat');
            $table->string('pendidikan_terakhir');
            $table->string('no_tlp_guru');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('guru');
    }
}
