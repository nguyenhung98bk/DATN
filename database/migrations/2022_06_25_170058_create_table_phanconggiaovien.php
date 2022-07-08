<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePhanconggiaovien extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phanconggiaovien', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_giaovien')->unsigned();
            $table->integer('id_monhoc')->unsigned();
            $table->foreign('id_giaovien')->references('id')->on('giaovien');
            $table->foreign('id_monhoc')->references('id')->on('monhoc');
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
        Schema::dropIfExists('phanconggiaovien');
    }
}
