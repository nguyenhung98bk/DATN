<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableLopthi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lopthi', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tenlop');
            $table->integer('id_monhoc')->unsigned();
            $table->integer('id_giaovien')->unsigned();
            $table->dateTime('thoigianbd');
            $table->dateTime('thoigiankt');
            $table->foreign('id_monhoc')->references('id')->on('monhoc');
            $table->foreign('id_giaovien')->references('id')->on('giaovien');
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
        Schema::dropIfExists('lopthi');
    }
}
