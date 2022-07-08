<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableDanhsachthi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('danhsachthi', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_hocsinh')->unsigned();
            $table->integer('id_lopthi')->unsigned();
            $table->foreign('id_hocsinh')->references('id')->on('hocsinh');
            $table->foreign('id_lopthi')->references('id')->on('lopthi');
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
        Schema::dropIfExists('danhsachthi');
    }
}
