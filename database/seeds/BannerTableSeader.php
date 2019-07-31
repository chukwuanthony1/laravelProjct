<?php

use Illuminate\Database\Seeder;

class BannerTableSeader extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('banners')->insert([
            'banner' => 'fhfhf.png',
            'description' => 'hgfhjdfjhfjjfdgfdhjdfhdf',


        ]);
        DB::table('banners')->insert([
            'banner' => 'fhfhf.png',
            'description' => 'hgfhjdfjhfjjfdgfdhjdfhdf',


        ]);
        DB::table('banners')->insert([
            'banner' => 'fhfhf.png',
            'description' => 'hgfhjdfjhfjjfdgfdhjdfhdf',


        ]);
    }
}
