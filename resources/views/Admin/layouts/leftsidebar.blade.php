 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ url('Admin/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Ali Baik</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ url('Admin/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Anas Iqbal</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fa fa-dashboard"></i>
              <p>
                Dashboard
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ URL('veg') }}" class="nav-link active">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Veg</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ URL('nonveg') }}" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Non Veg</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ URL('special')}}" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Special</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ URL('beverages')}}" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Beverages</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ URL('cms_posts') }}" class="nav-link">
                  <i class="fa fa-list-alt nav-icon"></i>
                  <p>Front Pages</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{URL('orders')}}" class="nav-link">
              <i class="nav-icon fa fa-comment"></i>
              <p>
                Orders
                
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('comments.admin')}}" class="nav-link">
              <i class="nav-icon fa fa-comment"></i>
              <p>
                Comments
                
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{URL('admin-user')}}" class="nav-link">
              <i class="nav-icon fa fa-user"></i>
              <p>
                User
                
              </p>
            </a>
          </li>
         <li class="nav-item">
            <a href="{{route('role.index')}}" class="nav-link">
              <i class="nav-icon fa fa-circle-o"></i>
              <p>
                Role
                
              </p>
            </a>
          </li>
         <li class="nav-item">
            <a href="{{route('permission.index')}}" class="nav-link">
              <i class="nav-icon fa fa-circle-o"></i>
              <p>
                Permissions
                
              </p>
            </a>
          </li>
         
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>