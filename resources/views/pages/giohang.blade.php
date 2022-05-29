
@extends('index')
@section('content')
	<main style="min-height:515px;">
		<div class="container  " style="min-height: 416px;">
			<h2 class="text-center mt-2" style="color: #303e48 ;">Giỏ hàng của tôi</h2>
		
			<table class="table text-center ">
										<thead>
										<tr class="">
										
											<th scope="col">Sản phẩm</th>
											<th scope="col">Tên Sản Phẩm</th>
											<th scope="col">Giá</th>
											<th scope="col">Số lượng</th>
											<th scope="col">Tổng tiền</th>
											<th scope="col"></th>
											<th scope="col"></th>
											<th scope="col"></th>
										</tr>
										</thead>
										@foreach ($sp as $item)
											
									
										<tr>
											<td>
											
											<?php	

												$result=DB::table('tbl_hinhanh')->select('HinhAnh')->where('ID_SanPham',$item->ID_SanPham)->get();
											
												$thuonghieu=DB::table('tbl_sanpham')->select('ID_Thuonghieu')->where('id',$item->ID_SanPham)->first();
												$th=0;
												if($thuonghieu->ID_Thuonghieu==1){
												$th='nike';
												}else if($thuonghieu->ID_Thuonghieu==2){
													$th='adidas';
												}else{
													$th='vans';
												}
											?>
											
												<img src="{{ asset('frontend/image/') }}<?php echo '/'.$th; ?>{{ '/'.$result[0]->HinhAnh}}" alt="" style="width: 100px;"></td>
											<td>{{$item->TenSP}}</td>
											<?php  if($item->GiaGiam==0){
													$gia=$item->GiaChinhThuc;
													}else{
														$gia=$item->GiaGiam;
													}
												?>
											<td>{{$gia}}</td>

											<td>{{$item->SoLuong}}</td>
											
											<td class="tong">{{$item->SoLuong*$gia }}</td>
											<td><button class="rounded add btn " value='{{$item->id}}'><i class="fas fa-plus text-primary"></i></button></td> 
											<td><button  class="rounded divide btn " value='{{$item->id}}'><i class="fas fa-minus"></i></button></td>
											<td><button  class="rounded del btn" value='{{$item->id}}'><i class="fas fa-trash-alt text-danger	"></i></button></td>
										</tr>
										@endforeach
									</table>
								

			<div class="text-center mt-5 mb-3 fs-3 border-top border-bottom"><strong>Tổng</strong> : <span class="result">0</span>đ</div>
			<div class="text-center">
						<button class="btn btn-outline-primary p-3 dh">Đặt hàng</button>
			</div>
		</div>
	

	</main>	
			

@endsection


	@section('script')
	<script>
		$(document).ready(function () {

			var total=0;

			$.each($('.total'), function (indexInArray, valueOfElement) { 
				console.log($(valueOfElement).text());
				total +=parseInt(($(valueOfElement).text()));
			  

			});
			$('.result').text(total);

			  $.each($('.add'), function (indexInArray, valueOfElement) { 
					 $(valueOfElement).on('click',function(){
					   var ID_GioHang =$(this).val();
				//	   console.log(ID_GioHang);
						  $.ajax({
							type: "get",
							url: "/add",
							data: {
							  ID_GioHang
							},
						   
							success: function (response) {
							  console.log(response);
							
							  if(response==0){
								  alert('Số lượng trong kho không đáp ứng');
							  }else{
								location.reload();
							  }

							}
						  });




					 }) 


			  });

			  $.each($('.divide'), function (indexInArray, valueOfElement) { 
					 $(valueOfElement).on('click',function(){
					   var ID_GioHang =$(this).val();
					//   console.log(ID_GioHang);
						  $.ajax({
							type: "get",
							url: "/divide",
							data: {
							  ID_GioHang
							},
						   
							success: function (response) {
							  console.log(response);
							  location.reload();
							}
						  });




					 }) 
					 

			  });
			  $.each($('.del'), function (indexInArray, valueOfElement) { 
					 $(valueOfElement).on('click',function(){
					   var ID_GioHang =$(this).val();
					   console.log(ID_GioHang);
						  $.ajax({
							type: "get",
							url: "/del",
							data: {
							  ID_GioHang
							},
						   
							success: function (response) {
							  console.log(response);
							  location.reload();
							}
						  });




					 }) 
					 

			  });
			  var tong = 0;
			  $.each($('.tong'), function (indexInArray, valueOfElement) { 
				
				tong +=Number($(valueOfElement).text());
				



			  });
			  $('.result').text(tong);

			  $('.dh').on('click',function(){
					var dh = 1;
					  
						  $.ajax({
							type: "get",
							url: "/dathang",
							data: {
							 dh
							},
						   
							success: function (response) {
								console.log(response);
								if(response=='0'){
									alert('Số lượng trong kho không đáp ứng');
								}else{
									alert('Đặt hàng thành công')
								location.href='/quanlidonhang';
								}
								
							 // var temp=0;
							// $.each($('.IDsp'), function (indexInArray, valueOfElement) { 

							//   if(response.trim()==$(valueOfElement).text()){
							// 	$(valueOfElement).parent().addClass('bg-secondary')
							// 	  temp=1;
							// 	  alert('Số lượng trong kho không đủ đáp ứng');
							//   }
							  




							// });
							// if(temp==0){
							//   alert("Đặt hàng thành công");
							// 	location.href='quanlidonhang.php';
							// }
							
						   
							}
						  });




					 }) 






		});


	</script>
	@endsection