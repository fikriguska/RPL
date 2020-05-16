<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class LaranganKonsumsi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('larangan_konsumsi', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_komposisi')->unsigned();
            $table->foreign('id_komposisi')->references('id')->on('komposisi');
            $table->integer('id_penyakit')->unsigned();
            $table->foreign('id_penyakit')->references('id')->on('penyakit');
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
        //
    }
}
