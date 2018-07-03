<?php

namespace App\Http\Controllers;
use Auth;
use Cart;
use App\Mail\OrderShipped;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Model\User\Address;
use App\Model\User\Order;
use App\Model\admin\admin;
use App\Notifications\Notify;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
class CheckoutController extends Controller
{
    
     public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $data = Address::where('user_id','=',auth()->user()->id)->get();
      
       return view('Cart/shop', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storePayment(Request $request)
    {
       // Set your secret key: remember to change this to your live secret key in production
        // See your keys here: https://dashboard.stripe.com/account/apikeys
        if(!empty($_POST['stripeToken'])){
           
        \Stripe\Stripe::setApiKey("sk_test_2GxwLYcBn7KgLehIabuyhEPI");

        // Token is created using Checkout or Elements!
        // Get the payment token ID submitted by the form:
        $token = $_POST['stripeToken'];
        $charge = \Stripe\Charge::create([
            'amount' => Cart::subtotal()*100,
            'currency' => 'INR',
            'description' => 'Example charge',
            'source' => $token,
        ]);
       
        //create order
        $user=Auth::user();
        $order=$user->order()->create([
                'total' =>Cart::subtotal()
        ]);
        
        $items= Cart::Content();
        foreach ($items as $item) {
            $order->orderItems()->attach($item->id,[
            'qty' => $item->qty,
            'total' => $item->options->size,
            'pay' => 1        
             ]);
            
        }
        Mail::to($user->email)->send(new OrderShipped($order));
        Cart::destroy();
        }  else {
             //create order
        $user=Auth::user();
        $order=$user->order()->create([
                'total' =>Cart::subtotal()
        ]);
        
        $items= Cart::Content();
        foreach ($items as $item) {
            $order->orderItems()->attach($item->id,[
            'qty' => $item->qty,
            'total' => $item->options->size,
             'pay' => 0       
             ]);
        }
        //last inser id
       /* $id=$order->id;
        $order = Order::findorfail($id); 
        */
        //auth()->user()->notify(new Notify());
        Mail::to($user->email)->send(new OrderShipped($order));
        $adminuser = admin::find(1);
        $adminuser->notify(new Notify($order));
        Cart::destroy();
        
        }
        //return view('Front/progress')->with('success_message','Thank you ! ,Order received!');
        return redirect()->route('user.orders.show', $order)->with('success', 'Thank you ! ,Order received!');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
       public function show(Order $order)
    {
        return view('Front/progress', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
