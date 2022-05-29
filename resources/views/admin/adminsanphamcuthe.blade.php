@extends('ad')
@section('content')
<main class="" style="min-height: 524px;">
    <div class="content-wrapper" style="min-height: 547.2px;">
        <!-- Content Header (Page header) -->
        
        <!-- /.content -->
     
        <div class="container border bg-light pb-5 main">
            <form action="" method="post">
                @foreach ($product as $item)
                    
                @endforeach
                <?php
                    $result = DB::table('tbl_hinhanh')->where('ID_SanPham',$item->id)->get();

                                            $th=0;
                                              if($item->ID_Thuonghieu==1){
                                              $th='nike';
                                              }else if($item->ID_Thuonghieu==2){
                                                $th='adidas';
                                              }else{
                                                $th='vans';
                                              }



                ?>
    <div class="row row-cols-lg-2 mt-4 ">
      <input type="hidden" value="2" name="ID">
        <div class=" text-lg-end    ">
            @foreach ($result as $item1)
          
            @endforeach
            <img src="{{ asset('frontend/image/') }}<?php echo '/'.$th; ?>{{ '/'.$item1->HinhAnh}}" alt="" class="img-fluid rounded" style="width: 526px;height: 526px;" id="img-show">
        </div>
        <input type="hidden" name="thuonghieu" id="thuonghieu" value="{{$item->ID_Thuonghieu}}" style="width:600px">
        <div class="ps-lg-5 rounded">
           <input type="hidden" name="ID" id="ID" value="{{$item->id}}" style="width:600px">
           <div class="mb-3 ">
                <label for="" class="mb-1 fs-5">Tên Sản Phẩm: </label>
                <input type="text" name="product" id="product" value="{{$item->TenSP}}" style="width:500px">
          </div>  
            <div class="mb-3">
              <label for="" class="mb-1 fs-5">Giá:</label> <br>
              <input type="text" name="price" id="price" value="{{$item->GiaChinhThuc}}"> <br>
              </div>   
            <div class="mb-3">
              <label for="" class="mb-1 fs-5">Giá Giảm:</label> <br>
              <input type="text" name="pricedown" id="pricedown" value="{{$item->GiaGiam}}">
          </div>
            <div class="mb-3">
              <p class="mb-1 fs-5">Size:</p>
              <input type="text" name="size" id="size" value="{{$item->KichCo}}">
            </div>
            <div class="mb-3">
                <p class="mb-1 fs-5 ">Số lượng:</p>
                <input type="number" class="rounded" id="numpro" name="number" value="{{$item->SoLuong}}">  <br>
            </div>
        
        
              <br>
              <div class="mb-3">
                  <?php 
                        if($item->new==0){
                            echo ' <label for="news">New: </label>
                    <input type="checkbox" id="new" name="new" >';

                        }else{
                            echo ' <label for="news">New: </label>
                      <input type="checkbox" id="new" name="new" checked >';
                        }
                    ?>
                   
              </div>
              
                <div class="mb-3">
                    <p  class="mb-1" style="font-size: 20px;">Chọn để xoá ảnh:</p>
                    @foreach ($result as $item1)
                    <input type="checkbox"  value="{{$item1->id}} " class="checkImg">
                    <img src="{{ asset('frontend/image/') }}<?php echo '/'.$th; ?>{{ '/'.$item1->HinhAnh}}" alt="" style="width: 100px;" ></td>
                    @endforeach
                    
                </div>
                <div class="mb-3">
                    <label for="hinhanh" class="form-label">Ảnh Sản Phẩm</label>
                  
                    <input type="file" class="form-control" id="hinhanh">
               </div>
               <div class="mb-3 noichuaanh">
                    
            </div>
               <input type="hidden" name="linkimg" id="linkimg">
                              

                <input type="submit" class="btn text-white mt-4 fs-5" value="Cập nhật" name="submit" id="submit" style="background-color: #303e48;">

        </div>
      




    </div>

</form>


</div>

  

                    

        

        </div>

    </main>
    @endsection
    @section('script')
        
    <script>

        

        $(document).ready(function () {
            var arrImg=[];
            var brand =  $("#thuonghieu").val();
            $('#hinhanh').change(function (e) { 
               let chuoi = $(this).val();
             if(chuoi!=''){

                chuoi = chuoi.substring(chuoi.lastIndexOf("\\")+1,chuoi.length)
               arrImg.push(chuoi);
               if(brand==1){
                chuoi="<img src=" +  '{{ asset("frontend/image/nike/") }}' + '/' + chuoi +' "class="img-fluid" style="width:80px;" >';

               }else if(brand==2){
               chuoi="<img src=" +  '{{ asset("frontend/image/adidas/") }}' + '/' + chuoi +' "class="img-fluid" style="width:80px;" >';

               }else{
               chuoi="<img src=" +  '{{ asset("frontend/image/vans/") }}' + '/' + chuoi +' "class="img-fluid" style="width:80px;" >';

               }
              
               $('.noichuaanh').append(chuoi);
               
             
               console.log(arrImg);
             }
             
            });

            //////////////////////////

            function KT(){
            arrIDImg=[];
             var dem=0;
            $.each($('.checkImg'), function (indexInArray, valueOfElement) { 
                dem++;
                if($(valueOfElement).is(':checked')){
                    arrIDImg.push($(valueOfElement).val());
                
                } 

            });
            if(arrIDImg.length==dem){
                return -1;
            }else{
                return arrIDImg;
            }
           
             }


            $('#submit').on('click', function (event) {
                event.preventDefault();
             
                var tensp= $("#product").val();
                var kichco=$('#size').val();
               var id = $('#ID').val();
                var num = $('#numpro').val();
                var price=$('#price').val();
                var pricedown=$('#pricedown').val();
                var Img=KT();
                var news=0;
                if($('#new').is(':checked')){
                     news=1;
                }

                if(Img==-1){
                    alert('Không được xoá hết ảnh');
                 }else{
                            if(pricedown==''){
                            pricedown=0;
                        }
                        if(tensp =='' || kichco==''|| num=='' || price=='' ){
                            alert('Vui lòng nhập đầy đủ thông tin');
                        }else{
              
                        $.ajax({
                                type: "get",
                                url: "/admin/adminsuadoithongtinsanpham",
                                data: {
                                    id,
                                    tensp,
                                    kichco,
                                    num,
                                    price,
                                    pricedown,
                                    Img,
                                    arrImg,
                                    news
                                },
                                success: function (response) {
                                        if(response=='1'){
                                            alert('Cập nhật thành công')
                                            location.reload();
                                        }
                                }
                         });

                        }
                 }

                 
                

                    // dang o day


            })

           
        });

    </script>


    @endsection