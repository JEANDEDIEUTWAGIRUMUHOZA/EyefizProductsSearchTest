<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //format product price
    
    public function getPrice(){
        $price = $this->price / 100;

        return number_format($price, 2, ',', ' ') . ' €';
    }

   //Relation many to many, a product has many categories
    public function categories()
    {
      return $this->belongsToMany('App\Category');
    }
}
