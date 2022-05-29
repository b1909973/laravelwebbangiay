@extends('index')
@section('content')
<main>
        <!-- <div class="title-sale">
            <p><a title="Giày thể thao bán chạy">Hàng bán chạy</a></p>
        </div>
        -->
     
        
        <div class="container">
            <h2 class="text-center my-4" style="color:  #303e48;"><i>Giày Vans</i></h2>
            <div id='noidung'>
               <div class="row row-cols-4  justify-content-center">
            
               
              
               
              
                
                
              
                 
              
               
              
                
              
                
              
                
              
               
                    @foreach($listProduct as $key => $value)
                <div class="card  m-2 text-center" style="width: 18rem;">
                 
                      <div class="card-body">
                          <form action="{{URL::to('/chitiet')}}" method='get'class="text-decoration-none mb-2 text-dark">
                             <button type='submit' class=' border-0'>
                                 <?php
                                $result=DB::table('tbl_hinhanh')->select('HinhAnh')->where('ID_SanPham',$value->id)->get();
                                   
                                 ?>
                                @foreach ($result as $item)
                                    
                                @endforeach
                                    
                               
                                <img src="{{ asset('frontend/image/vans/') }}{{ '/'.$item->HinhAnh}}" class="card-img-top" alt="...">  </button>

                              <h5 class="card-title "> {{ $value->TenSP }}</h5>
                              <input type="hidden" name='id' value='{{ $value->id }}'>
                              
                              <p class="card-text mb-1 fs-5 fw-bold"><span>{{ $value->GiaChinhThuc }}</span><span><u>đ</u> </span> </p>
                           
                                                        </form> 
                      </div> 
                    
                      <button class="btn text-white themvaogiohang btn-primary " value="{{ $value->id }}" > Thêm vào giỏ hàng</button>
                </div> 
                @endforeach 
                  
              
            </div> 

            </div>
            <div class="text-center mt-2 mb-2"> <button class="btn btn-outline-primary xemthem">XEM THÊM ...</button> </div>

        </div>
        <div class="container">

            <div class=" noiload">
            
            </div>
        </div>

    </main>
    @endsection

    @section('script')
    <script>
                function addOnCart(){
                    $.each($('.themvaogiohang'), function (indexInArray, valueOfElement) { 
                    $(valueOfElement).on('click',function(){
                            
                            var IDSanPham=$(this).val();
                         //   console.log(IDSanPham);
                            $.ajax({
                            type: "get",
                            url: "/themvaogiohang",
                            data: {IDSanPham}
                            ,
                            
                            success: function (response) {
                                var a =response.trim();
                               
                                if(a=='0'){
                                location.href='/dangnhap';
                                }else if(a=='-1'){
                                    alert('Số lượng trong kho không đủ đáp ứng');
                                }
                                else{
                                alert('Thêm thành công');
                                }
                                 }
                            
                            });





                    });
                    });


                    

                }
                $('.xemthem').click(function () { 
                
                $('.noiload').load("/loadthemvans")
                $(this).addClass('d-none');
                 
            });
            
                addOnCart();  

      </script>

    @endsection