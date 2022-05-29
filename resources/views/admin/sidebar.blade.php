<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('frontend/icon.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">VIA Shop</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('adminlte/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">ADMIN</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      {{-- <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> --}}

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
                <i class="fas fa-cart-arrow-down nav-icon"></i>
              <p>
               Đơn hàng
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{URL::to('admin/dangxacnhan') }}"  class="nav-link ">
                    <i class="fas fa-spinner nav-icon"> </i>
                  <p>Chờ xác nhận</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{URL::to('admin/danggiao') }}" class="nav-link">
                    <i class="fas fa-shuttle-van nav-icon"></i>
                  <p>Đang giao</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{URL::to('admin/dagiao') }}" class="nav-link">
                    <i class="fas fa-check-circle nav-icon"></i>
                  <p>Đã giao</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{URL::to('admin/dsbomhang') }}" class="nav-link">
                  <i class="fas fa-bomb nav-icon"></i>
                  <p>Bom hàng</p>
                </a>
              </li>
            </ul>
          </li>
          {{--  --}}

          <li class="nav-item menu-open">
            <a href="" class="nav-link active">
                <i class="fas fa-shoe-prints nav-icon"></i>
              <p>
               Sản phẩm
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <?php
                    $result = DB::table('tbl_danhmuc')->get()
              ?>
              @foreach ($result as $item)
                  
             
              <li class="nav-item">
                <a href="{{URL::to('admin/product/')  }}/{{ $item->id}}" class="nav-link ">
               
                  <p>{{$item->TenDanhMuc}}</p>
                </a>
              </li>
              @endforeach
             
            </ul>
          </li>

          {{--  --}}
         

         
          <li class="nav-item ">
            <a href="{{URL::to('admin/add') }}" class="nav-link active">
                <i class="fas fa-plus nav-icon"></i>
              <p>
                Thêm sản phẩm
                {{-- <span class="right badge badge-danger">New</span> --}}
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{URL::to('admin/thongke')}}" class="nav-link active">
                <i class="fas fa-chart-bar nav-icon"></i>
              <p>
                Thống kê
                {{-- <span class="right badge badge-danger">New</span> --}}
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{URL::to('admin/danhsachkhachhang')}}" class="nav-link active">
              <i class="fas fa-users"></i>
              <p>
                Danh sách khách hàng
                {{-- <span class="right badge badge-danger">New</span> --}}
              </p>
            </a>
          </li>


        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>