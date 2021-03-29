<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Product;

class OrderController extends Controller
{
    public function index()
    {      
        $order_list = DB::table('orders')
        ->join('users', 'users.id', '=', 'orders.user_id')
        ->select('users.name as customer','orders.id as order_id','orders.amount as total_amt','orders.product_quantity as prod_quant')
        ->get(); 

        $products_list = array();
        $products = Product::all('id', 'title')->toArray();

        foreach($products as $k=>$v){
            $products_list[$v['id']]  = $v['title'];
        }

        return view('admin.orders.order',compact("order_list","products_list")); 
    }
}
