<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblChitietdonhangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_chitietdonhang', function (Blueprint $table) {
            $table->id();
            $table->integer('Gia');
            $table->integer('SoLuong');
            $table->integer('TongTien');
            $table->BigInteger('ID_DonHang')->unsigned();
            $table->BigInteger('ID_SanPham')->unsigned();
            $table->foreign('ID_DonHang')->references('id')->on('tbl_donhang');
            $table->foreign('ID_SanPham')->references('id')->on('tbl_sanpham');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_chitietdonhang');
    }
}
