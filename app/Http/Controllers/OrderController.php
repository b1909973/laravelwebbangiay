<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();
class OrderController extends Controller
{
    public function giohang(){
        $user=session::get('id_khachhang');
        if($user){
        $user=session::get('id_khachhang');
        $result = DB::table('tbl_giohang')->select('ID_SanPham','tbl_giohang.SoLuong','TenSP','GiaChinhThuc','tbl_giohang.id','GiaGiam')->join('tbl_sanpham','tbl_giohang.ID_SanPham','=','tbl_sanpham.id')->where('ID_KhachHang',$user)->get();
      
            return view('pages.giohang')->with('sp',$result);
        }
        else{
            return view('pages.dangnhap');
        }
    }




    public function addCart(Request $request){
        $user=session::get('id_khachhang');
        if($user){
          
            $data=array();
            $data['soluong']=1;
            $data['id_khachhang']=session::get('id_khachhang');
            $data['id_sanpham']=$request->input('IDSanPham');
            //
            $b=DB::table('tbl_sanpham')->where('id', $data['id_sanpham'])->first();
            $soluongtrongkho=$b->SoLuong;
            //
            $result = DB::table('tbl_giohang')->select('SoLuong')->where('ID_SanPham',$data['id_sanpham'])->where('ID_KhachHang', $data['id_khachhang'])->first();
         
            if($result){
                $a=$result->SoLuong+1;
                if($soluongtrongkho<$a){
                    echo '-1';
                }else{
                       $test=DB::table('tbl_giohang')->where('ID_SanPham', $data['id_sanpham'])->where('ID_KhachHang', $data['id_khachhang'])->update(['SoLuong'=>$a]);
                    
                }
              
            }else{
                if($soluongtrongkho==0){
                    echo '-1';
                }else{
                    $test=DB::table('tbl_giohang')->insert($data);
                }
             
            }


        }else{
          echo '0';
        }
       
         
        
    }
    public function addCart2(Request $request){
        $user=session::get('id_khachhang');
        if($user){
            $data=array();
            $data['soluong']=$request->input('number');
            $data['id_khachhang']=session::get('id_khachhang');
            $data['id_sanpham']=$request->input('ID');
            //
            $b=DB::table('tbl_sanpham')->where('id', $data['id_sanpham'])->first();
            $soluongtrongkho=$b->SoLuong;
            //
            $result = DB::table('tbl_giohang')->select('SoLuong')->where('ID_SanPham',$data['id_sanpham'])->where('ID_KhachHang', $data['id_khachhang'])->first();
            if($result){
                
                $a=$result->SoLuong+$data['soluong'];
                if($soluongtrongkho<$a){
                    echo '-1';
                }else{
                     $test=DB::table('tbl_giohang')->where('ID_SanPham', $data['id_sanpham'])->where('ID_KhachHang', $data['id_khachhang'])->update(['SoLuong'=>$a]);

                }
            }else{
                if($soluongtrongkho==0){
                    echo '-1';
                }else{
                    $test=DB::table('tbl_giohang')->insert($data);
                }
               
            }
          
        }else{
           echo '0';
        }
       
         
        
    }
    public function addOne(Request $request){
        
        $id_giohang = $request->input('ID_GioHang');
        $a = DB::table('tbl_giohang')->where('id',$id_giohang)->first();
        $b=DB::table('tbl_sanpham')->where('id',$a->ID_SanPham)->first();
        $soluongtrongkho=$b->SoLuong;
        //echo  $soluongtrongkho;
        $new=++$a->SoLuong;
        if($new>$soluongtrongkho){
            echo '0';
        }else{
            DB::table('tbl_giohang')->where('id',$id_giohang)->update(['SoLuong'=>$new]);
           echo '1';
        }
       

    }
    public function divideOne(Request $request){
        $id_giohang = $request->input('ID_GioHang');
        $a = DB::table('tbl_giohang')->where('id',$id_giohang)->first();
        $new=--$a->SoLuong;
        if($new<1){
            DB::table('tbl_giohang')->where('id',$id_giohang)->delete();
        }else{
            DB::table('tbl_giohang')->where('id',$id_giohang)->update(['SoLuong'=>$new]);
        }
       
        print_r($a);

    }
    public function removeOne(Request $request){
        $id_giohang = $request->input('ID_GioHang');
      
            DB::table('tbl_giohang')->where('id',$id_giohang)->delete();
   
        
       
      

    }
    public function Order(Request $request){
        $user=session::get('id_khachhang');
     
        $result = DB::table('tbl_giohang')->select('ID_SanPham','tbl_giohang.SoLuong','TenSP','GiaChinhThuc','tbl_giohang.id','GiaGiam')->join('tbl_sanpham','tbl_giohang.ID_SanPham','=','tbl_sanpham.id')->where('ID_KhachHang',$user)->get();
 //       print_r($result);
        foreach($result as $items) {
            $resultsoluong = DB::table('tbl_sanpham')->where('id','=',$items->ID_SanPham)->get();

            foreach($resultsoluong as $itemss){
                if($itemss->SoLuong<$items->SoLuong){
                
                    return 0;
                }
            }
           

        }
        $ngay= date("d/m/Y");
         $id_donhang= DB::table('tbl_donhang')->insertGetId(['TrangThai'=>1,'ID_KhachHang'=>$user,'NgayTaoDon'=>$ngay]);
        echo $id_donhang;
        foreach($result as $items) {
            if($items->GiaGiam==0){
                $gia=$items->GiaChinhThuc;
            }else{
                $gia=$items->GiaGiam;
            }
         $Tong= $gia*$items->SoLuong;

         
          $SoLuong=$items->SoLuong;
          $ID_SanPham=$items->ID_SanPham;
    //     //  echo $Tong;
    //     //  echo $Gia;
    //     //  echo $SoLuong;
    //     //  echo $ID_SanPham;
                DB::table('tbl_chitietdonhang')->insert(['Gia'=>$gia,
                 'SoLuong'=>$SoLuong
                ,'TongTien'=>$Tong,
                'ID_DonHang'=>$id_donhang,
                'ID_SanPham'=>$ID_SanPham]);
                $slk = DB::table('tbl_sanpham')->select('SoLuong')->where('id',$ID_SanPham)->first();
                $slconlai = $slk->SoLuong - $SoLuong;

                DB::table('tbl_sanpham')->where('id',$ID_SanPham)->update(['SoLuong'=>$slconlai]);
        }   
  
        DB::table('tbl_giohang')->where('ID_KhachHang',$user)->delete();
       
    }
    public function donhang(){
        $user=session::get('id_khachhang');
       
        if($user){
       // $result = DB::table('tbl_chitietdonhang')->select('tbl_donhang.id','TenSP','GiaChinhThuc','tbl_chitietdonhang.SoLuong')->join('tbl_donhang', 'tbl_chitietdonhang.ID_DonHang', '=', 'tbl_donhang.id')->join('tbl_sanpham', 'tbl_chitietdonhang.ID_SanPham', '=', 'tbl_sanpham.id')->where('ID_KhachHang',$user)->->get();
        $result=DB::table('tbl_donhang')->where('ID_KhachHang',$user)->where('TrangThai',1)->get();

        // foreach($result as $items){
        //     // print_r($items);
        //     // echo '<br>';
        // }
         return view('pages.dangxacnhan')->with('sp',$result);
        }
        return Redirect::to('/nike');

    }
    public function huydonhang(Request $request){
      
            $id= $request->ID_DonHang;
            $result=DB::table('tbl_chitietdonhang')->where('ID_DonHang',$id)->get();

            foreach ($result as $key => $value) {
                echo $value->SoLuong;

                $slk = DB::table('tbl_sanpham')->select('SoLuong')->where('id',$value->ID_SanPham)->first();

                $slconlai = $slk->SoLuong + $value->SoLuong;
                DB::table('tbl_sanpham')->where('id',$value->ID_SanPham)->update(['SoLuong'=>$slconlai]);
                
            }

              $result=DB::table('tbl_chitietdonhang')->where('ID_DonHang',$id)->delete();
              $result=DB::table('tbl_donhang')->where('id',$id)->delete();
        
        
       
    }
    public function danggiao(){
        $user=session::get('id_khachhang');
       
        if($user){
       // $result = DB::table('tbl_chitietdonhang')->select('tbl_donhang.id','TenSP','GiaChinhThuc','tbl_chitietdonhang.SoLuong')->join('tbl_donhang', 'tbl_chitietdonhang.ID_DonHang', '=', 'tbl_donhang.id')->join('tbl_sanpham', 'tbl_chitietdonhang.ID_SanPham', '=', 'tbl_sanpham.id')->where('ID_KhachHang',$user)->->get();
        $result=DB::table('tbl_donhang')->where('ID_KhachHang',$user)->where('TrangThai',2)->get();

        // foreach($result as $items){
        //     // print_r($items);
        //     // echo '<br>';
        // }
         return view('pages.danggiao')->with('sp',$result);
        }
        return Redirect::to('/nike');

    }
    public function dagiao(){
        $user=session::get('id_khachhang');
       
        if($user){
       // $result = DB::table('tbl_chitietdonhang')->select('tbl_donhang.id','TenSP','GiaChinhThuc','tbl_chitietdonhang.SoLuong')->join('tbl_donhang', 'tbl_chitietdonhang.ID_DonHang', '=', 'tbl_donhang.id')->join('tbl_sanpham', 'tbl_chitietdonhang.ID_SanPham', '=', 'tbl_sanpham.id')->where('ID_KhachHang',$user)->->get();
        $result=DB::table('tbl_donhang')->where('ID_KhachHang',$user)->where('TrangThai',3)->where('TatHienThi',0)->get();

        // foreach($result as $items){
        //     // print_r($items);
        //     // echo '<br>';
        // }
         return view('pages.dagiao')->with('sp',$result);
        }
        return Redirect::to('/nike');

    }

    public function tatdagiao(Request $request){

        $id_donhang = $request->val;

        $result=DB::table('tbl_donhang')->where('id',$id_donhang)->update(['TatHienThi'=>1]);

        echo $result;
    }
}