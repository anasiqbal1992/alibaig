
@extends('Admin.layouts.app')
   
@section('content')
<div class="content-wrapper">
    

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Admin Users </h3>

        </div>
           @if(\Session::has('success'))
         <div class="alert alert-success">
             {{\Session::get('success')}}
         </div>
         @endif
        <div class="card-body">
            <a href="{{route('admin-user.create')}}" class="btn btn-primary"><span class="fa fa-plus fa-lg"></span><span>Add New</span></a>
         <table class="table table-striped table-valign-middle">
                  <thead>
                  <tr>
                    <th>Name</th>
                    
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                      
                      @foreach($users as $element)
                  <tr id="product{{$element->id}}">
                    
                    <td>{{$element->name}}</td>
                   

                    <td><a href="{{ route('admin-user.edit',$element->id) }}" class="btn btn-info"><span class="fa fa-pencil fa-lg"></span><span> Edit</span></a>
                    <button type="button"  data-id="{{$element->id}}" class="btn btn-danger delete-product"><span class="fa fa-trash fa-lg"></span><span> Delete</span></button></td>
                  </tr>
                 @endforeach
                
                  </tbody>
                </table>
        </div>
        <!-- /.card-body -->
@stop