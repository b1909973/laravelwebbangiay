<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblKhachhangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_khachhang', function (Blueprint $table) {
            $table->id();
            $table->string('HoTen',50);
            $table->string('TenTaiKhoan',30);
            $table->string('MatKhau',100);
            $table->string('DiaChi',100);  
            $table->string('SoDienThoai',100);
            $table->integer('Khoa')->default(0);
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_khachhang');
    }
}
