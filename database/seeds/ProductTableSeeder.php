<?php

use Illuminate\Database\Seeder;
use market\Product;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::truncate();

        factory(market\Product::class, 10)->create();
    }
}
