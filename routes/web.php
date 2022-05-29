<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'App\Http\Controllers\HomeController@trangchu');
   


// Home/////////////////////////////////////////////
Route::get('trangchu','App\Http\Controllers\HomeController@trangchu');


Route::get('/chitiet','App\Http\Controllers\HomeController@chitiet');
Route::get('nike','App\Http\Controllers\HomeController@nike');
Route::get('vans','App\Http\Controllers\HomeController@vans');
Route::get('adidas', 'App\Http\Controllers\HomeController@adidas');

Route::get('timkiem','App\Http\Controllers\HomeController@timkiem');

Route::get('loadthem','App\Http\Controllers\HomeController@loadthem');
Route::get('loadthemadidas','App\Http\Controllers\HomeController@loadthemAdidas');
Route::get('loadthemvans','App\Http\Controllers\HomeController@loadthemVans');

Route::get('/thongbao', 'App\Http\Controllers\UserController@thongbao');
Route::get('/tathienthi', 'App\Http\Controllers\UserController@tathienthi');
Route::get('/daxem', 'App\Http\Controllers\UserController@daxem');
    // dang nhap//
    Route::get('dangnhap','App\Http\Controllers\HomeController@dangnhap');
    Route::post('dangnhap','App\Http\Controllers\HomeController@xulydangnhap');
    Route::get('/dangxuat','App\Http\Controllers\HomeController@dangxuat');
////////////////////////////////////////////
    //dangky//
    Route::get('dangky','App\Http\Controllers\HomeController@dangky');
    Route::post('dangky','App\Http\Controllers\HomeController@xulidangky');
    Route::get('testUsername','App\Http\Controllers\HomeController@testUsername');
    //////////////////////////////////
    //cap nhat dia chi//
    Route::get('capnhatdiachi','App\Http\Controllers\HomeController@capnhatdiachi');



////////////// admin////////////////////

///admin truy xuat database
Route::post('/admin-process','App\Http\Controllers\AdminController@process');
Route::get('/logout','App\Http\Controllers\AdminController@logout');
//////////////////////
Route::get('admin','App\Http\Controllers\AdminController@index');
//////////////
Route::get('admin/product/{id}', 'App\Http\Controllers\AdminController@showProduct');
Route::get('admin/chitiet/{id}','App\Http\Controllers\AdminController@chitiet');
//////
Route::get('admin/add', 'App\Http\Controllers\AdminController@showAdd');
Route::get('admin/dangxacnhan', 'App\Http\Controllers\AdminController@choxacnhan');
Route::get('admin/danggiao', 'App\Http\Controllers\AdminController@danggiao');
Route::get('admin/dagiao', 'App\Http\Controllers\AdminController@dagiao');
Route::get('admin/dsbomhang', 'App\Http\Controllers\AdminController@dsbomhang');
Route::get('admin/thongke', 'App\Http\Controllers\AdminController@showThongke');
/////////////////////////////////

Route::get('/thongtinkhachhang', 'App\Http\Controllers\AdminController@info');

Route::get('admin/infoCustomer/{id}','App\Http\Controllers\AdminController@thongtinKH');


Route::get('admin/duyetdonhang','App\Http\Controllers\AdminController@duyetdonhang');

///admin them san pham

Route::get('admin/adminthemsanpham','App\Http\Controllers\AdminController@adminthem');
// danh sach sinh vien

Route::get('admin/danhsachkhachhang','App\Http\Controllers\AdminController@dskhachhang');
///////////xu ly bom hang
Route::get('admin/bomhang','App\Http\Controllers\AdminController@bomhang');
///////////xu ly admin huy don
Route::get('admin/huydon','App\Http\Controllers\AdminController@huydon');
/////////////////////////////////
///////go san pham
Route::get('admin/gosanpham','App\Http\Controllers\AdminController@gosp');

//////Sua doi thong tin san pham
Route::get('admin/adminsuadoithongtinsanpham','App\Http\Controllers\AdminController@suadoittsp');
/////////////////
//////////admin khoa tai khoan

Route::get('admin/khoataikhoan','App\Http\Controllers\AdminController@khoataikhoan');

//////////////////////////////////
////USER///////////////////////////////
Route::get('canhan','App\Http\Controllers\UserController@index');
Route::get('doimatkhau','App\Http\Controllers\UserController@changePass');
Route::post('doimatkhau','App\Http\Controllers\UserController@xulidoimatkhau');

///ORDER////////////////////////////////////
// Route::get('/themvaogiohang','App\Http\Controllers\OrderController@addCart');

Route::get('giohang','App\Http\Controllers\OrderController@giohang');
Route::get('themvaogiohang','App\Http\Controllers\OrderController@addCart');
Route::get('addCartFromDetailProduct','App\Http\Controllers\OrderController@addCart2');
Route::get('add','App\Http\Controllers\OrderController@addOne');
Route::get('divide','App\Http\Controllers\OrderController@divideOne');
Route::get('del','App\Http\Controllers\OrderController@removeOne');

// dat hang
Route::get('dathang','App\Http\Controllers\OrderController@Order');
Route::get('quanlidonhang','App\Http\Controllers\OrderController@donhang');
Route::get('huydonhang','App\Http\Controllers\OrderController@huydonhang');
Route::get('danggiao','App\Http\Controllers\OrderController@danggiao');
Route::get('dagiao','App\Http\Controllers\OrderController@dagiao');
//tat hien thi da giao
Route::get('tatdagiao','App\Http\Controllers\OrderController@tatdagiao');
/// adminlte
