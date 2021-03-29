<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class EshopController extends Controller
{
    
    public function index()
    {
        $user = Auth::user();
        $product_list = DB::table('products')
        ->join('categories', 'products.category_id', '=', 'categories.id')
        ->select('products.title as prodname','products.description','products.price','categories.name as catname','products.image as img','products.id as id')
        ->get();       
        return view('frontend.eshop',compact("product_list","user")); 
    }

}