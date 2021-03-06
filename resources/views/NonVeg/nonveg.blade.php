
@extends('Admin.layouts.app')
   
@section('content')
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Non Veg</h3>

           @if(\Session::has('success'))
         <div class="alert alert-success">
             {{\Session::get('success')}}
         </div>
         @endif
        </div>
        <div class="card-body">
         <a href="{{URL('add_nonveg')}}" class="btn btn-primary"><span class="fa fa-plus fa-lg"></span><span> Non Veg Item</span></a>
          <table class="table table-striped table-valign-middle">
                  <thead>
                  <tr>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Price</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                      
                      @foreach($data as $element)
                  <tr id="product{{$element->id}}">
                    <td>
                      <img src="{{ asset('uploads/'.$element->image)}}" alt="image" class="img-squre img-size-100 mr-2">
                      
                    </td>
                    <td>{{$element->title}}</td>
                    <td><i class="fa fa-inr" aria-hidden="true"> {{$element->price}}</i> </td>
                    <td><a href="{{URL:: asset('edit_nonveg/'.$element->id)}}"class="btn btn-info"><span class="fa fa-pencil fa-lg"></span><span> Edit</span></a>
                     <button type="button"  data-id="{{$element->id}}" class="btn btn-danger delete-product"><span class="fa fa-trash fa-lg"></span><span> Delete</span></button></td>
                  </tr>
                 @endforeach
                
                  </tbody>
                  
                </table>
        </div>
        <!-- /.card-body -->
@stop