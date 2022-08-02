<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableBaithi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('baithi', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_hocsinh')->unsigned();
            $table->integer('id_dethi')->unsigned();
            $table->integer('socaudung')->nullable();
            $table->float('diem')->nullable();
            $table->dateTime('thoigianbd');
            $table->dateTime('thoigiankt')->nullable();
            $table->foreign('id_hocsinh')->references('id')->on('hocsinh');
            $table->foreign('id_dethi')->references('id')->on('dethi');
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
        Schema::dropIfExists('baithi');
    }
}
