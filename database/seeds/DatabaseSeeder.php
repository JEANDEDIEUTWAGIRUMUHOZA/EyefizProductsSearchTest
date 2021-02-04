<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         //must create categories, cause products will be linked to the categories
        $this->call(CategoriesTableSeeder::class);
        //to populate our table after $faker fields creation
        $this->call(ProductsTableSeeder::class);
    }
}
