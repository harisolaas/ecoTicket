<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        DB::table('users')->insert([
            'name' => 'UserTest',
            'email' => 'test@gmail.com',
            'password' => bcrypt('secret'),
        ]);

        DB::table('categories')->insert([
            'name' => 'Indumentaria',
        ]);
        DB::table('categories')->insert([
            'name' => 'Calzado',
        ]);
        DB::table('categories')->insert([
            'name' => 'Accesorios',
        ]);
        DB::table('categories')->insert([
            'name' => 'Electrodomésticos',
        ]);

        DB::table('sellers')->insert([
            'name' => 'SellerTest',
            'email' => 'test@gmail.com',
            'password' => bcrypt('secret'),
        ]);

    }
}
