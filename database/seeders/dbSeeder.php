<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

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
        for($i=1; $i<10; $i++){
            DB::table('TransactionCategories')->insert(array(
                array(
                'name' => "Food & Beverage",
                'type' => 0,
                ),
                array(
                'name' => "Education",
                'type' => 0,
                ),
                array(
                'name' => "Entertainment",
                'type' => 0,
                ),
                array(
                'name' => "Medical",
                'type' => 0,
                ),
                array(
                'name' => "Utilities",
                'type' => 0,
                ),
                array(
                'name' => "Others",
                'type' => 0,
                ),
                array(
                'name' => "Salary",
                'type' => 1,
                ),
                array(
                'name' => "Investment Return",
                'type' => 1,
                ),
                array(
                'name' => "Gifts",
                'type' => 1,
                ),
                array(
                'name' => "Loans",
                'type' => 1,
                ),
                array(
                'name' => "Others",
                'type' => 1,
                )
                ));
        }

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

    }
}
