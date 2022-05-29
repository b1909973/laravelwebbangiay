


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="{{asset('frontend/icon.png')}}" type="image/icon type">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VIA Shop</title>
 <!-- -->

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Love+Light&display=swap" rel="stylesheet">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Fahkwang:ital,wght@1,300&display=swap" rel="stylesheet">


<!--  -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
      main{
        font-family: 'Arsenal', sans-serif;
      }
    </style>
</head>
<body>
   
 
 <header class="p-3  text-white" style="background-color: #303e48;">
      <div class='position-fixed ' style='right:10%;bottom:10%;z-index:1;'>
     <a href="/giohang"><i class="fas fa-shopping-cart fs-1 text-dark " ></i></a> 
      </div>
        <div class="container">
          <div class="d-flex flex-wrap justify-content-lg-start justify-content-center">
              <div class="me-lg-auto ">
                <a href="/trangchu" class=" text-white text-decoration-none">
                  <p  class="fs-2 p-0 m-0" style="font-family: 'Love Light', cursive;">VIA Shop</p>
                   </a>
           
              </div>
           
            <!-- <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                
            
             
            </ul>
     -->
            <form action="{{URL::to('/timkiem')}}" method="get" class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
              <div class="form-inline">
                <div class="input-group" data-widget="sidebar-search">
                  <input class="form-control form-control-sidebar" type="search" name="timkiem" placeholder="Search" aria-label="Search">
                  <div class="input-group-append">
                    <button class="btn btn-sidebar">
                      <i class="fas fa-search fa-fw text-white"></i>
                    </button>
                  </div>
                </div>
              </div>
            </form>
            

                    <!-- Lúc chưa đăng nhập -->
                    <?php
                        $username =Session::get('username');
                        if($username){

                    ?>
                      <div class="dropdown text-end">
                        <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle  text-white" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                          <span>
                          <?php echo 'Hi '.Session::get('HoTen');  ?>
                          </span>
                      
                        </a>
                     
                        <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1" >
                          <!-- <li><a class="dropdown-item" href="#"></a></li> -->
                          <?php
                            $id = session::get('id_khachhang');
                            $i=0;
                            $result=DB::table('tbl_noidungthongbao')->join('tbl_thongbao','tbl_thongbao.id','=','tbl_noidungthongbao.ID_ThongBao')->where('DaXem',0)->where('TatHienThi',0)->get();
                          foreach ($result as $key => $value) {
                            $result2=DB::table('tbl_donhang')->join('tbl_khachhang','tbl_khachhang.id','=','tbl_donhang.ID_KhachHang')->where('tbl_donhang.id',$value->ID_DonHang)->where('ID_KhachHang',$id)->get();
                            //  print_r($result2); 
                              foreach ($result2 as $key => $value2) {
                                $i++;
                              }
                           
                          }
                        
                        ?>
                          <li><a class="dropdown-item" href="{{URL::to('/canhan')}}">Thông tin</a></li>
                        
                          <li><a class="dropdown-item" href="{{URL::to('/thongbao')}}">
                            <?php
                            if($i==0){
                            ?>
                            Thông báo</a></li>
                            <?php }else{
                            ?>
                            Thông báo <span class="badge"><i class="fas fa-circle text-danger"></i></span></a></li>
                            <?php }?>
                          <li><hr class="dropdown-divider"></li>
                          <li><a class="dropdown-item" href="{{URL::to('/dangxuat')}}">Đăng xuất</a></li>
                        </ul>
                      </div>
                                



                        <?php }else { ?>


                <div class="text-end">
                  <button type="button" class="btn btn-outline-secondary me-2 "><a href="{{URL::to('/dangnhap')}}" class="text-decoration-none text-white">Đăng nhập</a> </button>
                  <button type="button" class="btn btn-outline-secondary"> <a href="{{URL::to('/dangky')}}" class="text-decoration-none text-white">Đăng ký</a> </button>
                </div>
                <?php } ?>
            
           


          </div>
        </div>
      </header>

    
    <div class="d-flex flex-wrap py-3  justify-content-center border-bottom">
       
        <ul class="nav col-12  mb-2 justify-content-center  mb-md-0">
          <li><a href="{{URL::to('/nike')}}" class="nav-link px-2 link-dark me-2 nike ">GIÀY NIKE</a></li>
          <li><a href="{{URL::to('/adidas')}}" class="nav-link px-2 link-dark  me-2 adidas">GIÀY ADIDAS</a></li>
          <li><a href="{{URL::to('/vans')}}" class="nav-link px-2 link-dark  me-2 vans">GIÀY VANS</a></li>
       
         
        </ul>
       
    </div>
      
   <!--  -->
      @yield('content')
   <!--  -->

   
     <div class="container-fluid p-0" >
      <footer class="text-center text-lg-start bg-light border-top " >
        <div class="container-fluid d-flex justify-content-center py-3 " style="background-color: #f0f0f0;" >
        
          <div class="me-3">
            <i class="fab fa-facebook " style="font-size: 30px;color: #3B5998;"></i>
          </div>
          <div class="me-3" >
            <span class="instagram" style="
              display: inline-block;
              width: 28px;
              height: 28px;
              text-align: center;
              border-radius: 8px;
              color: #fff;
              font-size: 220px;
              line-height: 250px;
            position: relative;
              
              background: radial-gradient(circle at 30% 107%, #fdf497 0%, #fdf497 5%, #fd5949 45%,#d6249f 60%,#285AEB 90%);
              box-shadow: 0px 3px 10px rgba(0,0,0,.25);
            ">
            <i class="fab fa-instagram" style="font-size: 30px;position:absolute;left: 1px;" ></i>
                  </span>
           </div>
           <div class="me-3">
            <i class="fab fa-twitter"  style="font-size: 30px;color: #1DA1F2;"></i>
           </div>
              
         
        </div>
    
        <!-- Copyright -->
        <div class="text-center p-2 border bg-light">
          © 2022 Copyright:
          <a class="text-decoration-none" href="../page/index.php">VIA.VN</a>
        </div>
        <!-- Copyright -->
      </footer>
      
    </div></body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

@yield('script')

</html>