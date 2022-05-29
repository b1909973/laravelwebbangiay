<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();
class AdminController extends Controller
{
    public function index(){
        $user=Session::get('user');

        if($user){
            return Redirect::to('/admin/add');
        }
        return view('admin.login');
    }
    /////////////////////////////
    public function showProduct(Request $request){
        $id = $request->id;
        $user=Session::get('user');

        if(!$user){
            return Redirect::to('/admin');
        }
        $result =DB::table('tbl_sanpham')->where('ID_ThuongHieu',$id)->where('daxoa',0)->get();
        return view('admin.product')->with('sp',$result);
    }
////////////////////////////////////
public function showAdd(){
    $user=Session::get('user');
    if(!$user){
        return Redirect::to('/admin');
    }
    return view('admin.add');
}
////////////////////////////////////
public function choxacnhan(){
    $user=Session::get('user');
    if(!$user){
        return Redirect::to('/admin');
    }

    $result=DB::table('tbl_donhang')->where('TrangThai',1)->get();
    return view('admin.choxacnhan')->with('sp',$result);
}
public function danggiao(){
    $user=Session::get('user');
    if(!$user){
        return Redirect::to('/admin');
    }
    $result=DB::table('tbl_donhang')->where('TrangThai',2)->get();
    return view('admin.danggiao')->with('sp',$result);
}
public function dagiao(){
    $user=Session::get('user');
    if(!$user){
        return Redirect::to('/admin');
    }
    $result=DB::table('tbl_donhang')->where('TrangThai',3)->get();
    return view('admin.dagiao')->with('sp',$result);
}

public function dsbomhang(){
    $user=Session::get('user');
    if(!$user){
        return Redirect::to('/admin');
    }
    $result=DB::table('tbl_donhang')->where('TrangThai',4)->get();
    return view('admin.bomhang')->with('sp',$result);
}

////////////////////////////////////
public function showThongke(Request $request){
        $nam=2022;  
    if(isset($request->nam)){
            $nam = $request->nam;
        }
   

    $user=Session::get('user');
    $thang1=array();
    $thang2=array();
    $thang3=array();
    $thang4=array();
    $thang5=array();
    $thang6=array();
    $thang7=array();
    $thang8=array();
    $thang9=array();
    $thang10=array();
    $thang11=array();
    $thang12=array();
    if(!$user){
        return Redirect::to('/admin');
    }
     // thang 1
     $result=DB::table('tbl_donhang')->select('TongTien')->join('tbl_chitietdonhang','tbl_chitietdonhang.ID_DonHang','=','tbl_donhang.id')->where('TrangThai',3)->where('NgayDuyetDon','like','%/01/'.$nam)->get();
     foreach ($result as $key => $value) {
         array_push($thang1,$value->TongTien);      
     }
     //////////
      // thang 2
    $result=DB::table('tbl_donhang')->select('TongTien')->join('tbl_chitietdonhang','tbl_chitietdonhang.ID_DonHang','=','tbl_donhang.id')->where('TrangThai',3)->where('NgayDuyetDon','like','%/02/'.$nam)->get();
    foreach ($result as $key => $value) {
        array_push($thang2,$value->TongTien);      
    }
    //////////
     // thang 3
     $result=DB::table('tbl_donhang')->select('TongTien')->join('tbl_chitietdonhang','tbl_chitietdonhang.ID_DonHang','=','tbl_donhang.id')->where('TrangThai',3)->where('NgayDuyetDon','like','%/03/'.$nam)->get();
     foreach ($result as $key => $value) {
         array_push($thang3,$value->TongTien);      
     }
     //////////
    // thang 4
    $result=DB::table('tbl_donhang')->select('TongTien')->join('tbl_chitietdonhang','tbl_chitietdonhang.ID_DonHang','=','tbl_donhang.id')->where('TrangThai',3)->where('NgayDuyetDon','like','%/04/'.$nam)->get();
    foreach ($result as $key => $value) {
        array_push($thang4,$value->TongTien);      
    }
    //////////
     // thang 5
     $result=DB::table('tbl_donhang')->select('TongTien')->join('tbl_chitietdonhang','tbl_chitietdonhang.ID_DonHang','=','tbl_donhang.id')->where('TrangThai',3)->where('NgayDuyetDon','like','%/05/'.$nam)->get();
     foreach ($result as $key => $value) {
         array_push($thang5,$value->TongTien);      
     }
     //////////
      // thang 6
    $result=DB::table('tbl_donhang')->select('TongTien')->join('tbl_chitietdonhang','tbl_chitietdonhang.ID_DonHang','=','tbl_donhang.id')->where('TrangThai',3)->where('NgayDuyetDon','like','%/06/'.$nam)->get();
    foreach ($result as $key => $value) {
        array_push($thang6,$value->TongTien);      
    }
    //////////
     // thang 7
     $result=DB::table('tbl_donhang')->select('TongTien')->join('tbl_chitietdonhang','tbl_chitietdonhang.ID_DonHang','=','tbl_donhang.id')->where('TrangThai',3)->where('NgayDuyetDon','like','%/07/'.$nam)->get();

     foreach ($result as $key => $value) {
         array_push($thang7,$value->TongTien);      
     }
     //////////
      // thang 8
    $result=DB::table('tbl_donhang')->select('TongTien')->join('tbl_chitietdonhang','tbl_chitietdonhang.ID_DonHang','=','tbl_donhang.id')->where('TrangThai',3)->where('NgayDuyetDon','like','%/08/'.$nam)->get();
    foreach ($result as $key => $value) {
        array_push($thang8,$value->TongTien);      
    }
    //////////
     // thang 9
     $result=DB::table('tbl_donhang')->select('TongTien')->join('tbl_chitietdonhang','tbl_chitietdonhang.ID_DonHang','=','tbl_donhang.id')->where('TrangThai',3)->where('NgayDuyetDon','like','%/09/'.$nam)->get();
     foreach ($result as $key => $value) {
         array_push($thang9,$value->TongTien);      
     }
     //////////
      // thang 10
    $result=DB::table('tbl_donhang')->select('TongTien')->join('tbl_chitietdonhang','tbl_chitietdonhang.ID_DonHang','=','tbl_donhang.id')->where('TrangThai',3)->where('NgayDuyetDon','like','%/10/'.$nam)->get();
    foreach ($result as $key => $value) {
        array_push($thang10,$value->TongTien);      
    }
    //////////
     // thang 11
     $result=DB::table('tbl_donhang')->select('TongTien')->join('tbl_chitietdonhang','tbl_chitietdonhang.ID_DonHang','=','tbl_donhang.id')->where('TrangThai',3)->where('NgayDuyetDon','like','%/11/'.$nam)->get();
     foreach ($result as $key => $value) {
         array_push($thang11,$value->TongTien);      
     }
     //////////
      // thang 12
    $result=DB::table('tbl_donhang')->select('TongTien')->join('tbl_chitietdonhang','tbl_chitietdonhang.ID_DonHang','=','tbl_donhang.id')->where('TrangThai',3)->where('NgayDuyetDon','like','%/12/'.$nam)->get();
    foreach ($result as $key => $value) {
        array_push($thang12,$value->TongTien);      
    }
    //////////
    $t1=0;
    $t2=0;
    $t3=0;
    $t4=0;
    $t5=0;
    $t6=0;
    $t7=0;
    $t8=0;
    $t9=0;
    $t10=0;
    $t11=0;
    $t12=0;
    foreach ($thang1 as $key => $value) {
        $t1+=$value;
    }
    foreach ($thang2 as $key => $value) {
        $t2+=$value;
    }
    foreach ($thang3 as $key => $value) {
        $t3+=$value;
    }
    foreach ($thang4 as $key => $value) {
        $t4+=$value;
    }
    foreach ($thang5 as $key => $value) {
        $t5+=$value;
    }
    foreach ($thang6 as $key => $value) {
        $t6+=$value;
    }
    foreach ($thang7 as $key => $value) {
        $t7+=$value;
    }
    foreach ($thang8 as $key => $value) {
        $t8+=$value;
    }
    foreach ($thang9 as $key => $value) {
        $t9+=$value;
    }
    foreach ($thang10 as $key => $value) {
        $t10+=$value;
    }
    foreach ($thang11 as $key => $value) {
        $t11+=$value;
    }
    foreach ($thang12 as $key => $value) {
        $t12+=$value;
    }

    $tongthang=array();
        array_push($tongthang,$t1);
        array_push($tongthang,$t2);
        array_push($tongthang,$t3);
        array_push($tongthang,$t4);
        array_push($tongthang,$t5);
        array_push($tongthang,$t6);
        array_push($tongthang,$t7);
        array_push($tongthang,$t8);
        array_push($tongthang,$t9);
        array_push($tongthang,$t10);
        array_push($tongthang,$t11);
        array_push($tongthang,$t12);
 
  
     return view('admin.thongke')->with('thang',$tongthang)->with('nam',$nam);
}
////////////////////////////////////
    public function process(Request $request){
        $user= $request->input('username');
        $pass=$request->input('password');
       
        $result= DB::table('tbl_admin')->where('username',$user)->where('password',$pass)->first();
      if($result){
         Session::put('user',$user);
         Session::put('id',$result->id);
         return Redirect::to('/admin/add');
      }else{
          Session::put('message','Mật khẩu hoặc tài khoản không hợp lệ');
          return Redirect::to('/admin');
      }
    }
//////////////////////////////////////////
    public function logout(){
        Session::put('user',NULL);
        Session::put('id',NULL);
        return Redirect::to('/admin');
    }
    ///////////////////////////////////////
    /// xem thong tin khach hang
    public function info(Request $request){

        $id =$request->input('ID');
       
        $result= DB::table('tbl_khachhang')->where('id',$id)->get();

        return $result;
    }
    public function thongtinKH(Request $request){
        $user=Session::get('user');
        $id_khachhang=$request->id;
        if(!$user){
            return Redirect::to('/admin');
        }
        $result2=DB::table('tbl_khachhang')->where('id',$id_khachhang)->first();
        $result=DB::table('tbl_donhang')->where('ID_KhachHang',$id_khachhang)->get();
        return view('admin.thongtinkhachhang')->with('sp',$result)->with('tt',$result2);
    }
    public function duyetdonhang(Request $request){
        $user=Session::get('user');
        $id=$request->input('ID_DonHang');

       

        if(!$user){
            return Redirect::to('/admin');
        }
        if($request->loai==1){
            $id_thongbao=  DB::table('tbl_thongbao')->insertGetId(['ID_DonHang'=>$id]);
            DB::table('tbl_noidungthongbao')->insert(['ID_ThongBao'=>$id_thongbao,'NoiDung'=>'ĐÃ XÁC NHẬN','DaXem'=>0,'TatHienThi'=>0]);

            $date = date("d/m/Y");
            $result = DB::table('tbl_donhang')->where('id',$id)->update(['TrangThai'=>2,'NgayDuyetDon'=>$date]);
        }else{
            $id_thongbao= DB::table('tbl_thongbao')->select('id')->where('ID_DonHang',$id)->first();
            DB::table('tbl_noidungthongbao')->insert(['ID_ThongBao'=>$id_thongbao->id,'NoiDung'=>'ĐÃ GIAO THÀNH CÔNG','DaXem'=>0,'TatHienThi'=>0]);

            $result = DB::table('tbl_donhang')->where('id',$id)->update(['TrangThai'=>3]);
       
       
        }
        echo $result;
       
    }

