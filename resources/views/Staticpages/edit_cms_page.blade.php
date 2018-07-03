
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
                <form role="form" method="post" action="{{URL('update_cms_page/'.$id)}}" enctype="multipart/form-data">
                   @csrf
                  @method('PUT')
                  <input type="hidden" name="old_image" value="{{$data->image}}">
                  <div class="row col-md-12">
                      <div class="col-md-6 col-sm-12">
                          <div class="form-group">
                                <label for="title">Title</label>
                            <input type="text" class="form-control" name="title" id="title" value="{{ old('title') ? old('title') : $data->title }}">
                          </div>
                      </div>
                      <div class="col-md-6 col-sm-12">
                           <div class="form-group">
                                <label for="title">Sub Title</label>
                            <input type="text" class="form-control" name="subtitle" id="subtitle" value="{{ old('subtitle') ? old('subtitle') : $data->subtitle}}">
                          </div>
                      </div>
                  </div>
                  <div class="row col-md-12">
                      <div class="col-md-6 col-sm-12">
                          <div class="form-group">
                                <label for="image">Choice Image</label>
                            <input type="file" class="form-control" name="image" id="image">
                          </div>
                      </div>
                      
                  </div>
                  <div class="card-body">
                        <div class="mb-3">
                            <textarea id="editor1" name="editor1" style="width: 100%">{{$data->contents}}</textarea>
                        </div>
                  </div>
                   <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Add Post</button>
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