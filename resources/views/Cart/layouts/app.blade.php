<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Ali baig</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ URL::asset('css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="{{ URL::asset('css/shop-homepage.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ URL::asset('Admin/plugins/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('css/jquery-confirm.min.css')}}">
    
  </head>

  <body>

    <!-- Navigation -->
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
              <a class="nav-link" href="about">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Services</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact">Contact</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('cart')}}"><i class="fa fa-shopping-basket"><span class="count">{{Cart::count()}}</span></i>
                    
                </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

   
   

    <!-- Main Content -->
    @yield('content') 

    <!-- Footer -->
     <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2017</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
  

   <script src="{{ URL:: asset('js/jquery.min.js')}}"></script>
   <script src="{{ URL:: asset('js/bootstrap.bundle.min.js')}}"></script>
   <script src="{{ URL:: asset('js/clean-blog.min.js')}}"></script>
   <script src="{{ URL:: asset('js/jquery-confirm.min.js')}}"></script>
    <script>
    jQuery(document).ready(function(){
    // This button will increment the value
    $('.delete-cart').click(function(){
      
        var id = $(this).attr('data-id');
        
        jQuery.confirm({
		title: 'Please Confirm',
                theme: 'black',
		content: 'Are you sure to Delete Menu item ?',
		animation: 'rotate',
		closeAnimation: 'rotateXR',
		icon: 'fa fa-check-square-o',
		confirmButton: 'Delete',
		cancelButton: 'Cancel',
		confirm: function () {
        $.ajax({
            headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
            type: "DELETE",
            url: 'delete_cart/' + id,
            data: {
                      
                },
            success: function (data) {
               
                console.log(data);
                $("#product" + id).remove();
            },
            error: function (data) {
                
                console.log('Error:', data);
            }
        });
        }
    });
   });    
   }); 
</script>
  </body>

</html>
