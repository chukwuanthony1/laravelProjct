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
        $this->call(UserTableSeader::class);
        $this->call(AdminTableSeader::class);
        $this->call(ProductTableSeader::class);
        $this->call(CategoryTableSeader::class);
        $this->call(OrderTableSeader::class);
        $this->call(BannerTableSeader::class);
        $this->call(SuperTableSeader::class);

    }
}
