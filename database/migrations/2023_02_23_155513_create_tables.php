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
            $table->id();
            $table->string('email');
            $table->string('password');
            $table->bigInteger('tel_no');
            $table->string('name');
            $table->boolean('is_admin');
        });


        //Wallets

        //TransactionCatergories
        Schema::create('TransactionCategories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->type();
            $table->timestamps();
        });

        //Transactions
        Schema::create('Transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->double('amount');
            $table->string('description');
            $table->integer('walletId');
            // $table->foreign('walletId')->references('id')->on('Wallets');
            $table->integer('category');
            $table->foreign('category')->references('id')->on('TransactionCategories');
            $table->timestamp('transDate');

            // $table->boolean('type');
            //$table->enum('method', ['income', 'expense']); 
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Users');
        Schema::dropIfExists('Wallets');
        Schema::dropIfExists('TransactionCategories');
        Schema::dropIfExists('Transactions');
    }
}
