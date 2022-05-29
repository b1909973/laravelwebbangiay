@extends('ad')

@section('content')
<div class="content-wrapper" style="min-height: 547.2px;">
  <!-- Content Header (Page header) -->
  
  <!-- /.content -->
    
<div class=" col-md-12 col-12 content ">
  <form action="{{URL::to ('admin/thongke')}}" method="get">
  <label for="nam">Năm:</label>
  <select class="sele" name="nam">
    <option value="2022">2022 </option>
    <option value="2023">2023</option>
    <option value="2024">2024</option>
    <option value="2025">2025</option>
    <option value="2026">2026</option>
    <option value="2027">2027</option>
    <option value="2028">2028</option>
    <option value="2029">2029</option>
    <option value="2030">2030</option>
  </select>       
    <input type="submit" value='Tìm' class="btn btn-primary">
</form>
                                <div class="container">
                                     <canvas id="myChart"></canvas>
                            </div>

                    

                 </div>
                   <div>
                                             
                                   
                                   <input type="text"  value="
                                   {{$thang[0]}} " id='t1' class="d-none" >

                                   <input type="text"  value='
                                   {{$thang[1]}}                                  
                                   
                                   ' id='t2'  class="d-none">
                                   <input type="text"  value='
                                   {{$thang[2]}}                                  
                                   
                                   ' id='t3'  class="d-none">
                                   <input type="text"  value='
                                   {{$thang[3]}}                                  
                                   ' id='t4'  class="d-none">
                                 
                                   <input type="text"  value='
                                   {{$thang[4]}}                           
                                   
                                   
                                   ' id='t5'  class="d-none">

                                   <input type="text"  value='
                                   {{$thang[5]}}                        
                                   
                                   
                                   ' id='t6'  class="d-none">

                                   <input type="text"  value='
                                   {{$thang[6]}}                                
                                   ' id='t7'  class="d-none">

                                   <input type="text"  value='
                                   {{$thang[7]}}                                   
                                   
                                   
                                   ' id='t8' class="d-none" >

                                   <input type="text"  value='
                                   {{$thang[8]}}                                  
                                   ' id='t9' class="d-none" >

                                   <input type="text"  value='
                                   {{$thang[9]}}                                 
                                   
                                   
                                   ' id='t10' class="d-none" >
                                   <input type="text"  value='
                                   
                                   {{$thang[10]}} ' id='t11' class="d-none" >
                                   <input type="text"  value='
                                   
                                   {{$thang[11]}}                                
                                   ' id='t12' class="d-none" >

                                     <div class='text-center mt-3 fs-3'> <b>Tổng doanh thu : </b><span id="tong" > </span>đ</div>
                   </div>
                      
                    <div class="d-none " id="titleofyears">Danh thu shop năm {{$nam}}</div>




             </div>
            </div> 
             @endsection


             @section('script')
             <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
            <script>
              $(document).ready(function () {
                  var tong =0;
                  tong +=Number($('#t1').val());
                  tong +=Number($('#t2').val());
                  tong +=Number($('#t3').val());
                  tong +=Number($('#t4').val());
                  tong +=Number($('#t5').val());
                  tong +=Number($('#t6').val());
                  tong +=Number($('#t7').val());
                  tong +=Number($('#t8').val());
                  tong +=Number($('#t9').val());
                  tong +=Number($('#t10').val());
                  tong +=Number($('#t11').val());
                  tong +=Number($('#t12').val());

                $('#tong').text(tong);


              });
            </script>
        <script>

    let myChart = document.getElementById('myChart').getContext('2d');
    // Global Options
    Chart.defaults.global.defaultFontFamily = 'Lato';
    Chart.defaults.global.defaultFontSize = 18;
    Chart.defaults.global.defaultFontColor = '#777';

    let massPopChart = new Chart(myChart, {
      type:'bar', // bar, horizontalBar, pie, line, doughnut, radar, polarArea
      data:{
        labels:['1', '2', '3', '4', '5','6','7','8','9','10','11','12'],
        datasets:[{
          label:'Doanh thu',
          data:[
           document.getElementById('t1').value,
           document.getElementById('t2').value,
           document.getElementById('t3').value,
           document.getElementById('t4').value,
           document.getElementById('t5').value,
           document.getElementById('t6').value,
           document.getElementById('t7').value,
           document.getElementById('t8').value,
           document.getElementById('t9').value,
           document.getElementById('t10').value,
           document.getElementById('t11').value,
           document.getElementById('t12').value,
        
          ],
          //backgroundColor:'green',
          backgroundColor:[
            'rgba(255, 99, 132, 0.6)',
            'rgba(255, 99, 132, 0.6)',
            'rgba(255, 99, 132, 0.6)',
            'rgba(255, 99, 132, 0.6)',
            'rgba(255, 99, 132, 0.6)',
            'rgba(255, 99, 132, 0.6)',
            'rgba(255, 99, 132, 0.6)',
            'rgba(255, 99, 132, 0.6)',
            'rgba(255, 99, 132, 0.6)',
            'rgba(255, 99, 132, 0.6)',
            'rgba(255, 99, 132, 0.6)',
            'rgba(255, 99, 132, 0.6)',
          ],
          borderWidth:1,
          borderColor:'#777',
          hoverBorderWidth:3,
          hoverBorderColor:'#000'
        }]
      },
      options:{
        title:{
          display:true,
          text:document.getElementById('titleofyears').innerText,
          fontSize:10
        },
        legend:{
          display:true,
          position:'right',
          labels:{
            fontColor:'#000'
          }
        },
        layout:{
          padding:{
            left:50,
            right:0,
            bottom:0,
            top:0
          }
        },
        tooltips:{
          enabled:true
        }
      }
    });
    </script>
  @endsection