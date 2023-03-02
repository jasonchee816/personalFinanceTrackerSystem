<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Users
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email');
            $table->string('password');
            $table->bigInteger('tel_no');
            $table->string('name');
            $table->boolean('is_admin');
        });


        //Wallets
        Schema::create('Wallets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->double('balance');
            $table->double('initialBalance');
            $table->enum('type', ['Savings Account','e-Wallet','Cash Wallet', 'Credit Card']);
        });

        //TransactionCatergories
        Schema::create('TransactionCategories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->enum('type', ['income', 'expense']);
            $table->timestamps();
        });

        //Transactions
        Schema::create('Transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->double('amount');
            $table->string('description');
            $table->integer('walletId');
            $table->foreign('walletId')->references('id')->on('Wallets');
            $table->integer('category');
            $table->foreign('category')->references('id')->on('TransactionCategories');
            $table->timestamp('transDate');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Transactions');
        Schema::dropIfExists('TransactionCategories');
        Schema::dropIfExists('Wallets');
        Schema::dropIfExists('Users');
    }
}
