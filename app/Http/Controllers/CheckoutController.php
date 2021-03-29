<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Cart;
use App\Orders;

class CheckoutController extends Controller
{
    public function placeOrder(Request $request)
    {
        $cartItems = DB::table('products')
                    ->join('cart', 'products.id', '=', 'cart.product_id')
                    ->select('products.title as productname','products.price as price','cart.quantity as qty','cart.product_id as pid')
                    ->where('user_id',Auth::id())
                    ->get();
        $total = 0;
        $arr = [];
        foreach($cartItems as $k => $v){   
            $price = $v->price;
            $qty = $v->qty;
            $total += $price * $qty;
            $pid = $v->pid;
            $arr[$pid] = $qty;      
        }

        $order = new Orders;
        $order->user_id = Auth::id(); 
        $order->amount = $total;
        $order->product_quantity = json_encode($arr);
        $order->save();

        $this->cartUpdate();

        return redirect()->back()->with('message', 'Order placed.Thank you!');
        
    }

    public function cartUpdate()
    {
        Cart::where('user_id',Auth::id())->delete();
    }


}
