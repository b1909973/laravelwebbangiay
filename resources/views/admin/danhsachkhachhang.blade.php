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
                                        
                                            <p class="text-center fs-3  mt-3 ">THÔNG TIN KHÁCH HÀNG</p>
                                
                        </div>
                                    
                            
                        
                        <div class="noidung"> 
					
                          <section class="w-100 p-4 text-center">
                          
                              
                            
                            <table class="table table-bordered">
                            
                              <thead>
                              <tr  style="border: 2px solid rgb(19, 15, 15)">
                                <th scope="col">ID</th>
                              
                                <th scope="col" class="text-center" >Họ Tên</th>
                              
                                <th scope="col">Tên tài khoản</th>
                              
                                <th scope="col">Địa chỉ</th>
                                <th  scope="col">Số điện thoại</th>
                                <th></th>
                              </tr>
                              </thead>
                              @foreach ($kh as $item)
                                  
                         
                                <tr>
                                  <td>{{$item->id}}</td>
                                  <td>{{$item->HoTen}}</td>
                                  <td>{{$item->TenTaiKhoan}}</td>
                                  <td>{{$item->DiaChi}}</td>
                                  <td>{{$item->SoDienThoai}}</td>
                                  <td><a href="{{URL::to('admin/infoCustomer')}}/{{$item->id}}"><i class="fas fa-eye text-danger"></i></a></td>

                                </tr>
                                @endforeach
                             
                              
                            
                              
                             
                            </table>
                          
                            </section>
                         </div>
                   
                 </div>   









        </div>

  </div>
  



    </main>
    @endsection
