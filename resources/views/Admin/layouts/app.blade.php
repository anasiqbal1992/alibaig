<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>

    @include('Admin.layouts.head')
    <div id="app">
    <body class="hold-transition sidebar-mini">
       
        <div class="wrapper">
            @include('Admin.layouts.header')
             @include('Admin.layouts.leftsidebar')
             
             @yield('content')
         
        <div class="card-footer">
          Footer
        </div>
        <!-- /.card-footer-->
     
      <!-- /.card -->
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
            @include('Admin.layouts.footer')
        </div> 
        
    
<!-- jQuery -->
<script src="{{ URL:: asset('Admin/plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<!-- <script src="{{ URL:: asset('Admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script> -->
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="{{ URL:: asset('Admin/plugins/morris/morris.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{ URL:: asset('Admin/plugins/sparkline/jquery.sparkline.min.js')}}"></script>
<!-- jvectormap -->
<script src="{{ URL:: asset('Admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{ URL:: asset('Admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ URL:: asset('Admin/plugins/knob/jquery.knob.js')}}"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
<script src="{{ URL:: asset('Admin/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- datepicker -->
<!-- <script src="{{ URL:: asset('Admin/plugins/datepicker/bootstrap-datepicker.js')}}"></script> -->
<!-- Bootstrap WYSIHTML5 -->
<!-- <script src="{{ URL:: asset('Admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script> -->
<!-- Slimscroll -->
<script src="{{ URL:: asset('Admin/plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{ URL:: asset('Admin/plugins/fastclick/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ URL:: asset('Admin/dist/js/adminlte.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ URL:: asset('Admin/dist/js/pages/dashboard.js')}}"></script>

<script src="{{ URL:: asset('Admin/plugins/ckeditor/ckeditor.js')}}"></script>
<!-- <script src="{{ URL:: asset('Admin/dist/js/plugins/bootstrap/js/bootstrap.min.js')}}"></script> -->

<script src="{{ URL:: asset('js/jquery-confirm.min.js')}}"></script>
<script src="{{ URL:: asset('js/ajexscript.js')}}"></script>
<script src="{{ URL:: asset('Admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ URL:: asset('Admin/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ URL:: asset('Admin/dist/js/demo.js')}}"></script>
<script src="{{ URL:: asset('js/custom.js')}}"></script>
<script src="{{ URL:: asset('js/app.js') }}"></script>
<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    ClassicEditor
      .create(document.querySelector('#editor1'))
      .then(function (editor) {
        // The editor instance
      })
      .catch(function (error) {
        console.error(error)
      })

    // bootstrap WYSIHTML5 - text editor

    $('.textarea').wysihtml5({
      toolbar: { fa: true }
    })
  })
</script>
<script>
  $(function () {
    $("#example1").DataTable();
  });
</script>
<script>
    /*
 $(document).on('click','.delete-product',function(){
       
        var id = $(this).attr('data-id');
        $.ajax({
            type: "DELETE",
            url: 'delete_beverages/' + id,
            data: {
                      somefield: "Some field value", _token: '{{csrf_token()}}' 
                },
            success: function (data) {
               
                console.log(data);
                $("#product" + id).remove();
            },
            error: function (data) {
                
                console.log('Error:', data);
            }
        });
    });    
    */
</script>
 

    </body>
</html>
