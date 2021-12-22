<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblDonhang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_donhang', function (Blueprint $table) {
            $table->increments('id_donhang');
            $table->integer('id_taikhoan');
            $table->string('Ho_ten');
            $table->string('dia_chi');
            $table->string('sdt');
            $table->integer('tong_tien');
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
        Schema::dropIfExists('tbl_donhang');
    }
}
