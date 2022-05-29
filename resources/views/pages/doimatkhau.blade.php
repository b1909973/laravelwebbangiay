
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
						<li class="list-group-item  "><a href="{{URL::to('canhan')}}" class="text-decoration-none text-dark">Thông tin tài khoản</a> </li>
						<li class="list-group-item"><a href="{{URL::to('/thongbao')}}" class="text-decoration-none text-dark">Thông báo của tôi</a> </li>
						<li class="list-group-item"><a href="{{URL::to('quanlidonhang')}}" class="text-decoration-none text-dark manager">Quản lý đơn hàng</a> </li>
						<li class="list-group-item"><a href="" class="text-decoration-none text-dark changePass">Đổi mật khẩu</a></li>
			
					</ul>
				</div>

			  
				<div class=" col-md-9 content ">
    
 

                
                    <!-- <div class="col-md-9 col-12 my-3"> -->
                        <h3 class="my-3">Đổi mật khẩu</h3>
                        <form class="col-md-7 border py-4 rounded " action="../xuly/xuly_dmk.php" method="post">
                            <div class="col-11 mx-auto">
                                <p class="fs-5"></p>
                                <div class="row mb-4">
                                    <label for="password" class="col-sm-3 col-form-label">Mật khẩu cũ:</label>
                                    <div class="col-sm-9">
                                        <input type="password" class="form-control" id="password" name="password">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="newpassword" class="col-sm-3 col-form-label">Mật khẩu mới:</label>
                                    <div class="col-sm-9">
                                        <input type="password" class="form-control" id="newpassword" name="newpassword">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="renewpassword" class="col-sm-3 col-form-label">Nhập lại mật khẩu mới:</label>
                                    <div class="col-sm-9">
                                        <input type="password" class="form-control" id="renewpassword" name="renewpassword">
                                    </div>
                                </div>

                            
                                <div class="row">
                                    <div class="col-sm-10 offset-sm-8">
                                        <input type="submit" class="btn text-white btn-primary" name="submit_change" id="submit_change" value="Lưu thay đổi">
                                    </div>
                                    <div class="text-center py-2 text-success d-none Success"><i> Cập nhật thành công</i></div>
                                    <div class="text-center py-2 text-danger d-none Failure"><i> Cập nhật không thành công</i></div>
                                </div>
                             
                            </div>
                           
                        </form>
                      
                        
                


 


  				 </div>
			   
				  





			</div>
			 


		</div>
	   






	</div>





</main>
@endsection


@section('script')
<script>


	$(document).ready(function () {
	  
	
	
	
			$('#submit_change').on('click',function(e){
				
						e.preventDefault();
				
				$.ajax({
					type: "post",
					url: "doimatkhau",
					data: {
						_token: "{{ csrf_token() }}",
						password:$('#password').val(),
						newpassword:$('#newpassword').val(),
						renewpassword:$('#renewpassword').val(),
					},
				
					success: function (response) {
						
							if(response=='1'){
								if(!$('.Failure').hasClass('d-none')){
									$('.Failure').addClass('d-none');
								}
								$('.Success').removeClass('d-none');
							}else{
								if(!$('.Success').hasClass('d-none')){
									$('.Success').addClass('d-none');
								}
								$('.Failure').removeClass('d-none');
							}
					}
				});
	
	
	
	 		 })
	
	
	})
	
	
	
	
	
	</script>
@endsection


