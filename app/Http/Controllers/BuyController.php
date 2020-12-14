<?php

namespace App\Http\Controllers;

use App\CartItem;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Mail\Buy;
use App\Mail\Buy_Admin;
use Illuminate\Support\Facades\Mail;

class BuyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $user = Auth::user();
    //  $user = User::where('id', $user_id)->firstOrFail();

      $cartitems = CartItem::select('cart_items.*', 'items.name', 'items.amount')
         ->where('user_id', Auth::id())
         ->join('items', 'items.id','=','cart_items.item_id')
         ->get();
      $subtotal = 0;
      if($cartitems)
      {
        foreach($cartitems as $cartitem){
           $subtotal += $cartitem->amount * $cartitem->quantity;
        }
        return view('buy/index', compact('cartitems','subtotal','user'));
      }

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
    public function store(Request $request, $cartitems)
    {
      $validator = Validator::make($request->all() , [
         'user_name' => 'required|string|max:255',
         'user_email' => 'required|string|max:255',

       ]);
       //バリデーションの結果がエラーの場合
       if ($validator->fails())
       {
         return redirect()->back()->withErrors($validator->errors())->withInput();
       }
       $cartitems = CartItem::select('cart_items.*', 'items.name', 'items.amount')
          ->where('user_id', Auth::id())
          ->join('items', 'items.id','=','cart_items.item_id')
          ->get();

       $subtotal = 0;
       if($cartitems)
          {
           foreach($cartitems as $cartitem){
             $subtotal += $cartitem->amount * $cartitem->quantity;
           }
         }
      $user = AUTH::user();
      $email = AUTH::user()->email;
      if( $request->has('post') ){
          Mail::to($email)->send(new Buy($user, $cartitems, $subtotal));
          Mail::to(config('mail.from.address'))->send(new Buy_Admin($user, $cartitems, $subtotal));
          CartItem::where('user_id', Auth::id())->delete();
          return view('buy/complete');
      }
      $request->flash();
      return $this->index();
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
