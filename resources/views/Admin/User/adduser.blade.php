
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
              <form role="form" action="{{ route('admin-user.store') }}" method="post" enctype="multipart/form-data">
                 {{csrf_field()}}
                <div class="card-body">
                    <div class="row col-md-12">
                     <div class="col-md-6 col-sm-12" >
                        <div class="form-group">
                            <label for="name">User Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="User Name" value="{{ old('name') }}">
                        </div>
                      </div>
                    <div class="col-md-6 col-sm-12" >
                        <div class="form-group">
                            <label for="email">Email</label>
<input type="text" class="form-control" id="email" name="email" placeholder="email" value="{{ old('email') }}">
                        </div>
                    </div>
                   </div>
                    <div class="row col-md-12">
                     <div class="col-md-6 col-sm-12" >
                         <div class="form-group">
                           <label for="phone">Phone</label>
<input type="text" class="form-control" id="phone" name="phone" placeholder="phone" value="{{ old('phone') }}">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12" >
                        <div class="form-group">
                             <label for="password">Password</label>
<input type="password" class="form-control" id="password" name="password" placeholder="password" value="{{ old('password') }}">
                        </div>
                        </div>
                      </div>
                    <div class="row col-md-12">
                    <div class="col-md-6 col-sm-12" >
                        <div class="form-group">
                            <label for="password_confirmation">Confirm Passowrd</label>
<input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="confirm passowrd">
                        </div>
                    </div>
                     <div class="col-md-6 col-sm-12" >
                        <div class="form-group">
                           <label for="confirm_passowrd">Status</label>
                  <div class="checkbox">
                    <label ><input type="checkbox" name="status" @if (old('status') == 1)
                      checked
                    @endif value="1">Status</label>
</div>
                        </div>
                    </div>
                    </div>
                     <div class="col-md-6 col-sm-12" >
                        <div class="form-group">
                            <label>Assign Role</label>
                <div class="row">
                  @foreach ($roles as $role)
                      <div class="col-lg-3">
                        <div class="checkbox">
                          <label ><input type="checkbox" name="role[]" value="{{ $role->id }}"> {{ $role->name }}</label>
                        </div>
                      </div>
@endforeach
                        </div>
                    </div>
                   </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Add Item</button>
                   <a href="{{ route('admin-user.index') }}" class="btn btn-warning">Back</a>
                </div>
              </form>
            </div>
            <!-- /.card -->

 
            
          <!--- close --->  
        </div>
        <!-- /.card-body -->
@stop