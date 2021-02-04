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
        //to populate our table after $faker fields creation
        $this->call(ProductsTableSeeder::class);
    }
}
