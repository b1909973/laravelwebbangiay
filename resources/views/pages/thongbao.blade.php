@extends('index')
@section('content')
<main style="min-height: 440px;">
    <h1 class="text-center mt-2">Thông báo</h1>

                   
                    @foreach ($tb as $item)

                 

                    <div class="container bg-light rounded thongbao" style="cursor:pointer;">
                     
                     
                     
                      <?php
                            $result= DB::table('tbl_noidungthongbao')->where('ID_ThongBao',$item->id)->get();
                      ?>
                   
                        @foreach ($result as $item1)
                        
                        <?php
                        if($item1->TatHienThi==1) {
                          continue;
                        }
                        ?>
                         <?php
                         if($item1->DaXem==1){
                        
                          echo ' <div class="border">';
                         
                       ?>
                       <?php
                        }else{
                          ?>
                           <div class="border daxem rounded " style="background-color:#f6c7dd;"  >
                          
                            <input type="hidden" value="{{$item1->id}}" class='getid'>
                     <?php   } ?>
                     <span><i>ĐƠN HÀNG</i></span>
                              <?php
                                        $result2= DB::table('tbl_donhang')->join('tbl_thongbao','tbl_thongbao.ID_DonHang','=','tbl_donhang.id')->where('tbl_thongbao.id',$item1->ID_ThongBao)->get();
                                      foreach ($result2 as $key => $value) {
                                        $result3= DB::table('tbl_donhang')->join('tbl_chitietdonhang','tbl_chitietdonhang.ID_DonHang','=','tbl_donhang.id')->where('tbl_donhang.id',$value->ID_DonHang)->get();
                                        foreach ($result3 as $key => $val) {
                                          $result4=DB::table('tbl_sanpham')->join('tbl_chitietdonhang','tbl_chitietdonhang.ID_SanPham','=','tbl_sanpham.id')->where('tbl_chitietdonhang.id',$val->id)->get();
                                          foreach ($result4 as $key => $val4) {
                                              $result5 = DB::table('tbl_hinhanh')->where('tbl_hinhanh.ID_SanPham',$val4->ID_SanPham)->first();
                                              $ten =$val4->TenSP;
                                              $ID_Thuonghieu= $val4->ID_Thuonghieu;
                                              
									
                                                $th=0;
                                                if( $ID_Thuonghieu==1){
                                                $th='nike';
                                                }else if( $ID_Thuonghieu==2){
                                                  $th='adidas';
                                                }else{
                                                  $th='vans';
                                                }
						
								
                                           ?>

                                            <img src="{{asset('frontend/image/')}}<?php echo '/'.$th; ?>{{'/'.$result5->HinhAnh}}" alt="" style="width: 80px;">
                                            
                                          <b><i>{{$ten}}</i></b>  
                                        
                                       <?php }
                                      }
                                    }
                                    ?>
                             

                       
                        {{ $item1->NoiDung }}
                        <button class="btn TatHienThi" value=" {{$item1->id}}"><i class="fas fa-trash-alt text-danger"></i></button> 
                        <br>
                      </div> 
                        @endforeach

                    </div>                 
                      
                     
                    
                      {{-- <span>{{ $item->id }} </span> --}}
                    
                  
                   
                  
                    @endforeach
               
            


  </main>
  @endsection

  @section('script')
    <script>
        $(document).ready(function () {
          
            $.each($('.TatHienThi'), function (indexInArray, valueOfElement) { 
              $(valueOfElement).on('click',function(){

                var val= $(this).val();
              $.ajax({
                type: "get",
                url: "/tathienthi",
                data: {
                  val
                },
            
                success: function (response) {
                    if(response==1){
                      location.reload();
                    }
                }
              });





              })
           
            });
            $.each($('.daxem'), function (indexInArray, valueOfElement) { 
            //  console.log(valueOfElement)
              $(valueOfElement).on('click',function(){
                    
                var val= $(this).children('.getid').val();
                console.log(val);
              $.ajax({
                type: "get",
                url: "/daxem",
                data: {
                  val
                },
            
                success: function (response) {
                    if(response==1){
                      location.reload();
                    }
                }
              });

              }); 
             });
        });

    </script>

  @endsection