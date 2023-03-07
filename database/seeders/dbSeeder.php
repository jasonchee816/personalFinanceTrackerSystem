<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Factory as Faker;
use App\Models\Wallet;

class dbSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    
    public function run()
    {
        $faker = Faker::create();


        //Users
        //normal user 
        DB::table('users')->insert([
            'email'=>"jason@gmail.com",
            'password'=>"1234",
            'tel_no'=>"0123456789",
            'name'=>"Jason",
            'is_admin'=>0
        ]);
        //admin user
        DB::table('users')->insert([
            'email'=>"john@gmail.com",
            'password'=>"1234",
            'tel_no'=>"01987654321",
            'name'=>"John",
            'is_admin'=>1
        ]);

        //Random Data
        for($i=0;$i<5;$i++){
            DB::table('users')->insert([
                'email'=>$faker->email,
                'password'=>$faker->password,
                'tel_no'=>$faker->phoneNumber,
                'name'=>$faker->name,
                'is_admin'=>0,
            ]);
        }

        //Wallets
        //For test user  
        for($i=0; $i<3; $i++){
            DB::table('wallets')->insert([
                'name'=>$faker->name,
                'balance' => 1000,
                'initial_balance' => 1000,
                'type' => $faker->randomElement(
                    Wallet::WALLET_TYPE,
                ),
                'user_id' => 1,
            ]);
        }

        //Random Data 
        for($i=0; $i<10; $i++){
            DB::table('wallets')->insert([
                'name'=>$faker->name,
                'balance' => $faker->randomFloat(2, 10, 1000000),
                'initial_balance' => $faker->randomFloat(2, 10, 10000),
                'type' => $faker->randomElement(
                    Wallet::WALLET_TYPE,
                ),
                'user_id' => rand(2, 5)
            ]);
        }



        //Transaction_Catergories
        DB::table('Transaction_Categories')->insert(array(
            array(
            'name' => 'Food & Beverage',
            'type' => 'expense',
            ),
            array(
            'name' => 'Education',
            'type' => 'expense',
            ),
            array(
            'name' => 'Entertainment',
            'type' => 'expense',
            ),
            array(
            'name' => 'Medical',
            'type' => 'expense',
            ),
            array(
            'name' => 'Utilities',
            'type' => 'expense',
            ),
            array(
            'name' => 'Others',
            'type' => 'expense',
            ),
            array(
            'name' => 'Salary',
            'type' => 'income',
            ),
            array(
            'name' => 'Investment Return',
            'type' => 'income',
            ),
            array(
            'name' => 'Gifts',
            'type' => 'income',
            ),
            array(
            'name' => 'Loans',
            'type' => 'income',
            ),
            array(
            'name' => 'Others',
            'type' => 'income',
            )
        ));

        //Transactions
        //for test user
        for($i=0; $i<6; $i++){
            DB::table('transactions')->insert([
                'amount' => $faker->randomFloat(2, 10, 10000),
                'description'=>Str::random(6),
                'wallet_id'=>rand(1,3),
                'category'=> rand(1, 11),
                'trans_date'=>$faker->dateTime,
            ]);
        }

        //random data
        for($i=0; $i<10; $i++){
            DB::table('transactions')->insert([
                'amount' => $faker->randomFloat(2, 10, 10000),
                'description'=>Str::random(6),
                'wallet_id'=>rand(4,10),
                'category'=> rand(1, 11),
                'trans_date'=>$faker->dateTime,
            ]);
        }

    }
}
