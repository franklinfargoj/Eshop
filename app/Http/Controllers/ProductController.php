<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use Storage;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product_list = DB::table('products')
        ->join('categories', 'products.category_id', '=', 'categories.id')
        ->select('products.title as prodname','products.description','products.price','categories.name as catname')
        ->get();

        return view('admin.product.list',compact("product_list")); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //echo public_path();die;

        $category_list = Category::all();
        return view('admin.product.add',compact("category_list"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:25',
            'category_id' => 'required|numeric',
            'description' => 'required|max:50',
            'price' => 'required|numeric',
            'myfile' => 'required'
        ]);

        if ($files = $request->file('myfile')) {
            // Define upload path
            $destinationPath = public_path('/images/'); // upload path
            // Upload Orginal Image           
            $profileImage = time().$request->file('myfile')->getClientOriginalName();
            $files->move($destinationPath, $profileImage);
         }
         $prod = new Product;
         $prod->title = $request->title;
         $prod->category_id = $request->category_id;
         $prod->description = $request->description;
         $prod->price = $request->price;
         $prod->image =  $profileImage;
         $prod->save();
         return redirect()->route('show_prod');
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