    /////////////
   

    //////////////
    public function adminthem(Request $request){
        $arrImg=$request->arrImg;
        $data['TenSP']=$request->tensp;
        $data['KichCo']=$request->kichco;
        $data['ID_ThuongHieu']=$request->brand;
        $data['SoLuong']=$request->num;
        $data['GiaChinhThuc']=$request->price;
        $data['GiaGiam']=$request->pricedown;
        $str= $data['TenSP'];
        $data['new'] = $request->news;
            


            
        $unicode = array(
         
            'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',
             
            'd'=>'đ',
             
            'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
             
            'i'=>'í|ì|ỉ|ĩ|ị',
             
            'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
             
            'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
             
            'y'=>'ý|ỳ|ỷ|ỹ|ỵ',
             
            'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
             
            'D'=>'Đ',
             
            'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
             
            'I'=>'Í|Ì|Ỉ|Ĩ|Ị',
             
            'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
             
            'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
             
            'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ',
             
            );
             
            foreach($unicode as $nonUnicode=>$uni){
             
            $str = preg_replace("/($uni)/i", $nonUnicode, $str);
             
            }
            $str = str_replace(' ',' ',$str);

            $data['slug']=$str;
                    $result = DB::table('tbl_sanpham')->insertGetId($data);
                    if($result){
                        foreach ($arrImg as $key => $value) {
                       
                            DB::table('tbl_hinhanh')->insert(['ID_SanPham'=>$result,'HinhAnh'=>$value]);
                        
                        }
                        echo '1';
                    }else{
                        echo '0';
                    }
                   
                    
    }

