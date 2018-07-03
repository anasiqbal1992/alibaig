@extends('Front.layouts.app')
@section('content')

<!-- Page Content -->
    <div class="container">

      <div class="row">

        @include('Front.side_menu')
        <!-- /.col-lg-3 -->

        <div class="col-lg-9">

        @include('Front.layouts.banner')

          <div class="row">
              @foreach($data as $items)
            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100">
                <a href="#"><img class="card-img-top" src="{{ asset('uploads/' . $items->image) }}" alt=""></a>
                <div class="card-body">
                  <h4 class="card-title">
                    <a href="#">{{$items->title}}</a>
                  </h4>
                 

                  <p class="card-text">{{$items->discription}}</p>
                </div>
                <div class="card-footer">
                   <input type='button' value='-' class='qtyminus' field='updates_{{ $items->id }}' price="price_{{ $items->id }}" />
                  <input type="text" name="updates" id="updates_{{ $items->id }}" class="qty" value="1" readonly/>
                  <input type='button' value='+' class='qtyplus' field='updates_{{$items->id }}' price="price_{{ $items->id }}" />
                 <i class="fa fa-inr" aria-hidden="true"> <input type="text" name="item_price" id="price_{{ $items->id }}" class="qty" st_value="{{$items->price}}" value="{{$items->price}}" readonly></i>
                </div>
              </div>
            </div>
              @endforeach
          </div>
          <!-- /.row -->

        </div>
        <!-- /.col-lg-9 -->

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->
@stop