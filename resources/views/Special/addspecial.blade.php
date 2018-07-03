
@extends('Admin.layouts.app')
   
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title"><span class="fa fa-plus fa-lg"></span><span> Add</span></h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
          <!-- form ---->
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
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Menu Special Item</h3> 
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="save_special" method="post" enctype="multipart/form-data">
                  {{csrf_field()}}
                <div class="card-body">
                    <div class="row col-md-12">
                     <div class="col-md-6 col-sm-12" >
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" name="title" id="title" placeholder="Enter title">
                        </div>
                      </div>
                    <div class="col-md-6 col-sm-12" >
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="text" class="form-control" name="price" id="price" placeholder="Enter price">
                        </div>
                    </div>
                   </div>
                    <div class="row col-md-12">
                     <div class="col-md-6 col-sm-12" >
                         <div class="form-group">
                            <label for="InputFile">Image</label>
                            <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="image" id="image">
                                <label class="custom-file-label" for="image">Choose image</label>
                            </div>
                            
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Category</label>
                            <input type="text" class="form-control" id="type" name="type" value="special" readonly>
                        </div>
                      </div>
                    <div class="col-md-6 col-sm-12" >
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" rows="3" name="discription" id="discription" placeholder="Enter ..."></textarea>
                        </div>
                    </div>
                   </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Add Item</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

 
            
          <!--- close --->  
        </div>
        <!-- /.card-body -->
@stop