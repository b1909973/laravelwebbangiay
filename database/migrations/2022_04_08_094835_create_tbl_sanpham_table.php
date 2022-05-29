<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblSanphamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_sanpham', function (Blueprint $table) {
            $table->id();
            $table->string('TenSP',100);
            $table->integer('KichCo');
            $table->integer('SoLuong');
            $table->integer('GiaChinhThuc');
            $table->integer('GiaGiam');
            $table->BigInteger('ID_Thuonghieu')->unsigned();
            $table->foreign('ID_ThuongHieu')->references('id')->on('tbl_danhmuc');
            $table->string('slug',100);


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_sanpham');
    }
}
