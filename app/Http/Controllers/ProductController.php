<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //function to display the view index.blade.php
    public function index()
    {
        //display randomly 6 products
        //$products = Product::inRandomOrder()->take(9)->get();

       /*to get exact category of a product
       if a request has categorie
       */

       if(request()->categorie){
       
          //dd('OK CATEGORY');
          $products = Product::with('categories')->whereHas('categories', function($query){
              $query->where('slug', request()->categorie);
          })->paginate(9);

       }else{

        //return our random paginated products paginate

        $products = Product::with('categories')->paginate(9);
       }
        
        // dd($products);/test 6 products random display, then we inject them in our vue
        return view('products.index')->with('products', $products);

      /*  for($i=0;i=5;$i++){
            echo $i;
       }*/
    }
  

    //function for showing a product details when clicked

    public function show($slug)
    {
       $product = Product::where('slug', $slug)->firstOrFail();//or fail to get 404 error when slug not found

       return view('products.show')->with('product', $product);

    }

    //function for search

    public function search(){
        //$q will be the character typed into search form
        $q = request()->input('q');
        //dd($q);

        //check how we coul include the search with category
        //search with eloquant

        //$products = Product::where('title', 'like', "%$q%")
        $products = Product::where('title', 'like', "%$q%")
               //->orWhere('description', 'like', "%$q%")
               
               ->paginate(9);

            return view('products.search')->with('products', $products);
    }
    
}
