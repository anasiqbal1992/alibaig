@extends('Front.layouts.app')
@section('content')
    <!-- Main Content -->
    <div class="container">
     <!-- /.card -->
            <div class="row">
              <div class="col-6">
                <!-- DIRECT CHAT -->
                <li class="list-group-item active">Chat Room<span class="badge badge-pill badge-danger">@{{numberOfUsers}}</span></li>
                <div class="badge badge-pill badge-primary">@{{typing}}</div> 
                <ul class="list-group list-group1" v-chat-scroll>
				  
				 <message v-for ='value,index in chat.message' :key=value.index :color=chat.color[index] :user=chat.user[index] :time=chat.time[index]>
				 	@{{value}}
				 </message>
				  
				</ul>
				<input type="text" class="form-control" v-model="message" @keyup.enter="send" placeholder="type here...">
				<br>
				<a href='' class="btn btn-warning btn-sm" @click.prevent='deleteSession'>Delete Chats</a>

              </div>
              <!-- /.col -->

              
                 
                  
                
            </div>
            <!-- /.row -->
    </div>

    
@stop