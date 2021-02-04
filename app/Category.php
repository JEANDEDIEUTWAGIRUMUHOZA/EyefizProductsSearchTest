<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //Many to many relation function, category has many products

    public function products()
    {
      return $this->belongsToMany('App\Product');
    }
}
