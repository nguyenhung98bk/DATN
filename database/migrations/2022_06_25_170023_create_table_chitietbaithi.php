<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableChitietbaithi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chitietbaithi', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_baithi')->unsigned();
            $table->integer('id_cauhoi')->unsigned();
            $table->integer('dapanhs')->nullable();
            $table->integer('dungsai')->nullable();
            $table->foreign('id_baithi')->references('id')->on('baithi');
            $table->foreign('id_cauhoi')->references('id')->on('cauhoi');
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
        Schema::dropIfExists('chitietbaithi');
    }
}
