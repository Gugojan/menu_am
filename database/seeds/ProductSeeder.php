<?php

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            'product'=> 'pizza',
            'price'=> 8,
        ];

        \Illuminate\Support\Facades\DB::table('products')->insert($products);
    }
}
