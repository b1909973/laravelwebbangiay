
@extends('index')
@section('content')

<main class="" style="min-height: 524px;">
	<div class="container">
		<div class="row mx-auto">
				<div class="col-md-3 ">
				  
					<p class="mt-4"> Tài khoản của <br><span><strong class="ms-2">{{ $kh->HoTen}}</strong></span></p>
					<p> </p>
					<hr>
					<ul class="list-group list-group-flush">
						<li class="list-group-item  "><a href="" class="text-decoration-none text-dark">Thông tin tài khoản</a> </li>
						<li class="list-group-item"><a href="{{URL::to('/thongbao')}}" class="text-decoration-none text-dark">Thông báo của tôi</a> </li>
						<li class="list-group-item"><a href="{{URL::to('quanlidonhang')}}" class="text-decoration-none text-dark manager">Quản lý đơn hàng</a> </li>
						<li class="list-group-item"><a href="{{URL::to('doimatkhau')}}" class="text-decoration-none text-dark changePass">Đổi mật khẩu</a></li>
			
					</ul>
				</div>

			  
				<div class=" col-md-9 content ">
				 
					<h3 class="m-4">Thông tin tài khoản</h3>
					<div class="col-md-7  border py-4 rounded ">
						<div class="col-11 mx-auto">
							<p class="fs-5">Thông tin cá nhân</p>
							<div class="row mb-4">
								<label for="fullname" class="col-sm-3 col-form-label">Họ và Tên:</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" id="fullname" name="fullname" value="{{ $kh->HoTen}}" disabled>
								</div>
							</div>
						   
							<div class="row mb-4">
							  <label for="birtday" class="col-sm-3 col-form-label">Quê quán:</label>
							  <div class="col-sm-9">
								  <input type="text" class="form-control" id="hometown" name="hometown" value="{{ $kh->DiaChi}}" >
							  </div>
						
							</div>
							
						 
					   
					   
							<div class="row mb-4">
								<label for="phone" class="col-sm-3 col-form-label">Số điện thoại:</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" id="phone" name="phone" value="{{ $kh->SoDienThoai}}"  disabled>
								</div>
							</div>
							<div class="row mb-4">
								<div class="col-4 offset-9"><button class="btn btn-primary capnhat  text-white">Cập nhật</button></div>
									
							</div>
							<div  class="row mb-4">
								<p class="text-success text-center dung d-none">Cập nhật thành công</p>
								<p class="text-danger text-center sai d-none	">Cập nhật thất bại</p>

							</div>
						  
				</div>
			   
				  





				</div>
			 


		</div>
	   






	</div>





</main>
@endsection

@section('script')
	<script>
			$(document).ready(function () {
				
				$('.capnhat').click(function () { 
					var a= $('#hometown').val();
					a.trim();
					console.log(a);
					if(a==''){
						if(	!$('.dung').hasClass('d-none')){
											$('.dung').addClass('d-none')
										}

										$('.sai').removeClass('d-none');
					}else{

						$.ajax({
							type: "get",
							url: "/capnhatdiachi",
							data: {
								a
							},
							success: function (response) {
									if(response=='1'){
										if(	!$('.sai').hasClass('d-none')){
											$('.sai').addClass('d-none')
										}
											$('.dung').removeClass('d-none');
									}else{
										if(	!$('.dung').hasClass('d-none')){
											$('.dung').addClass('d-none')
										}

										$('.sai').removeClass('d-none');
									}			
							}
						});
					}
						//console.log(a)
						

				});


			});




	</script>

@endsection

