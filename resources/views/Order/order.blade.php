
@extends('Admin.layouts.app')
   
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Blank Page</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('admin-order/new_order')}}">New Order</a></li>
              <li class="breadcrumb-item active"><a href="{{url('admin-order/preparing')}}">Preparing</a></li>
              <li class="breadcrumb-item"><a href="{{url('admin-order/quality _check')}}">Quality Check</a></li>
              <li class="breadcrumb-item"><a href="{{url('admin-order/out_for_delivery')}}">Out for Delivery</a></li>
              <li class="breadcrumb-item"><a href="{{url('admin-order')}}">All Order</a></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Orders</h3>

         
        </div>
          
        <div class="card-body">
            <ul>
                @foreach($orders as $order)
                <li>
                    <h4>Order By {{$order->user->name}} Price {{$order->total}}</h4>
                    
                    <h5>Items</h5>
                  
                  <form role="form" action="{{route('order.Status',$order)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group ">
                            <select name="status_id" id="status_id" class="dropdown-style input-field input-normal">
                                        @foreach ($statuses as $status)
                                            <option value="{{ $status->id}}" {{ $order->status_id == $status->id ? "selected":"" }}>{{ $status->name }}</option>
                                        @endforeach
                            </select>
                            <input type="submit" value="submit">
                        </div>
                    </form>
                    <table class="table table-bordered">
                        <tr>
                            <th>
                                Name
                            </th>
                            <th>
                                Qty
                            </th>
                            <th>
                                Price
                            </th>
                        </tr>
                        @foreach($order->orderItems as $item)
                        <tr>
                            <td>
                                {{$item->title}}
                            </td>
                            <td>
                                {{$item->pivot->qty}}
                            </td>
                            <td>
                                {{$item->pivot->total}}
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </li>
                @endforeach
            </ul>
        </div>
        <!-- /.card-body -->
      </div>
    </section>
</div>
@stop