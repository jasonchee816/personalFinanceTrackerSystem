<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\WalletController;

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


//Test
Route::view('test','testingPage');


//Contact Us
Route::get('/contact', function () {
    return view('contact_us');
});

//FAQ
Route::get('/faq', function () {
    return view('faq');
});

//About
Route::get('/about', function () {
    return view('about');
});

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

//Register
Route::view('register','register');
Route::post('register/form',[UserController::class,'createUser']);
