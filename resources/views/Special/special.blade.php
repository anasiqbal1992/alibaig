
@extends('Admin.layouts.app')
   
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Special</h3>
        </div>
           @if(\Session::has('success'))
         <div class="alert alert-success">
             {{\Session::get('success')}}
         </div>
         @endif
        <div class="card-body">
         <a href="{{ URL('add_special')}}" class="btn btn-primary"><span class="fa fa-plus fa-lg"></span><span> Special</span></a>
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
                    <td>{{$element->price}}</td>
                     <td><a href="{{URL:: asset('edit_special/'.$element->id)}}" class="btn btn-info"><span class="fa fa-pencil fa-lg"></span><span> Edit</span></a>
                    <button type="button"  data-id="{{$element->id}}" class="btn btn-danger delete-product"><span class="fa fa-trash fa-lg"></span><span> Delete</span></button></td>
                  </tr>
                 @endforeach
                
                  </tbody>
                </table>
        </div>
        <!-- /.card-body -->
@stop