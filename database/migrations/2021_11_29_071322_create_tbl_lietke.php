<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblLietke extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_lietke', function (Blueprint $table) {
            $table->increments('stt');
            $table->integer('id_thanhtoan');
            $table->string('Ho_ten');
            $table->integer('so_lan');
            $table->integer('gia_tien');
            $table->string('ngay_mua');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_lietke');
    }
}
