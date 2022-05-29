<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblDonhangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_donhang', function (Blueprint $table) {
            $table->id();
           
            $table->integer('TrangThai');
            $table->string('NgayTaoDon');
            $table->string('NgayDuyetDon')->default('0');
            $table->BigInteger('ID_KhachHang')->unsigned();
         
            $table->foreign('ID_KhachHang')->references('id')->on('tbl_khachhang');
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
