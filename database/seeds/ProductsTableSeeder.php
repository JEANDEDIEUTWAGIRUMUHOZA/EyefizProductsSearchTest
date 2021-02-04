<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //use of $faker, fzaninotto's library instead handmade création

        $faker = Faker\Factory::create();
        //loop on my products

        for($i=0; $i < 30;$i++){

         //call for Product model, don't forget to import: use App\Product;
         /*this create method will create our data by using 
         our migrations table fields for data consistency*/

            Product::create([
            'title'=>$faker->sentence(15),
            'slug'=>$faker->slug,
            'subtitle'=>$faker->sentence(10),
            'description'=>$faker->text,
            'price'=>$faker->numberBetween(15, 300) * 100,//price in cents
            'image'=>'https://via.placeholder.com/200x250'

            ]);

        }
    }
}
