<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblNoidungthongbaoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_noidungthongbao', function (Blueprint $table) {
            $table->id();
            $table->BigInteger('ID_ThongBao')->unsigned();
         
            $table->string('NoiDung',100);
            $table->integer('DaXem');
            $table->integer('TatHienThi');
            $table->foreign('ID_ThongBao')->references('id')->on('tbl_thongbao');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_noidungthongbao');
    }
}
