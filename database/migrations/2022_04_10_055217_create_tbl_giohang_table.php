<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblGiohangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_giohang', function (Blueprint $table) {
            $table->id();
            $table->integer('SoLuong');
            $table->BigInteger('ID_KhachHang')->unsigned();
            $table->BigInteger('ID_SanPham')->unsigned();
            $table->foreign('ID_KhachHang')->references('id')->on('tbl_khachhang');
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
        Schema::dropIfExists('tbl_giohang');
    }
}
