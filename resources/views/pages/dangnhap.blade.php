
@extends('index')
@section('content')
<main>
	<div class="container " style="min-height:476px">
		<div class="row mt-5">
			<div class="col-sm-7 offset-sm-2">

				
				<div class="card m-2">
					<div class="card-header">
						<h3 class="text-center " style="font-family: 'Fahkwang', sans-serif;">Đăng nhập </h3>
					</div>
					<div class="card-body">
						<form id="signup" method="post" class="form-horizontal" action="{{URL::to('dangnhap')}}">
                            {{ csrf_field() }}
						
                          

                            




							<div class="form-group row  mb-3">
								<label class="col-md-3 col-form-label" for="username">Tên đăng nhập:</label>
								<div class="col-md-6">
									<input type="text" class="form-control" id="username" name="username" placeholder="Tên đăng nhập" />
								</div>
							</div>

							<div class="form-group row  mb-3">
								<label class="col-md-3 col-form-label" for="password">Mật khẩu:</label>
								<div class="col-md-6">
									<input type="password" class="form-control" id="password" name="password" placeholder="Mật khẩu" />
								</div>
							</div>
							  <?php 
							$message =Session::get('message');
							if($message){
								echo '<p class="text-center text-danger">'.$message.'</p>';
								Session::put('message',NULL);
							}
						
						
						?>
							
						

						

							<div class="row">
								<div class="col-sm-5 offset-sm-5  mb-3">
									<button type="submit" class="btn btn-primary mb-sm-2 mb-lg-0" name="signup" id='sm' value="Sign up" >Đăng nhập</button>
									<button type="" class="btn btn-success" name="signup" value="Sign up" > <a href="{{URL::to('dangky')}}" class="text-decoration-none text-white" >Đăng ký ngay</a> </button>
								</div>
							</div>
							
							

						</form>
					</div>
				</div>
			</div> <!-- Cột nội dung -->
		</div> <!-- Dòng nội dung -->
	</div> <!-- Container -->
</main>
@endsection