
@extends('Admin.layouts.app')
   
@section('content')
<div class="content-wrapper">
    

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Permission</h3>

        </div>
           @if(\Session::has('success'))
         <div class="alert alert-success">
             {{\Session::get('success')}}
         </div>
         @endif
        <div class="card-body">
            <a href="{{route('permission.create')}}" class="btn btn-primary"><span class="fa fa-plus fa-lg"></span><span>Add New</span></a>
         <table class="table table-striped table-valign-middle">
                  <thead>
                  <tr>
                    <th>S.No</th>
                    <th>Permission Name</th>
                    <th>Permission For</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                      
                       @foreach ($permissions as $permission)
                          <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $permission->name }}</td>
                            <td>{{ $permission->for }}</td>
                             
                    <td><a href="{{ route('permission.edit',$permission->id) }}" class="btn btn-info"><span class="fa fa-pencil fa-lg"></span><span> Edit</span></a>
                    <button type="button"  data-id="{{$permission->id}}" class="btn btn-danger delete-product"><span class="fa fa-trash fa-lg"></span><span> Delete</span></button></td>
                  </tr>
                 @endforeach
                
                  </tbody>
                </table>
        </div>
        <!-- /.card-body -->
@stop