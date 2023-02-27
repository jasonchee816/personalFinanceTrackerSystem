<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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



        //TransactionCatergories 0 = Expenses 1 = Income
        DB::table('TransactionCategories')->insert(array(
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
            DB::table('transcations')->insert([
                'amount' => rand(0, 10000) / 100,
                'description'=>Str::random(10),
                // 'walletId'=>rand(0,10),
                //look into factories? else will very hideous
                //TO_DO
                    //fake()->name(),
                    //Migration create table change
                    //Models making + factories?
                    //separate seeders too 
            ]);
        }

        //Wallet
        for($i=0; $i<10; $i++){
            DB::table('wallet')->insert([
                'name'=>Str::random(10),
                'balance' => rand(0, 10000) / 100,
                'initialBalance' => rand(0, 10000) / 100,
                'userId' => rand(0, 10)
            ]);
        }

    }
}
