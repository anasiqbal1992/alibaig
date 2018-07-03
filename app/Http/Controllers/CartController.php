<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\User\menu;
use Cart;
class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cartItems = Cart::content();
        
        return view('Cart.index', compact('cartItems'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id,$price,$qty,$tprice)
    {
        //
        $price_old=0;
        $item = Cart::content()->where('id', $id);
        foreach ($item as $itm){
        $price_old = $itm->price;
        }
        $price = $price_old + $price;
        
        $data = menu::find($id);
        
        Cart::add($id, $data->title,$qty,$tprice,['size' => $price]);
        return back();
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
        $item = Cart::content()->where('id', $id);
        foreach($item as $itm){
        Cart::remove($itm->rowId);
        }
        
    }
    public function destroy_cartOrder()
    {
        //
        
        Cart::destroy();
        
        
    }
    
}
