<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblThongbaoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_thongbao', function (Blueprint $table) {
            $table->id();
            $table->BigInteger('ID_DonHang')->unsigned();
            $table->foreign('ID_DonHang')->references('id')->on('tbl_donhang');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_thongbao');
    }
}
