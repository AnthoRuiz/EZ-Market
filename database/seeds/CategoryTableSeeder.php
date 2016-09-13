<?php

use Illuminate\Database\Seeder;
use market\Category;
use market\Product;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::truncate();

        factory(market\Category::class, 3)->create();
            /*->each(function ($category) {
            $products = Product::all();
            $number = mt_rand(0,4);
            if($number == 0){
                $category->products()->save($products->get(1));
            }else{
                $category->products()->save($products->get($number));
            }
        });*/
    }
}
