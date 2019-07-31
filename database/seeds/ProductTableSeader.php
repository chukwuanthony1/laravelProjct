<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductTableSeader extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'productname' => 'Red Sneakers',
            'productprice' => str_random(10).'@gmail.com',
            'productid' => str_random(5),
            'admin_id' => 1,
            'category_id' => 1,
            'image' => 'bgfgfggffgfg.png'


        ]);

        DB::table('products')->insert([
            'productname' => 'Blue Sneakers',
            'productprice' => str_random(10).'@gmail.com',
            'productid' => str_random(5),
            'admin_id' => 1,
            'category_id' => 1,
            'image' => 'pppppgfggffgfg.png'


        ]);
        DB::table('products')->insert([
            'productname' => 'Blue Sneakers',
            'productprice' => str_random(10).'@gmail.com',
            'productid' => str_random(5),
            'admin_id' => 2,
            'category_id' => 2,
            'image' => 'bgfgg.png'


        ]);
    }
}
