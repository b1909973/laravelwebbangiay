@extends('ad')
@section('content')
<main class="" style="min-height: 524px;">
  <div class="content-wrapper" style="min-height: 547.2px;">
    <!-- Content Header (Page header) -->
    
    <!-- /.content -->
  
    <div class="container">
           
              <div class=" col-md-12 content ">
                     
                        <div class=" container ">
                        
                                   <!-- <a href="" class='text-decoration-none col-1 border-end'></a> -->
                                        
                                            <p class="text-center fs-3  mt-3 ">CHỜ XÁC NHẬN</p>
                                
                        </div>
                                    
                            
                        
                        <div class="noidung"> 
					
                          <section class="w-100 p-4 text-center">
                          
                              
                            
                            <table class="table table-bordered">
                            
                              <thead>
                              <tr  style="border: 2px solid rgb(19, 15, 15)">
                                <th scope="col">Khách hàng</th>
                              
                                <th scope="col" class="text-center" >Sản phẩm </th>
                              
                                <th scope="col">Tổng tiền</th>
                                <th scope="col">Xoá</th>
                                <th scope="col"></th>
                              </tr>
                              </thead>
                              @foreach ($sp as $item)
              
                              <tbody>
                                <tr  style="border: 2px solid rgb(19, 15, 15)">
                                  <td style="" ><span class="ID_KhachHang"><button class="btn btn-outline-info getID">{{ $item->ID_KhachHang }}</button></span></td>
                              <td >
                                
                                <table class="table text-center">
                                    
                                
                                <?php
                                 $a=0;
                                $result = DB::table('tbl_chitietdonhang')->select('TenSP','tbl_sanpham.id','tbl_sanpham.ID_Thuonghieu','Gia','tbl_chitietdonhang.SoLuong')->join('tbl_sanpham','tbl_chitietdonhang.ID_SanPham','=','tbl_sanpham.id')->where('ID_DonHang',$item->id)->get();
                                ?>
                                @foreach ($result as $item1)
                                <tr>
                                  <?php $a+=$item1->Gia*$item1->SoLuong ?>
                                  <?php $hinhanh=DB::table('tbl_hinhanh')->where('ID_SanPham',$item1->id)->get();
                                  
                                
									
                                        $th=0;
                                        if($item1->ID_Thuonghieu==1){
                                        $th='nike';
                                        }else if($item1->ID_Thuonghieu==2){
                                          $th='adidas';
                                        }else{
                                          $th='vans';
                                        }
									
									
                                  ?>
                                  <td>	<img src="{{ asset('frontend/image/') }}<?php echo '/'.$th; ?>{{ '/'.$hinhanh[0]->HinhAnh}}" alt="" style="width: 80px;"></td></td>
                                  <td>{{$item1->TenSP}}</td>
                                  <td>{{$item1->Gia}}<b class="fs-5">đ</b></td>
                                  <td> <button class="btn btn-outline-secondary" disabled><span class="text-dark">{{$item1->SoLuong}}</span></button></td>
                                </tr>
                                @endforeach
                                
                                
                                </table>
              
                              </td>
                              
                            
                                <td style="" class="text-center tong">{{$a}}<span><b class="fs-5">đ</b> </span></td>
                                <td><button class="btn huydon" value="{{$item->id}}"><i class="fas fa-trash-alt text-danger" style=";"></i></button></td>
                                  <td><button class="btn btn-outline-info duyetsp" value="{{$item->id}}">Duyệt</button></td>
                              </tr>
                              </tbody>
                              @endforeach
                            </table>
                          
                            </section>
                         </div>
                   
                 </div>   









        </div>

  </div>

  <div id="thongtinnguoimua">
    
    
    <div class="container-fluid position-fixed bg-secondary d-none" id="nen" style="height:100%;width:100%;z-index:1;opacity:0.5;;left:0%;top:0%;">
    
    </div>
      

    <div class="container-fluid position-fixed bg-light rounded d-none" id="nd" style="min-height:400px;width:400px;z-index:1;left:37%;top:200px ">
    <i class="fas fa-times position-absolute " id="x-del" style="right:1%;cursor:pointer;"></i>  
    <h2 class="text-center border-bottom pb-2">Thông tin</h2>
      <p class="mx-2 border-bottom p-2"><strong>ID </strong>: <span id="id"> </span></p>
      <p class="mx-2  border-bottom p-2"><b>Họ Tên:</b> <span id="ten"></span></p>
      <p class="mx-2  border-bottom p-2"><b>Số điện thoại: </b> <span id="sdt"></span>      </p>
   
      <p class="mx-2  border-bottom p-2"> <b>Địa chỉ:</b> <span id="address"></span></p>
        <p class="text-center"><button class="btn btn-info"><a href="{{ URL::to ('admin/infoCustomer/')}}" class="text-white linkinfo">Xem chi tiết</a> </button></p>

     </div>


    </div>

    </main>
    @endsection

    @section('script')
    <script>
      var x= document.getElementById("x-del")
       x.addEventListener('click',function(){
           var nen= document.getElementById("nen")
           var nd= document.getElementById("nd")
       
          
           nen.classList.add('d-none')
           nd.classList.add('d-none')
           
       })
    
    </script>
      <script>
        $(document).ready(function () {
          
          
          $.each($('.getID'), function (indexInArray, valueOfElement) { 
            $(valueOfElement).on('click',function(){
                  var ID = $(this).text();
                  $('#nen').removeClass('d-none');
                  $('#nd').removeClass('d-none');
                   $.ajax({
                        type: "get",
                        url: "/thongtinkhachhang",
                        data: {ID},
                      
                        success: function (response) {
                            $('#id').text(response[0]['id']);
                            $('#ten').text(response[0]['HoTen']);
                            $('#sdt').text(response[0]['SoDienThoai']);
                            $('#address').text(response[0]['DiaChi']);
                            var a = $('.linkinfo').attr('href');
                            a+='/'+response[0]['id'];
                            $('.linkinfo').attr('href', a);
                        }
                       });
               })  
           });

           $.each($('.duyetsp'), function (indexInArray, valueOfElement) { 
                $(valueOfElement).on('click',function(){
                    $.ajax({
                      type: "get",
                      url: "duyetdonhang",
                      data: {
                        ID_DonHang:$(this).val(),
                            loai:1,      
                      },
                      
                      success: function (response) {
                          if(response==1){
                            location.reload();
                          }                   
                      }
                    });





                })
           });

           $.each($('.huydon'), function (indexInArray, valueOfElement) { 
             $(valueOfElement).on('click',function(){
                $.ajax({
                  type: "get",
                  url: "/admin/huydon",
                  data: {
                    id:$(this).val()
                  },
               
                  success: function (response) {
                      if(response=='1'){
                        alert('Xoá thành công');
                        location.reload();
                      }
                  }
                });







             })
              
           });
    });
      </script>

    @endsection