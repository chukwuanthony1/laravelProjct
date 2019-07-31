<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderTableSeader extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('orders')->insert([
            'product_id' => 1,
            'admin_id' => 1,
            'user_id' => 1,
            'orderid' => str_random(5),



        ]);
        DB::table('orders')->insert([
            'product_id' => 2,
            'admin_id' => 1,
            'user_id' => 1,
            'orderid' => str_random(5),


        ]);
        DB::table('orders')->insert([
            'product_id' => 1,
            'admin_id' => 1,
            'user_id' => 1,
            'orderid' => str_random(5),


        ]);


    }
}
