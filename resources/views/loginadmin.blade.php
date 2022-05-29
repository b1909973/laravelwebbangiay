


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
 <!-- -->

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
    .child{
        height:0px;
        overflow: hidden;
        transition: height 1s;
    }

    .parent{
        cursor: pointer;
    }

    .parent:hover .child{
      height:130px;

    }
    .mb-3 img{
        width: 400px;
    }
    .sp img{
        width: 80px;
    }
    .sub-menu {
      position: absolute;
      border:1px solid #ccc;
    }
    .sub-menu li{
      padding:10px 40px;
      list-style: none;
      border-bottom:1px solid #ccc;

    }
    .menu{
      position: relative;
    }
    body{
      background: rgb(2,0,36);
background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,73,121,1) 32%, rgba(0,212,255,1) 100%);
    }
    .card{
      background: rgb(238,174,202);
background: radial-gradient(circle, rgba(238,174,202,1) 0%, rgba(148,187,233,1) 100%);
    }
  </style>
</head>
<body>
 
 
 
       
      
<!-- main-->
    @yield('content')
 <!--  -->
    
   
   
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


</html>