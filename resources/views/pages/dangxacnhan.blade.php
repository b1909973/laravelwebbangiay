
@extends('index')
@section('content')
<main class="" style="min-height: 524px;">
	<div class="container">
	   
		  <div class=" col-md-12 content ">
				 
					<div class=" container ">
					<div class="row col-md-12  mx-auto p-3 mt-2  rounded">
									
											
												
									<a href="{{URL::to('/quanlidonhang')}}" class="waiting text-decoration-none col-12  col-md-4 text-center  p-2 border-bottom link-secondary fs-5  " value="0" style="">Chờ xác nhận</a>
																			  
									<a href="{{URL::to('/danggiao')}}" class="shipping text-decoration-none col-12 col-md-4 text-center text-dark p-2 border-bottom  fs-5" value="2">Đang giao</a>
									<a href="{{URL::to('/dagiao')}}" class="shipped text-decoration-none col-12 col-md-4 text-center text-dark p-2  border-bottom    fs-5" value="3">Đã giao</a>
								   
								  </div>
							   <!-- <a href="" class='text-decoration-none col-1 border-end'></a> -->
									
										<p class="text-center fs-3  mt-3 ">ĐƠN MUA</p>
							
					</div>
								
						
					
					 <div class="noidung"> 
					
						<section class="w-100 p-4 text-center">
						
								
							
							<table class="table table-bordered">
							
								<thead>
								<tr  style="border: 2px solid rgb(19, 15, 15)">
								  <th scope="col">#</th>
								
								  <th scope="col" class="text-center" >Sản phẩm </th>
								
								  <th scope="col">Tổng tiền</th>
								  <th scope="col">Xoá</th>
								</tr>
							  </thead>
							  @foreach ($sp as $item)

							  <tbody>
								  <tr  style="border: 2px solid rgb(19, 15, 15)">
								<td style="" ><span class="dem"></span></td>
								<td >
									
									<table class="table text-center">
											
									
									<?php
									 $a=0;
									$result = DB::table('tbl_chitietdonhang')->select('TenSP','tbl_sanpham.id','tbl_sanpham.ID_Thuonghieu','Gia','tbl_chitietdonhang.SoLuong')->join('tbl_sanpham','tbl_chitietdonhang.ID_SanPham','=','tbl_sanpham.id')->where('ID_DonHang',$item->id)->get();
								
								?>
									@foreach ($result as $item1)
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
									<tr>
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
									<td><button class="btn reE" value="{{$item->id}}"><i class="fas fa-trash-alt text-danger" style=";"></i></button></td>
								</tr>
							  </tbody>
							  @endforeach
							</table>
						
						  </section>
					 </div>
				
			   
			 </div>   









	</div>





</main>

@endsection

@section('script')
	<script>
		$(document).ready(function () {
			
	
			let i=1;
			$.each($('.dem'), function (indexInArray, Element) { 
			
				$(Element).text(i++);
			});
		
			$.each($('.reE'), function (indexInArray, valueOfElement) { 
					 $(valueOfElement).on('click',function(){
					   var ID_DonHang =$(this).val();
					//   console.log(ID_GioHang);
						  $.ajax({
							type: "get",
							url: "/huydonhang",
							data: {
							  ID_DonHang
							},
						   
							success: function (response) {
							  console.log(response);
							  location.reload();
							}
						  });




					 }) 
					 

			  });
		
		
		
		
		
		
		});

	</script>

@endsection

