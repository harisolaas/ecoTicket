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
            'name' => 'Skyguy',
            'email' => 'skyguy@walker.com',
            'password' => bcrypt('asdasd'),
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
            'name' => 'Skyguy S.A.',
            'email' => 'skyguy@walker.com',
            'password' => bcrypt('asdasd'),
        ]);

    }
}
