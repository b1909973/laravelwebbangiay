@extends('ad')
@section('content')
<main class="" style="min-height: 524px;">
  <div class="content-wrapper" style="min-height: 547.2px;">
    <!-- Content Header (Page header) -->
    
    <!-- /.content -->
      
  <div class="container">
       
               
                  
                <div class=" col-md-12 col-12 content ">

                <table class="table text-center ">
                                        <thead>
                                          <tr class="">
                                           
                                            <th scope="col">Sản phẩm</th>
                                            <th scope="col">Tên Sản Phẩm</th>
                                            <th scope="col">Giá</th>
                                            <th scope="col">Thương hiệu</th>
                                            <th scope="col">Size</th>
                                            <th scope="col">Số lượng</th>
                                           
                                            <th scope="col"></th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          
                                            @foreach ($sp as $item)
                                                
                                         
                                          <tr>
                                        
                                            <td><form action="{{URL::to('admin/chitiet')}}/{{ $item->id }}" method="get"><button type="submit" class="btn">
                                               {{-- <input type="hidden" name="ID" value="2"> --}}
                                      
                                              <?php
                                              $result=DB::table('tbl_hinhanh')->select('HinhAnh')->where('ID_SanPham',$item->id)->get();
                                                  
                                              $th=0;
                                              if($item->ID_Thuonghieu==1){
                                              $th='nike';
                                              }else if($item->ID_Thuonghieu==2){
                                                $th='adidas';
                                              }else{
                                                $th='vans';
                                              }



                                               ?>
                                              @foreach ($result as $item1)
                                                  
                                              @endforeach
                                                  
                                             
                                              <img src="{{ asset('frontend/image/') }}<?php echo '/'.$th; ?>{{ '/'.$item1->HinhAnh}}" class="card-img-top" style="width:80px;" alt="..."> </button></form> </td>
                                         
                                              <td>{{$item->TenSP}}} </td>
                                            <td>{{$item->GiaChinhThuc}}</td>
                                            <td class="border">{{$item->ID_Thuonghieu}}</td>
                                            <td> {{$item->KichCo}}</td>
                                            <td> {{$item->SoLuong}}</td>
                                          
                                            <td><button class="btn gosanpham" value="{{ $item->id }}"><i class="fas fa-trash-alt text-danger"></i></button> </td>
                                          </tr>

                                               

                                          @endforeach

                                       
                                               

                                       
                                               



                                         


                                               


                                               

                                         

                                                                                       
                                        </tbody>
                                      </table></div>
                   
                      





             </div>
                 


         </div>
           






       



        </div>

    </main>

    @endsection
    @section('script')
      <script>
        $(document).ready(function () {
          $.each($('.gosanpham'), function (indexInArray, valueOfElement) { 
              $(valueOfElement).on('click',function(){

                  $.ajax({
                    type: "get",
                    url: "/admin/gosanpham",
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