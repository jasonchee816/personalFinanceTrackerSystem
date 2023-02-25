<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Hash;

class dbSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Users
        for($i=1;$i<10;$i++){
            DB::table('users')->insert([
                'email'=>Str::random(10).'@outlook.com',
                'password'=>Hash::make('password'),
                'tel_no'=>random_int(1000000000, 9999999999),
                'name'=>Str::random(10),
                'is_admin'=>(bool)random_int(0, 1)
            ]);
        }

        //Wallets


        //Transactions


        //TransactionCatergories


    }
}
