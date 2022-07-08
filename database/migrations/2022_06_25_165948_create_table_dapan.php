<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableDapan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dapan', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_cauhoi')->unsigned();
            $table->string('noidung');
            $table->integer('dungsai');
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
        Schema::dropIfExists('dapan');
    }
}
