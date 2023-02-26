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


        //Wallets


        //Transactions


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

    }
}
