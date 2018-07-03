<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Model\User\Status;
use App\Model\User\Order;
use Illuminate\Http\Request;
use App\Events\OrderStatusChanged;
class OrderController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::All();
         //$orders = Order::where('status_id',1)->get();
        $statuses = Status::all();
        return view('Order/order', ['orders'=> $orders,'statuses' => $statuses]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function order($type='')
    { 
        if($type == 'new_order'){
            $orders = Order::where('status_id',1)->get();
        }elseif ($type == 'preparing') {
            
            $orders = Order::where('status_id',2)->get();
            
        }elseif ($type== 'quality _check') {
            
            $orders = Order::where('status_id',3)->get();
        }elseif ($type== 'out_for_delivery') {
            
            $orders = Order::where('status_id',4)->get();
        }else {
           
            $orders = Order::all();
        }
            
           $statuses = Status::all();
        
        return view('Order/orders', ['orders' => $orders,'statuses' => $statuses]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function orderStatus(Request $request, Order $order)
    {
        
        $request->validate([
            'status_id' => 'required|numeric',
        ]);
        
        $order->status_id = $request->status_id;
        $order->save();
        event(new OrderStatusChanged($order));
        return back()->with('success', 'Order Status updated successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\User\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\User\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\User\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\User\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
