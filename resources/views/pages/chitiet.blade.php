@extends('index')
@section('content')
<main>
<div class="container border bg-light pb-5 main">

    {{-- <form action="addCartFromDetailProduct" method='get'> --}}
<div class="row row-cols-lg-2 mt-4 ">
   
    @foreach ($sp as $item)
        
    @endforeach
    <?php 
    $thuonghieu =0;
    if ($item->ID_Thuonghieu==1){ 
        $thuonghieu='nike';
       }else if($item->ID_Thuonghieu==2){
           $thuonghieu='adidas';
       }else
        $thuonghieu='vans';

?>
<input type="hidden" value='{{$item->ID_SanPham}}' name='ID' id='ID'>
<div class=" text-lg-end text-md-center ">
    <img src="{{ asset('frontend/image/') }}<?php echo '/'.$thuonghieu; ?>{{ '/'.$sp[0]->HinhAnh}}" alt="" class="img-fluid rounded imgparent " style="width: 526px;height: 526px;">
    <div class=" col-12 text-center offset-lg-1 mt-2">
        @foreach ($sp as $item)
        
      
                          <img src="{{ asset('frontend/image/') }}<?php echo '/'.$thuonghieu; ?>{{ '/'.$item->HinhAnh}}" alt="" class='img-fluid imgsub' style='max-width:160px;max-height: 150px;cursor:pointer; '>  
                        {{-- <img src="{{ asset('frontend/image/nike/') }}{{ '/'.$sp[1]->HinhAnh}}" alt="" class='img-fluid imgsub' style='max-width:160px;max-height: 150px;cursor:pointer; '>  
                        <img src="{{ asset('frontend/image/nike/') }}{{ '/'.$sp[2]->HinhAnh}}" alt="" class='img-fluid imgsub' style='max-width:160px;max-height: 150px;cursor:pointer; '>   --}}
                        @endforeach
                    </div>
  </div>

<div  class="ps-lg-5 rounded">
    <h3 class="text-uppercase">{{ $sp[0]->TenSP }}</h3>
         
                    {{-- <p class="card-text mb-1 fs-2 fw-bold"><span> <del>550</del></span><del>.000</del><span><u>đ</u> </span> </p> --}}
                    <?php  if($sp[0]->GiaGiam==0){
                        ?>
                    <p class="card-text mb-1 fs-3 fw-bold"><span>{{ $sp[0]->GiaChinhThuc }}</span><span><u>đ</u> </span> </p>
                 
                    <?php }else{?>
                      <p class="card-text mb-1 fs-3 fw-bold"><span> <del>{{ $sp[0]->GiaChinhThuc }}</del></span><span><u>đ</u> </span> </p>
                      <p class="card-text mb-1 fs-3 fw-bold text-danger"><span>{{ $sp[0]->GiaGiam }}</span><span><u>đ</u> </span> </p>
                 
                      <?php }?>

                              <p class="mb-1 fs-5">Size: </p>
<div>
        <input type="button" class=" nut btn btn-outline-secondary" value="{{$sp[0]->KichCo}}">
    
        <!-- <input type="button" class="nut btn btn-outline-secondary" value="39">
      
        <input type="button" class="nut btn btn-outline-secondary" value="40">
   
        <input type="button" class="nut btn btn-outline-secondary" value="41">
        <input type="button" class="nut btn btn-outline-secondary" value="42"> -->
        <!-- <input type="number" value="0" name="size" class="d-none" id="size"> -->
    </div>
    <p class="mb-1 fs-5 ">Số lượng:</p>
    <input type="number" max="100" min="1" value="1" name='number' id='numpro' class="rounded">  
        
                <p   class=" pt-1 fs-5"> <i class="fas fa-cart-arrow-down "></i><i> Miễn phí giao hàng toàn quốc</i> </p>
                <p class="  pt-1 fs-5"><i class="fas fa-check-circle"></i> <i> Kiểm tra hàng trước khi thanh toán</i> </p>
                <p  class=" pt-1 fs-5"><i class="fas fa-exchange-alt"></i>  <i> 1 đổi 1 trong 14 ngày lỗi nhà sản xuất</i> </p> 
                <p  class=" pt-1 fs-5"><i class="fas fa-headset"></i>  <i> Hỗ trợ chăm sóc sau bán hàng</i> </p>
           
           


        <input type="submit" class="btn text-white mt-4 fs-5 btn-danger" value="Đặt hàng" name='submit' id='submit' >

</div>





</div>

{{-- </form> --}}


</div>
</main>
@endsection

@section('script')
        <script>

            $(document).ready(function () {
                $('#submit').on('click',function(){
                   
                    $.ajax({
                    type: "get",
                    url: "addCartFromDetailProduct",
                    data: {
                        ID:$('#ID').val(),
                        number:$('#numpro').val()


                    },
               
                    success: function (response) {
                        var a =response.trim();
                        if(a=='0'){
                                location.href='/dangnhap';
                                }else if(a=='-1'){
                                    alert('Số lượng trong kho không đủ đáp ứng');
                                }
                                else{
                                    location.href='/giohang';
                                }
                    }
                });


                })
                
                $.each($('.imgsub'), function (indexInArray, valueOfElement) { 
                $(valueOfElement).click(function(){
                   var link= $(this).attr('src')
                   console.log(link)
                    $('.imgparent').attr('src',link)
                })
            });

               
            });


        </script>


@endsection