<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();
class HomeController extends Controller
{
    public function nike(){
        // $result= DB::table('tbl_sanpham')->get();
        // print_r($users);
         $users = DB::table('tbl_sanpham')->where('ID_Thuonghieu','1')->where('daxoa',0)->take(12)->get();
        return view('pages.nike')->with('listProduct',$users);
 
    }

    public function timkiem(Request $request){
            $timkiem = $request->timkiem;
            $timkiem='%'.$timkiem.'%';
       // echo $timkiem;
         $users = DB::table('tbl_sanpham')->where('daxoa',0)->where('slug', 'like', $timkiem)->get();
          //  print_r($users);
        return view('pages.timkiem')->with('listProduct',$users);
 
    }


    public function loadthem(){
        $count = DB::table('tbl_sanpham')->count();

        $conlai=$count-12;
        // $result= DB::table('tbl_sanpham')->get();
        // print_r($users);
        //  $users = DB::table('tbl_sanpham')->where('ID_Thuonghieu','1')->get();
        //     $myarr=array();
        //     $i=0;
        //  foreach ($users as $key => $value) {
        //         $i++;
        //         if($i>12){
        //             array_push($myarr,$value);
        //          }
           
        //  }

      
         $users = DB::table('tbl_sanpham')->where('ID_Thuonghieu','1')->where('daxoa',0)->skip(12)->take($conlai)->get();

            
        return view('pages.loadthem')->with('listProduct',$users);
 
    }

    public function loadthemAdidas(){
        $count = DB::table('tbl_sanpham')->count();

        $conlai=$count-12;
        // $result= DB::table('tbl_sanpham')->get();
        // print_r($users);
         $users = DB::table('tbl_sanpham')->where('ID_Thuonghieu','2')->where('daxoa',0)->skip(12)->take($conlai)->get();
        return view('pages.loadthemAdidas')->with('listProduct',$users);
 
    }
    public function loadthemVans(){
        $count = DB::table('tbl_sanpham')->count();

        $conlai=$count-12;
        // $result= DB::table('tbl_sanpham')->get();
        // print_r($users);
         $users = DB::table('tbl_sanpham')->where('ID_Thuonghieu','3')->where('daxoa',0)->skip(12)->take($conlai)->get();
        return view('pages.loadthemVans')->with('listProduct',$users);
 
    }

    public function trangchu(){
        // $result= DB::table('tbl_sanpham')->get();
        // print_r($users);
         $spmoi = DB::table('tbl_sanpham')->where('new',1)->where('daxoa',0)->limit(12)->get();
         $nike = DB::table('tbl_sanpham')->where('ID_Thuonghieu',1)->where('daxoa',0)->limit(4)->get();
         $adidas = DB::table('tbl_sanpham')->where('ID_Thuonghieu',2)->where('daxoa',0)->limit(4)->get();
         $vans = DB::table('tbl_sanpham')->where('ID_Thuonghieu',3)->where('daxoa',0)->limit(4)->get();

        return view('pages.trangchu')->with('listProduct',$spmoi)->with('nike',$nike)->with('adidas',$adidas)->with('vans',$vans);
 
    }
    public function adidas(){
        $users = DB::table('tbl_sanpham')->where('ID_Thuonghieu','2')->where('daxoa',0)->limit(12)->get();        
        return view('pages.adidas')->with('listProduct',$users);
    }
    public function vans(){
        $users = DB::table('tbl_sanpham')->where('ID_Thuonghieu','3')->where('daxoa',0)->limit(12)->get();
        return view('pages.vans')->with('listProduct',$users);
    }
    public function chitiet(Request $request){
        $id =$request->input('id');
        $result = DB::table('tbl_sanpham')->join('tbl_hinhanh', 'tbl_sanpham.id', '=', 'tbl_hinhanh.ID_SanPham')->where('tbl_sanpham.id',$id)->get();
 

        return view('pages.chitiet')->with('sp',$result);
    }
    public function dangnhap(){
        $user =session::get('id_khachhang');
        if($user){
            return Redirect::to('/nike');
        }
        return view('pages.dangnhap');
    }
    public function xulydangnhap(Request $request){
        $username=$request->input('username');
        $password=md5($request->input('password'));
        $result= DB::table('tbl_khachhang')->where('TenTaiKhoan',$username)->where('MatKhau',$password)->first();
      
     
        if($result){
            $a= $result->Khoa;

            if($a!=0){
                Session::put('message','Tài khoản đã bị khoá');
                    return Redirect::to('/dangnhap');
            }else{
                Session::put('username',$username);
                Session::put('HoTen',$result->HoTen);
                Session::put('id_khachhang',$result->id);
                return Redirect::to('/nike');
            }
                  
        }else{
                    Session::put('message','Mật khẩu hoặc tài khoản không hợp lệ');
                    return Redirect::to('/dangnhap');
                }

      
        
      
    }
    public function dangxuat(){
        Session::put('username',NULL);
        Session::put('id_khachhang',NULL);
        Session::put('HoTen',NULL);
        return Redirect::to('/nike');
    }


// dang ky///////////////////////

    public function dangky(){
        $user =session::get('id_khachhang');
        if($user){
            return Redirect::to('/nike');
        }
        return view('pages.dangky');
    }
    public function xulidangky(Request $request){
          $result=array();
        $result['HoTen']=$request->input('firstname');

        $result['TenTaiKhoan']=$request->input('username');
     
        $result['SoDienThoai']= $request->input('tel');

        $result['MatKhau']=md5($request->input('password'));
        $result['DiaChi']=$request->input('address');

        // print_r($result);
     
         $test=DB::table('tbl_khachhang')->insert($result);
        if($test){
            return Redirect::to('/dangnhap');
        }else{
            echo 'loi';
        }


    }
    public function testUsername(Request $request){
        $username= $request->username;
        $result= DB::table('tbl_khachhang')->where('TenTaiKhoan',$username)->first();
        if($result){
            echo 'Tài khoản đã tồn tại';
        }else{
            echo '1';
        }
      
      
    }
    ///////////////////////
    public function capnhatdiachi(Request $request){
        $diachi = $request->a;
        $id_khachhang= session::get('id_khachhang');

        $result =DB::table('tbl_khachhang')->where('id',$id_khachhang)->update(['DiaChi'=>$diachi]);
        echo $result;
    }

}
