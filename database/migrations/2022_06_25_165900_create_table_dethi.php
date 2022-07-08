<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableDethi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dethi', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_lopthi')->unsigned();
            $table->integer('socaude');
            $table->integer('socautb');
            $table->integer('socaukho');
            $table->integer('thoigian');
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
        Schema::dropIfExists('dethi');
    }
}
