<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryTableSeader extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'categoryname' => 'Shoes',

        ]);
        DB::table('categories')->insert([
            'categoryname' => 'Bags',

        ]);
        DB::table('categories')->insert([
            'categoryname' => 'Jewelry',

        ]);
    }
}
