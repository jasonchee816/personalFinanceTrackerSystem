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
        for($i=0;$i<5;$i++){
            DB::table('users')->insert([
                'email'=>$faker->email,
                'password'=>$faker->password,
                'tel_no'=>$faker->phoneNumber,
                'name'=>$faker->name,
                'is_admin'=>(bool)random_int(0, 1)
            ]);
        }

        //Wallets
        for($i=0; $i<10; $i++){
            DB::table('wallets')->insert([
                'name'=>$faker->name,
                'balance' => $faker->randomFloat(2, 10, 1000000),
                'initial_balance' => $faker->randomFloat(2, 10, 10000),
                'type' => $faker->randomElement(
                    Wallet::WALLET_TYPE,
                ),
                'user_id' => rand(1, 5)
            ]);
        }



        //TransactionCatergories 0 = Expenses 1 = Income
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
        for($i=0; $i<10; $i++){
            DB::table('transactions')->insert([
                'amount' => $faker->randomFloat(2, 10, 10000),
                'description'=>Str::random(10),
                'wallet_id'=>rand(1,10),
                'category'=> rand(1, 11),
                'trans_date'=>$faker->dateTime,
            ]);
        }

    }
}
