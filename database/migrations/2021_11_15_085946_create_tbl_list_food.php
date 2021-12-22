<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblListFood extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_list_food', function (Blueprint $table) {
            $table->increments('id_mon_an');
            $table->string('ten_mon_an');
            $table->string('gia_tien');
            $table->string('file_anh');
            $table->date('ngay_up');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_list_food');
    }
}
