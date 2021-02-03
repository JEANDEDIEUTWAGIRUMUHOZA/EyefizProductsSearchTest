<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    //function to display the view index.blade.php
    public function index()
    {
        return view('products.index');
    }
    
}
