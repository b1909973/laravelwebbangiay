<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblHinhanhTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_hinhanh', function (Blueprint $table) {
            $table->id();
            $table->string('HinhAnh',100);
            $table->BigInteger('ID_SanPham')->unsigned();
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
        Schema::dropIfExists('tbl_hinhanh');
    }
}
