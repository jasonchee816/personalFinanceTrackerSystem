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
// Route::get('/', function () {
//     return view('homepage');
// });
Route::get('/',[UserController::class, 'showHomepageDetails']);


//Login
Route::get('login',[UserController::class,'userLogin'])->name('login');
Route::post('login',[UserController::class,'authenticateUser']);

//Register
Route::get('register',[UserController::class,'create']);
Route::post('register',[UserController::class,'storeUser']);

//WalletPage
Route::get('/wallets', [WalletController::class, 'showWallet'])->middleware('auth');

//Create Transaction
Route::get('createTrans',[TransactionController::class, 'createTransView'])->middleware('auth'); 
Route::post('createTrans',[TransactionController::class,'createTrans']);

//Create Wallet
Route::view('createWallet','createWallet')->name('createWallet')->middleware('auth');
Route::post('wallet/form',[WalletController::class,'createWallet']);

//Update Wallet
Route::get('/wallet/{wallet}/edit', [WalletController::class, 'passWalletDetails'])->middleware('auth');
Route::put('updateWallet', [WalletController::class, 'updateWallet']);

//Wallet Details
Route::view('showWalletDetails','showWalletDetails');
Route::get('/wallet/{wallet}/details',[WalletController::class, 'showWalletDetails'])->middleware('auth');

//Delete Wallet
Route::delete('/task/{id}/delete', [WalletController::class, 'deleteWallet']);


// Homepage after user login
// Route::get('/homepage',[WalletController::class,'showHomepageDetails']);

Route::get('logout', [UserController::class,'logout']);


//JS

//Admin Login
Route::get('/admin/login',[UserController::class,'adminLogin']);
Route::post('/admin/login',[UserController::class,'authenticateAdmin']);

//Admin Register
Route::get('/admin/register',[UserController::class,'adminRegister']);
Route::post('/admin/register',[UserController::class,'storeAdmin']);

//Edit Transaction
Route::get('/editTrans/{id}',[TransactionController::class, 'editTransView'])->middleware('auth'); 
Route::post('/editTrans/{id}',[TransactionController::class,'editTrans']);

//JL

//YT

//WL

