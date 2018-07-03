
@extends('Admin.layouts.app')
   
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3 class="card-title"><span class="fa fa-pencil-square-o fa-lg"></span><span> Add</span></h3>
          </div>
          
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-info card-outline">
            <div class="card-header">
              <h3 class="card-title">
               
                <small></small>
              </h3>
              <!-- tools box -->
              
              <!-- /. tools -->
            </div>
            <!-- /.card-header -->
             @if(count($errors) > 0)
          <div class="alert alert-danger">
              <ul>
              @foreach($errors->all() as $error)
              <li>{{$error}}</li>
              @endforeach
              </ul>
          </div>
          @endif
          @if(\Session::has('success'))
          <div class="alert alert-success">
              {{\Session::get('success')}}
          </div>
          @endif
                <form role="form" method="post" action="save_cms_page" enctype="multipart/form-data">
                  {{csrf_field()}}
                  <div class="row col-md-12">
                      <div class="col-md-6 col-sm-12">
                          <div class="form-group">
                                <label for="title">Title</label>
                            <input type="text" class="form-control" name="title" id="title" placeholder="Enter title">
                          </div>
                      </div>
                      <div class="col-md-6 col-sm-12">
                           <div class="form-group">
                                <label for="title">Sub Title</label>
                            <input type="text" class="form-control" name="subtitle" id="subtitle" placeholder="Enter Sub title">
                          </div>
                      </div>
                  </div>
                  <div class="row col-md-12">
                      <div class="col-md-6 col-sm-12">
                          <div class="form-group">
                                <label for="image">Choice Image</label>
                            <input type="file" class="form-control" name="image" id="image" placeholder="Enter image">
                          </div>
                      </div>
                      
                  </div>
                  <div class="card-body">
                        <div class="mb-3">
                            <textarea id="editor1" name="editor1" style="width: 100%"></textarea>
                        </div>
                  </div>
                   <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Add Item</button>
                </div>
                </form>
            
          </div>
          <!-- /.card -->

        
        </div>
        <!-- /.col-->
      </div>
      <!-- ./row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@stop