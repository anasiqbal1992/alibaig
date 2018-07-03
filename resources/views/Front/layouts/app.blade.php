<!DOCTYPE html>
<html lang="en">

  <head>
      <script>
      window.onpageshow = function (event) {
        if (event.persisted) {
            window.location.reload();
           
            //reload page if it has been loaded from cache
        }
        };
        
      </script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Ali baig</title>

    <!-- Bootstrap core CSS -->
    

    <!-- Custom fonts for this template -->
    <link href="{{ URL::asset('css/shop-homepage.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ URL::asset('Admin/plugins/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css">
    <link rel="stylesheet" href="{{ URL::asset('Admin/dist/css/adminlte.min.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css')}}" >
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.css')}}" >
    <link rel="stylesheet" href="{{ URL::asset('css/style.css')}}" >
    <link rel="stylesheet" href="{{ URL::asset('css/jquery-confirm.min.css')}}">
     <link rel="stylesheet" href="{{ URL::asset('css/app.css')}}">
    
    
    
  </head>

  <body>

    <!-- Navigation -->
    <div id="app">
     <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#">Ali Baig</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="chat">Chat</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Services</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact">Contact</a>
            </li>
          
                  <li class="nav-item">
                <a class="nav-link" href="{{ url('cart')}}"><i class="fa fa-shopping-basket"><span class="count badge badge-success">{{Cart::count()}}</span></i>
                    
                </a>
            </li>
                        <!-- Authentication Links -->
                        @guest
                            <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                            <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                        @else
                            <li class="nav-item">
                              
                                    <a class="nav-link" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                
                            </li>
                            <order-alert user_id="{{auth()->user()->id}}"></order-alert>
                        @endguest
                    </ul>
            
        </div>
      </div>
    </nav>
   
   
   

    <!-- Main Content -->
    @yield('content') 

    <!-- Footer -->
     <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright anasiqbal&copy; Your Website 2018</p>
      </div>
      <!-- /.container -->
    </footer>
 </div>
    <!-- Bootstrap core JavaScript -->
    <script src="{{ URL:: asset('js/app.js')}}"></script>
<script src="{{ URL:: asset('js/jquery.min.js')}}"></script>
 <script src="{{ URL:: asset('js/bootstrap.min.js')}}"></script>
   <script src="{{ URL:: asset('js/bootstrap.bundle.min.js')}}"></script>
   <script src="{{ URL:: asset('js/clean-blog.min.js')}}"></script>
    <script src="https://js.stripe.com/v3/"></script>
     <script src="{{ URL:: asset('js/custom.js')}}"></script>
     <script src="{{ URL:: asset('js/ajexscript.js')}}"></script>
    <script src="{{ URL:: asset('js/jquery-confirm.min.js')}}"></script>

  </body>

</html>