    public function chitiet(Request $request){
        $user=Session::get('user');
        $id=$request->id;
        if(!$user){
            return Redirect::to('/admin');
     
        }
       
        $result = DB::table('tbl_sanpham')->where('id',$id)->get();
        return view('admin.adminsanphamcuthe')->with('product',$result);

    }
    public function dskhachhang(){
        $user=Session::get('user');
        if(!$user){
            return Redirect::to('/admin');
     
        }
        $result = DB::table('tbl_khachhang')->get();
   
        return view('admin.danhsachkhachhang')->with('kh',$result);
    }

    public function bomhang(Request $request){
        $user=Session::get('user');
        $id=$request->input('id');
        if(!$user){
            return Redirect::to('/admin');
     
        }
        
        $result=DB::table('tbl_chitietdonhang')->where('ID_DonHang',$id)->get();

        foreach ($result as $key => $value) {
          //  echo $value->SoLuong;

            $slk = DB::table('tbl_sanpham')->select('SoLuong')->where('id',$value->ID_SanPham)->first();

            $slconlai = $slk->SoLuong + $value->SoLuong;
            DB::table('tbl_sanpham')->where('id',$value->ID_SanPham)->update(['SoLuong'=>$slconlai]);



            
        }

        $id_thongbao= DB::table('tbl_thongbao')->select('id')->where('ID_DonHang',$id)->first();
        DB::table('tbl_noidungthongbao')->insert(['ID_ThongBao'=>$id_thongbao->id,'NoiDung'=>'GIAO KHÔNG THÀNH CÔNG','DaXem'=>0,'TatHienThi'=>0]);


        $result = DB::table('tbl_donhang')->where('id',$id)->update(['TrangThai'=>4]);


     

      
        echo $result;
    }
    public function huydon(Request $request){

        $user=Session::get('user');
        $id=$request->input('id');
        if(!$user){
            return Redirect::to('/admin');
     
        }

        $result=DB::table('tbl_chitietdonhang')->where('ID_DonHang',$id)->get();

        foreach ($result as $key => $value) {
          //  echo $value->SoLuong;

            $slk = DB::table('tbl_sanpham')->select('SoLuong')->where('id',$value->ID_SanPham)->first();

            $slconlai = $slk->SoLuong + $value->SoLuong;
            DB::table('tbl_sanpham')->where('id',$value->ID_SanPham)->update(['SoLuong'=>$slconlai]);
            
        }



        $result = DB::table('tbl_chitietdonhang')->where('ID_DonHang',$id)->delete();

        $result = DB::table('tbl_donhang')->where('id',$id)->delete();
        echo $result;


    }
    ////////////////////////
    public function gosp(Request $request){
        $user=Session::get('user');
        $id=$request->input('id');
        if(!$user){
            return Redirect::to('/admin');
     
        }
    
   
      
        $result = DB::table('tbl_sanpham')->where('id',$id)->update(['daxoa'=>1]);
        $result1 = DB::table('tbl_giohang')->where('ID_SanPham',$id)->delete();
        echo $result;
      //  $result = DB::table('tbl_chitietdonhang')->select('ID_DonHang')->where('ID_SanPham',$id)->get();
        //    print_r($result);
            // foreach ($result as $key => $value) {
                
            //       foreach ($value as $key1 => $val) {
            //         $result = DB::table('tbl_chitietdonhang')->where('ID_DonHang',$val)->delete();
            //       }
            // }

        // $result = DB::table('tbl_donhang')->where('id',$id)->delete();
        // $result = DB::table('tbl_donhang')->where('id',$id)->delete();

    }
    /////////////////
    public function suadoittsp(Request $request){
            $arrImg=$request->arrImg;
            $arrIDImg=$request->Img;
            $id = $request->id;
            $data['TenSP']=$request->tensp;
            $data['KichCo']=$request->kichco;
           
            $data['SoLuong']=$request->num;
            $data['GiaChinhThuc']=$request->price;
            $data['GiaGiam']=$request->pricedown;
            $str= $data['TenSP'];

            $data['new'] =$request->news;
          
                
    
    
                
            $unicode = array(
             
                'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',
                 
                'd'=>'đ',
                 
                'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
                 
                'i'=>'í|ì|ỉ|ĩ|ị',
                 
                'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
                 
                'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
                 
                'y'=>'ý|ỳ|ỷ|ỹ|ỵ',
                 
                'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
                 
                'D'=>'Đ',
                 
                'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
                 
                'I'=>'Í|Ì|Ỉ|Ĩ|Ị',
                 
                'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
                 
                'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
                 
                'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ',
                 
                );
                 
                foreach($unicode as $nonUnicode=>$uni){
                 
                $str = preg_replace("/($uni)/i", $nonUnicode, $str);
                 
                }
                $str = str_replace(' ','_',$str);
    
                $data['slug']=$str;

                $result = DB::table('tbl_sanpham')->where('id',$id)->update($data);
                      
                  if(!empty($arrIDImg) )   {  
                foreach ($arrIDImg as $key => $value) {
                    $result = DB::table('tbl_hinhanh')->where('id',$value)->delete();
              
                }
               
                }
                if(!empty($arrImg)){
                    foreach ($arrImg as $key => $value) {
                        $result = DB::table('tbl_hinhanh')->insert(['ID_SanPham'=>$id,'HinhAnh'=>$value]);
                  
                    }

                }
                echo $result;
        }
        public function khoataikhoan(Request $request){

            $user=Session::get('user');
              $id=$request->input('id');
              $khoa=$request->input('khoa');
            if(!$user){
                 return Redirect::to('/admin');
     
              }
              $result=DB::table('tbl_khachhang')->where('id',$id)->update(['Khoa'=>$khoa]);
              echo $result;

        }
}
