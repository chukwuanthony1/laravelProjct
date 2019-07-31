<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class AdminTableSeader extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        DB::table('admins')->insert([
            'name' => str_random(10),
            'email' => str_random(10).'@gmail.com',
            'password' => bcrypt('123456'),
            'number' => $faker->unique()->phoneNumber,
            'access' => 2,
            'address' => $faker->city,

        ]);
        DB::table('admins')->insert([
            'name' => str_random(10),
            'email' => str_random(10).'@gmail.com',
            'password' => bcrypt('123456'),
            'number' => $faker->unique()->phoneNumber,
            'access' => 2,
            'address' => $faker->city,

        ]);
        DB::table('admins')->insert([
            'name' => str_random(10),
            'email' => str_random(10).'@gmail.com',
            'password' => bcrypt('123456'),
            'number' => $faker->unique()->phoneNumber,
            'access' => 2,
            'address' => $faker->city,
        ]);
    }
}
