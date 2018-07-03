
@extends('Admin.layouts.app')
   
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title"><span class="fa fa-pencil fa-lg"></span><span> Edit</span></h3>

         
        </div>
        <div class="card-body">
          <!-- form ---->
          @if(count($errors) > 0)
         <div class="alert alert-danger">
             <ul>
                 @foreach($errors->All() as $error)
                 <li> {{$error}} </li>
                 @endforeach
             </ul>
         </div>
          @endif
         
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Menu Specail Item</h3> 
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form"   action="{{ url('update_special/'.$id)}}" method="POST"  enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                <div class="card-body">
                   
                    <div class="row col-md-12">
                     <div class="col-md-6 col-sm-12" >
                         
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" name="title" id="title" value="{{ old('title') ? old('title') : $data->title }}">
                        </div>
                      </div>
                       
                         <input type = "hidden" name = "image_old" value = "{{$data->image}}">
                    <div class="col-md-6 col-sm-12" >
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="text" class="form-control" name="price" id="price" value="{{old('price') ? old('price') : $data->price}}">
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
                                <label class="custom-file-label" for="image"></label>
                                </div>
                                <div class="input-group-append">
                                <span class="input-group-text" id=""><img src="{{ asset('uploads/'.$data->image)}}" alt="image" class="img-squre img-size-50 mr-2"></span>
                           
                                    
                            </div>
                           
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Category</label>
                            <input type="text" class="form-control" id="type" name="type" value="{{$data->type}}" readonly>
                        </div>
                      </div>
                    <div class="col-md-6 col-sm-12" >
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" rows="3" name="discription" id="discription" >{{old('discription') ? old('discription') : $data->discription}}</textarea>
                        </div>
                    </div>
                   </div>
                    
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update Item</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

 
            
          <!--- close --->  
        </div>
        <!-- /.card-body -->
        </div>
    </section>
</div>
@stop