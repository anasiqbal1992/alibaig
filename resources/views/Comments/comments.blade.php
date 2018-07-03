@extends('Admin.layouts.app')
   
@section('content')
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
    	@if(Session::has('success'))
    	<div class="alert alert-success">
    		{{Session::get('success')}}
    	</div>
    	@endif
	 <div id="backend-comment" style="">
	 	<h3>
	 		Comment <small>{{$comments->count()}} total</small> 
	 	</h3>
	 	<table class="table">
	 		
	 		<thead>
	 			<tr>
	 				<th>Name</th>
	 				<th>Email</th>
	 				<th>Comment</th>
	 				<th>Action</th>
	 			</tr>
	 		</thead>
	 		<tbody>
	 			@foreach($comments as $comment)
	 			<tr id="comment{{$comment->id}}">
	 				<td>{{$comment->name}}</td>
	 				<td>{{$comment->email}}</td>
	 				<td>{{$comment->comment}}</td>
	 				<td>
	 					<a href="{{route('comments.edit',$comment->id)}}" class="btn btn-xs btn-primary"><scan class="fa fa-pencil"></scan></a>
	 					
	 					<button data-id="{{$comment->id}}" class="comment-delete btn btn-xs btn-danger"><scan class="fa fa-trash"></scan></button>
	 					
	 				</td>
	 			</tr>
	 			@endforeach
	 		</tbody>

	 	</table>
	 </div>
	</section>
</div>
@stop