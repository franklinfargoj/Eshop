<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Cart;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $cartItems = DB::table('products')
                    ->join('cart', 'products.id', '=', 'cart.product_id')
                    ->select('products.title as productname','products.price as price','cart.quantity as qty','cart.product_id as pid')
                    ->where('user_id',Auth::id())
                    ->get();
        $total = 0;
        foreach($cartItems as $k => $v){
            $price = $v->price;
            $qty = $v->qty;
            $total += $price * $qty;

        }

        return view('frontend.cartlist',compact('cartItems','total','user')); 
    }


    public function addToCart(Request $request)
    {
        $cart_data = Cart::where('user_id',Auth::id())
         ->pluck('product_id')
         ->all();

        if(count($cart_data) == 0){
            $cart = new Cart;
            $cart->user_id = Auth::id(); 
            $cart->product_id = $request['product_id'];
            $cart->quantity = $request['quantity'];
            $cart->save();
        }else{
            if(in_array($request['product_id'],$cart_data )){
                Cart::where('product_id',$request['product_id'])
                    ->where('user_id',Auth::id())
                    ->increment('quantity', 1);
            }else{
                $cart = new Cart;
                $cart->user_id = Auth::id(); 
                $cart->product_id = $request['product_id'];
                $cart->quantity = $request['quantity'];
                $cart->save();
            }
        }
        echo json_encode(['result'=>'ok']);
        die;
    }


    public function removeFromCart(Request $request)
    {
        $res=Cart::where('user_id',Auth::id())
                  ->where('product_id',$request['pid'])
                  ->delete();

        return redirect('/cart');
    }


}
