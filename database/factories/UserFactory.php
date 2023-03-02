<?php

use App\Models\User;
use App\Models\Transaction;
use App\Models\TransactionCategory;
use App\Models\Wallet;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(User::class, function (Faker $faker) {
    return [     
        'email' => $faker->email,
        'password' => $faker->password,
        'tel_no' => $faker->phoneNumber,
        'name' => $faker->name,
        'is_admin' => 0
    ];
});


$factory->define(Wallet::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'balance' => $faker->randomFloat(2, 10, 1000000),
        'initialBalance' => $faker->randomFloat(2, 10, 10000),
        'type' => $faker->randomElement([
            Wallet::WALLET_TYPE,
        ]),
    ];
});

$factory->define(Transaction::class, function (Faker $faker) {
    return [
        'amount' => $faker->randomFloat(2, 10, 1000000),
        'description'=>Str::random(10),
        'transDate' => $faker-> dateTime,
    ];
});

$factory->define(TransactionCategory::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'type' => $faker->randomElement([
            TransactionCategory::CAT_TYPE,
        ]),
    ];
});
