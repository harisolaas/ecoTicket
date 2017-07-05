<?php

use Illuminate\Database\Seeder;

class UserTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('UserTypes')->insert([
            'name' => 'buyer',
        ]);
        DB::table('UserTypes')->insert([
            'name' => 'seller',
        ]);
    }
}
