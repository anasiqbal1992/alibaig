
@extends('Admin.layouts.app')
   
@section('content')
<div class="content-wrapper">
   

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title"><span class="fa fa-plus fa-lg"></span><span> Add</span></h3>

          
        </div>
        <div class="card-body">
          <!-- form ---->
          @if (count($errors) > 0)
         <div class = "alert alert-danger">
            <ul>
               @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
               @endforeach
            </ul>
         </div>
      @endif
      
          @if (\Session::has('success'))
      <div class="alert alert-success">
          <p>{{ \Session::get('success') }}</p>
      </div><br />
      @endif
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Menu Veg Item</h3> 
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{ route('permission.store') }}" method="post" enctype="multipart/form-data">
                 {{csrf_field()}}
                 {{ method_field('PUT') }}
                <div class="card-body">
                    <div class="row col-md-12">
                     <div class="col-md-6 col-sm-12" >
                        <div class="form-group">
                             <label for="name">Permission</label>
<input type="text" class="form-control" id="name" name="name" placeholder="Permission" value="{{ $permission->name }}">
                        </div>
                      </div>
                    
                   </div>
                    
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Add Item</button>
                   <a href="{{ route('permission.index') }}" class="btn btn-warning">Back</a>
                </div>
              </form>
            </div>
            <!-- /.card -->

 
            
          <!--- close --->  
        </div>
        <!-- /.card-body -->
@stop