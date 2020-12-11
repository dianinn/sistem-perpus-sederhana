<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeminjamanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peminjaman', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('user_id')->unsigned();
            $table->integer('anggota_id')->unsigned();
            $table->integer('buku_id')->unsigned();
            $table->string('tgl_pinjam');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('anggota_id')->references('id')->on('anggota');
            $table->foreign('buku_id')->references('id')->on('buku');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peminjaman');
    }
}
