<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class UserTableSeader extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        DB::table('users')->insert([
            'name' => str_random(10),
            'email' => str_random(10).'@gmail.com',
            'number' => $faker->unique()->phoneNumber,
            'address' => $faker->city,
            // 'image' => $faker->firstNameMale .'.png',
            // 'access' => 1,
            // 'verifyemail' => 2,
            'activation_token' => str_random(10),
            'access' => 2,
            'password' => bcrypt('123456'),
        ]);
          DB::table('users')->insert([
            'name' => str_random(10),
            'email' => str_random(10).'@gmail.com',
            'number' => $faker->unique()->phoneNumber,
            'address' => $faker->city,
            // 'image' => $faker->firstNameMale .'.png',
            // 'access' => 1,
            // 'verifyemail' => 2,
            'activation_token' => str_random(10),
            'access' => 2,
            'password' => bcrypt('123456'),
        ]);
    }
}
