@extends('ad')
@section('content')
<main class="" style="min-height: 524px;">
    <div class="content-wrapper" style="min-height: 547.2px;">
    <!-- Content Header (Page header) -->
    
    <!-- /.content -->
  
    <div class=" col-md-12 content ">
                     
      <h3 class="m-4">Thông tin tài khoản</h3>
      <div class="col-md-9  border py-4 rounded ">
          <div class="col-11 mx-auto">
          
              <div class="row mb-4">
                
                <label for="ID" class="col-sm-3 col-form-label">ID:</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="ID" name="ID" value=" {{$tt->id}}" disabled="">
                </div>
            </div>
              <div class="row mb-4">
                
                <label for="username" class="col-sm-3 col-form-label">Tên tài khoản:</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="username" name="username" value=" {{$tt->TenTaiKhoan}}" disabled="">
                </div>
            </div>
              <div class="row mb-4">
                
                  <label for="fullname" class="col-sm-3 col-form-label">Họ và Tên:</label>
                  <div class="col-sm-9">
                      <input type="text" class="form-control" id="fullname" name="fullname" value=" {{$tt->HoTen}}" disabled="">
                  </div>
              </div>
             
              <div class="row mb-4">
                <label for="birtday" class="col-sm-3 col-form-label">Quê quán:</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="hometown" name="hometown" value=" {{$tt->DiaChi}}" disabled="">
                </div>
          
              </div>
           
           
         
         
              <div class="row mb-4">
                  <label for="phone" class="col-sm-3 col-form-label">Số điện thoại:</label>
                  <div class="col-sm-9">
                      <input type="text" class="form-control" id="phone" name="phone" value=" {{$tt->SoDienThoai}}" disabled="">
                  </div>
              </div>
              
              <div class="row mb-4">
              
                <label for="phone" class="col-sm-3 col-form-label">Khoá tài khoản:</label>
                <div class="col-sm-1 anhem">
                  <?php 
                    if($tt->Khoa==0){
                    echo '<input type="checkbox" class="form-control" id="phone" name="phone" value="1">';
                    }else{
                      echo '<input type="checkbox" class="form-control" id="phone" name="phone" value="1" checked>';
                    }
                    ?>
                </div>
                <div class="col-sm-2">
                  <button class="btn btn-danger capnhat">Cập nhật</button>
              </div>
            </div>
            
  </div>
 
    





  </div>



</div>
                   
    </div>   



    {{-- 
       --}}
      <div class="content-wrapper" style="min-height: 547.2px;">
    <!-- Content Header (Page header) -->
    
    <!-- /.content -->
  
    <div class="container">
           
              <div class=" col-md-12 content ">
                     
                        <div class=" container ">
                        
                                   <!-- <a href="" class='text-decoration-none col-1 border-end'></a> -->
                                        
                                            <p class="text-center fs-3  mt-3  ">CÁC ĐƠN HÀNG</p>
                                
                        </div>
                                    
                            
                        
                        <div class="noidung"> 
					
                          <section class="w-100 p-4 text-center">
                          
                              
                            
                            <table class="table table-bordered">
                            
                              <thead>
                              <tr  style="border: 2px solid rgb(19, 15, 15)">
                             
                              
                                <th scope="col" class="text-center" >Sản phẩm </th>
                              
                                <th scope="col">Tổng tiền</th>
                              
                                <td>Trạng Thái</td>
                              </tr>
                              </thead>
                              <?php
                                $tong =0;
                                ?>
                              @foreach ($sp as $item)
              
                              <tbody>
                                <tr  style="border: 2px solid rgb(19, 15, 15)">
                               
                              <td >
                                
                                <table class="table text-center">
                                    
                                
                                <?php
                                 $a=0;
                                $result = DB::table('tbl_chitietdonhang')->select('TenSP','tbl_sanpham.id','tbl_sanpham.ID_Thuonghieu','Gia','tbl_chitietdonhang.SoLuong')->join('tbl_sanpham','tbl_chitietdonhang.ID_SanPham','=','tbl_sanpham.id')->where('ID_DonHang',$item->id)->get();
                                ?>
                                
                                @foreach ($result as $item1)
                                <tr>
                                  <?php
                                  $th=0;
                                     if($item1->ID_Thuonghieu==1){
                                     $th='nike';
                                     }else if($item1->ID_Thuonghieu==2){
                                       $th='adidas';
                                     }else{
                                       $th='vans';
                                     }
                             
                             
                             ?>
                                  <?php $a+=$item1->Gia*$item1->SoLuong ?>
                                  <?php $hinhanh=DB::table('tbl_hinhanh')->where('ID_SanPham',$item1->id)->get() ?>
                                  <td>	<img src="{{ asset('frontend/image/') }}<?php echo '/'.$th; ?>{{ '/'.$hinhanh[0]->HinhAnh}}" alt="" style="width: 80px;"></td></td>
                                  <td>{{$item1->TenSP}}</td>
                                  <td>{{$item1->Gia}}<b class="fs-5">đ</b></td>
                                  <td> <button class="btn btn-outline-secondary" disabled><span class="text-dark">{{$item1->SoLuong}}</span></button></td>
                                </tr>
                                @endforeach
                                
                                
                                </table>
              
                              </td>
                              
                            
                                <td style="" class="text-center tong">{{$a}}<span><b class="fs-5">đ</b> </span></td>
                                <?php if($item->TrangThai==1){
                                  echo '<td><button class="btn btn-outline-info">Chờ xác nhận</button></td>';
                                  } else if($item->TrangThai==2) { 
                                    echo '<td><button class="btn btn-outline-warning">Đang giao</button></td>';
                                  } else if($item->TrangThai==3) {
                                    $tong+=$a;
                                    echo '<td><button class="btn btn-outline-success">Đã giao</button></td>';
                                   }else{ 
                                    echo '<td><button class="btn btn-outline-danger">Đã huỷ</button></td>';
                                   }
                                   ?>

                              </tr>
                              </tbody>
                              @endforeach
                            </table>
                          
                            </section>
                         </div>
                   
                 </div>   









        </div>
        <div class="text-center"><b>Tổng tiền đã mua từ shop</b> : <span class="tienshop">{{$tong}}</span> <b>đ</b></div>
      </div>
   

  </main>
    @endsection

  @section('script')

            <script>
                $(document).ready(function () {
                  
                    $('.capnhat').click(function () { 
                      
                      let a = $(this).parent().siblings('.anhem').children();
                        let khoa=0;  
                      if($(a).is(':checked')){

                          khoa=1;

                        }
                        $.ajax({
                          type: "get",
                          url: "/admin/khoataikhoan",
                          data: {
                            khoa
                            ,
                            id:$('#ID').val()
                          },
                          success: function (response) {
                              if(response=='1'){
                                  alert('Thành công')
                                  location.reload();
                              }
                          }
                        });
                    });


                });





            </script>




  @endsection