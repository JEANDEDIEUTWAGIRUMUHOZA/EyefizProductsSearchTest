<?php

namespace App\Http\Controllers;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //function to display the view index.blade.php
    public function index()
    {
        //display randomly 6 products
        $products = Product::inRandomOrder()->take(9)->get();
        // dd($products);/test 6 products random display, then we inject them in our vue
        return view('products.index')->with('products', $products);
    }


    //function for showing a product details when clicked

    public function show($slug)
    {
       $product = Product::where('slug', $slug)->firstOrFail();//or fail to get 404 error when slug not found

       return view('products.show')->with('product', $product);

    }
    
}
