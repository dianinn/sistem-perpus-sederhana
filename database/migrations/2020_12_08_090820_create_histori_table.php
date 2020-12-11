<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoriTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('histori', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('peminjaman_id')->unsigned()->nullable();
            $table->integer('pengembalian_id')->unsigned()->nullable();
            $table->foreign('peminjaman_id')->references('id')->on('peminjaman');
            $table->foreign('pengembalian_id')->references('id')->on('pengembalian');
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
        Schema::dropIfExists('histori');
    }
}
