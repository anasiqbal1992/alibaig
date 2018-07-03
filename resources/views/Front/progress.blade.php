@extends('Front.layouts.app')
@section('content')
<div class="container">
    <section class="content">
        <div class="card-body">
            
            @if(count($errors) > 0)
          <div class="alert alert-danger">
              <ul>
              @foreach($errors->all() as $error)
              <li> {{$error}} </li>
              @endforeach
              </ul>
          </div>
          @endif
         @if(\Session::has('success'))
         <div class="alert alert-success">
             {{\Session::get('success')}}
         </div>
         @endif <br>
             <order-progress status="{{ $order->status->name}}" initial="{{ $order->status->percent }}" order_id="{{ $order->id }}"></order-progress>
             
        </div>
        <div class="card-body">
            @if(Session::has('success-comment'))
            <div class="alert alert-success">
                {{Session::get('success-comment')}}
            </div>
            @endif
            <div class="row">
                <div class="col-md-12">
                  <h3 class="comment-title"><span class="fa fa-comment"></span>{{$order->comments->count()}} Comments</h3>
                    @foreach($order->comments as $comment)
                    <div class="comment">
                    <div class="user-info">
                    <img src="{{"https://www.gravatar.com/avatar/".md5(strtolower(trim($comment->email)))."?s=50&d=mm"}}" class="user-image">
                    <div class="user-name"><h4>
                      {{$comment->name}}</h4>
                      
                    <p class="user-time">{{date('F nS,Y - g:iA',strtotime($comment->created_at))}}</p>
                    </div>
                    </div>
                     <div class="comment-content">
                       {{$comment->comment}}
                     </div>
                       
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="row">
                <div id="comment-form" class="col-md-12 col-md-offset-2">

                    {{Form::open(['route' => ['comments.store',$order->id],'method' => 'POST'])}}
                    <div class="row">
                        <div class="col-md-6">
                            {{Form::label('name',"Name:")}}
                            {{Form::text('name',null,['class'=> 'form-control'])}}
                        </div>
                        <div class="col-md-6">
                            {{Form::label('email',"Email:")}}
                            {{Form::text('email',null,['class'=> 'form-control'])}}
                        </div>
                        <div class="col-md-12">
                            {{Form::label('comment',"Comment:")}}
                            {{Form::textarea('comment',null,['class'=> 'form-control','rows' => '5'])}}
                            {{Form::submit('Add Comment',['class' => 'btn btn-block'])}}
                        </div>
                    </div>
                    {{Form::close()}}
                </div>
            </div>
            
        </div>
    </section>
</div>

@stop