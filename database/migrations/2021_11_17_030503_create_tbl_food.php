<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblFood extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_food', function (Blueprint $table) {
            $table->increments('id_mon_an');
            $table->integer('id_danh_muc');
            $table->string('ten_mon_an');
            $table->string('file_anh');
            $table->string('gia_tien');
            $table->string('ngay_up');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_food');
    }
}
