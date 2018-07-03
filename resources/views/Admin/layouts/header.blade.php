<!-- Navbar -->
  <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fa fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      
      <!-- Notifications Dropdown Menu -->
      <!-- <li class="nav-item dropdown" id="markAsRead" onclick="markNotificationAsRead();">
        <a class="nav-link" data-toggle="dropdown" href="#">
        <span class="fa fa-bell"></span><span class="badge badge-warning">{{count(auth()->user()->unreadNotifications)}}</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          @foreach(auth()->user()->unreadNotifications as $notification)
          @include('Notification.'.snake_case(class_basename($notification->type)))
           
          <div class="dropdown-divider"></div>
          @endforeach
        </div>
      </li> -->
    <notification :adminid="{{auth()->id()}}" :unreads="{{auth()->user()->unreadNotifications}}"></notification>
    
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">{{auth::user()->name}}
        <span class="fa fa-caret-down"></span>
       
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <div class="dropdown-divider"></div>
                     
    <a  href="{{ route('logout') }}" class="dropdown-item fa fa-sign-out mr-2"  onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
          </a>
           <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                            </form>
          <div class="dropdown-divider"></div>
          <a href="{{URL('index')}}" class="dropdown-item">
            <i class="fa fa-globe mr-2"> Ali Baik</i> 
            
          </a>      
        </div>
      </a>      
      
      </li>
     
    </ul>
  </nav>
  <!-- /.navbar -->
  