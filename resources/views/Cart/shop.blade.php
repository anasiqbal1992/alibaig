@extends('Front.layouts.app')
@section('content')
 <div class="container">
    
     <section class="content">
        

        @if(count($errors) > 0)
            <div class="spacer"></div>
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{!! $error !!}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <h1 class="card-title">Checkout</h1>
        <div class="col-sm-auto ">
            <div class="col-md-12 row ">
            <div class="col-md-6">
                @if (session()->has('success_message'))
                    <div class="spacer"></div>
                    <div class="alert alert-success">
                        {{ session()->get('success_message') }}
                    </div>
                @endif
        <div class="card-body">
            @if($data->isEmpty())
                <form action="{{ route('address.store') }}" method="POST" id="payment-form">
                    {{ csrf_field() }}
                    <h2>Billing Details</h2>

                    <div class="form-group">
                        <label for="email">Email Address</label>
                        @if (auth()->user())
                            <input type="email" class="form-control" id="email" name="email" value="{{ auth()->user()->email }}" readonly>
                        @else
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}" required>
                    </div>

                    <div class="row">
                     <div class="col-md-6 col-sm-6" >
                        <div class="form-group">
                            <label for="city">City</label>
                            <input type="text" class="form-control" id="city" name="city" value="{{ old('city') }}" required>
                        </div>
                     </div>
                        <div class="col-md-6 col-sm-6" >
                        <div class="form-group">
                            <label for="province">State</label>
                            <input type="text" class="form-control" id="state" name="state" value="{{ old('state') }}" required>
                        </div>
                    </div> <!-- end half-form -->
                   </div>
                    <div class="row">
                     <div class="col-md-6 col-sm-6" >
                        <div class="form-group">
                            <label for="postalcode">Postal Code</label>
                            <input type="text" class="form-control" id="postalcode" name="postalcode" value="{{ old('postalcode') }}" required>
                        </div>
                     </div>
                     <div class="col-md-6 col-sm-6" >
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}" required>
                        </div>
                     </div>
                    </div>
                    <div class="row">
                         <div class="col-md-6 col-sm-6" >
                            <button class="btn btn-cart">Submit Payment</button>
                         </div>
                    </div> <!-- end half-form -->
                  
                    
                    </form>
                    @else
                    <div class="address-box">
                        <div class="address-header">
                            Your Order Address
                        </div>
                        <div class="address-info">
                    @foreach($data as $info)
                    <div class="address-row">
                        Name:  {{$info->name}}
                   </div>
                    <div class="address-row">
                      Address:  {{$info->address}} 
                    </div>
                    <div class="address-row">
                      City:  {{$info->city}} 
                    </div>
                    <div class="address-row">
                      State:  {{$info->state}} 
                    </div>
                    <div class="address-row">
                      Postalcode:  {{$info->postalcode}} 
                    </div>
                    <div class="address-row">
                      Phone:  {{$info->phone}} 
                    </div>
                   
                    
                    @endforeach    
                        </div>
                    </div>
                    @endif
                  
                    <div class="row pay-margin">
                         <div class="col-md-6  col-sm-6" >
                            <button class="pay_card_click btn btn-warning">Pay By Card</button>
                         </div>
                        <div class="col-md-6 col-sm-6" >
                           <a href="{{route('payment.storesPayment')}}" class="pay_ondelivery btn btn-info">Cash On Delivery</a>
                         </div>
                    </div>

                    <div class="pay_form" style="display:none;">       
                        <form action="{{route('payment.storePayment')}}" method="post" id="payment-form">
                                {{ csrf_field() }}
                                <label for="card-element">
                                Credit or debit card
                                </label>
                                <div id="card-element">
                                <!-- A Stripe Element will be inserted here. -->
                                </div>
                                <!-- Used to display Element errors. -->
                                <div id="card-errors" role="alert"></div>
                        <button class="pay_click btn btn-cart">Submit Payment</button>
                        </form>
                    </div>
            </div>

            </div>

                
                
                
            
     <div class="col-md-6"> 
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
                  
                  </tr>
                  </thead>
                  <tbody>
                      
                  @foreach(Cart::content() as $cartItem)
                  <tr id="product{{$cartItem->id}}">
                    <td>{{$cartItem->name}}</td>
                    <td>{{$cartItem->qty}}</td>
                    <td><i class="fa fa-inr" aria-hidden="true"> {{$cartItem->options->size}}</i> </td>
                
                   
                  </tr>
                  @endforeach
                  <tr><td colspan="2" >Total Amount</td> <td><i class="fa fa-inr total" aria-hidden="true"> {{Cart::subtotal()}}</i></td> 
                     
                  </tr>
                  
                  </tbody>
                 
                </table>
        </div>
        <!-- /.card-body -->
                    </div> <!-- end checkout-table-row -->
                   
                    
                    
                    
                    
                </div> <!-- end checkout-totals -->
        </div>
        </div>
        
        </section>
    </div>

@stop