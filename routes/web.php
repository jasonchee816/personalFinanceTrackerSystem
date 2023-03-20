<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\WalletController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Homepage
Route::get('/', function () {
    return view('homepage');
});


//Login
Route::get('login',[UserController::class,'userLogin']);
Route::post('login',[UserController::class,'authenticateUser']);

//Register
Route::get('register',[UserController::class,'create']);
Route::post('register',[UserController::class,'storeUser']);

//WalletPage
Route::get('/wallets', [WalletController::class, 'showWallet']);

//Create Transaction
Route::get('createTrans',[TransactionController::class, 'createTransView']);
Route::post('createTrans',[TransactionController::class,'createTrans']);

//Create Wallet
Route::view('createWallet','createWallet')->name('createWallet');
Route::post('wallet/form',[WalletController::class,'createWallet']);

//Update Wallet
Route::put('updateWallet', [WalletController::class, 'updateWallet']);
//Show Wallet
Route::get('/wallet/{wallet}/edit', [WalletController::class, 'passWalletDetails']);

//Wallet Details
Route::view('showWalletDetails','showWalletDetails');
Route::get('/wallet/{wallet}/details',[WalletController::class, 'showWalletDetails']);

//Delete Wallet
Route::delete('/task/{id}/delete', [WalletController::class, 'deleteWallet']);


// Homepage after user login
Route::view('/homepage','userHomepage');
