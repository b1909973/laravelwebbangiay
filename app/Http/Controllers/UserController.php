<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();
class UserController extends Controller
{
    public function index(){
        $id_khachhang=session::get('id_khachhang');
        $result =DB::table('tbl_khachhang')->where('id',$id_khachhang)->first();
     //   print_r($result);
         return view('pages.trangcanhan')->with('kh',$result);
    }
    public function changePass(){
        $id_khachhang=session::get('id_khachhang');
        $result =DB::table('tbl_khachhang')->where('id',$id_khachhang)->first();
         return view('pages.doimatkhau')->with('kh',$result);
    }
    public function xulidoimatkhau(Request $request){
        $id_khachhang=session::get('id_khachhang');
        $pass=$request->input('password');
        $newpass=$request->input('newpassword');
        $repass=$request->input('renewpassword');
        $result =DB::table('tbl_khachhang')->where('id',$id_khachhang)->where('MatKhau',$pass)->first();
        // print_r($result);
        if($result){
                //  print_r($result);
             if($newpass==$repass && strlen($newpass)>6){
                 $test=DB::table('tbl_khachhang')->where('id',$id_khachhang)->update(['MatKhau'=>$newpass]);
                echo '1';
             }
             else{
                 echo '0';
             }
        }else{
            echo '0';
        }

    }

    public function thongbao(){
        $user=session::get('id_khachhang');
        if(!$user){
            return view('pages.dangnhap');
        }
            $thongbao = DB::table('tbl_donhang')->join('tbl_thongbao','tbl_thongbao.ID_DonHang','=','tbl_donhang.id')->where('tbl_donhang.ID_KhachHang',$user)->get();
           // print_r($thongbao);
            return view('pages.thongbao')->with('tb',$thongbao);
    }
    public function tathienthi(Request $request){
        $id = $request->val;

        $result=DB::table('tbl_noidungthongbao')->where('id',$id)->update(['TatHienThi'=>1]);
        return $result;
    }
    public function daxem(Request $request){
        $id = $request->val;

        $result=DB::table('tbl_noidungthongbao')->where('id',$id)->update(['DaXem'=>1]);
        return $result;
    }
   
}
