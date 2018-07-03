@extends('Front.layouts.app')
@section('content')

<div class="container">
    
  <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Your Order</h3>

        </div>
        <div class="card-body">
        
          <table class="table table-striped table-valign-middle">
                  <thead>
                  <tr>
                   
                    <th>Title</th>
                    <th>Quantity</th>
                    <th> Price</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                      
                  @foreach($cartItems as $cartItem)
                  <tr id="product{{$cartItem->id}}">
                    <td>{{$cartItem->name}}</td>
                    <td>{{$cartItem->qty}}</td>
                    <td><i class="fa fa-inr" aria-hidden="true"> {{$cartItem->options->size}}</i> </td>
                 <td> <button type="button"  data-id="{{$cartItem->id}}" class="btn btn-danger delete-cart"><span class="fa fa-remove fa-lg"></span></button></td>
                   
                  </tr>
                  @endforeach
                  <tr><td colspan="2" >Total Amount</td> <td><i class="fa fa-inr total" aria-hidden="true"> {{Cart::subtotal()}}</i></td> 
                      <td> <a type="button"  class="btn btn-danger delete-cartOrder"><span class="fa fa-trash-o fa-lg"> </span><span>Delete</span></a></td>
                  </tr>
                  <tr><td><a href="{{route('checkout.index')}}" class="btn btn-primary" >Proceed to Checkout</a></td></tr>
                  </tbody>
                  
                </table>
        </div>
        <!-- /.card-body -->
      </div>
  </section>
</div>

@stop