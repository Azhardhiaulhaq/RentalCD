<?php

use Faker\Provider\UserAgent;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('rental_user')->insert([
            'username' => 'AzharDhiaulhaq',
            'password' => 'Azhar@tantowi.com',
            'role' => 'owner'
        ]);

        DB::table('rental_user')->insert(
            [
                'username' => 'Fulan',
                'password' => 'Fulan@gmail.com',
                'role' => 'customer'
            ]
        );

        DB::table('rental_cd')->insert([
            'title' =>'Harry Potter',
            'rate' => 10000,
            'category'=>'Fiction',
            'quantity' => 40
        ]);

        DB::table('rental_cd')->insert([
                'title' =>'Teletubbies',
                'rate' => 50000,
                'category'=>'Kids',
                'quantity' => 10
        ]);
    }
}

