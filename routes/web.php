<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WalletController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\AdminController;

//Homepage
Route::get('/',[UserController::class, 'showHomepageDetails']);

//Login
Route::get('login',[UserController::class,'userLogin'])->name('login');
Route::post('login',[UserController::class,'authenticateUser']);

//Register
Route::get('register',[UserController::class,'create']);
Route::post('register',[UserController::class,'storeUser']);

//WalletPage
Route::get('/wallets', [WalletController::class, 'showWallet']);

//Create Wallet
Route::get('createWallet',[WalletController::class,'createWalletView']);;
Route::post('wallet/form',[WalletController::class,'createWallet']);

//Update Wallet
Route::get('/wallet/{wallet}/edit', [WalletController::class, 'passWalletDetails']);
Route::put('updateWallet', [WalletController::class, 'updateWallet']);

//Wallet Details
Route::view('showWalletDetails','showWalletDetails');
Route::get('/wallet/{wallet}/details',[WalletController::class, 'showWalletDetails']);

//Delete Wallet
Route::delete('/wallet/{id}/delete', [WalletController::class, 'deleteWallet']);

//Show All Transactions
Route::get('transactions',[TransactionController::class, 'showTransactions']);

//Create Transaction
Route::get('createTrans',[TransactionController::class, 'createTransView']);
Route::post('createTrans',[TransactionController::class,'createTrans']);

//Edit Transaction
Route::get('/editTrans/{id}',[TransactionController::class, 'editTransView']);
Route::post('/editTrans/{id}',[TransactionController::class,'editTrans']);

//Delete Transaction

//Profile
Route::get('profile',[UserController::class, 'getProfile']);
Route::post('editProfile', [UserController::class, 'editProfile']);

//Logout
Route::get('logout', [UserController::class,'logout']);

//Admin Login
Route::get('/admin/login',[UserController::class,'adminLogin']);
Route::post('/admin/login',[UserController::class,'authenticateAdmin']);

//Admin Register
Route::get('/admin/register',[UserController::class,'adminRegister']);
Route::post('/admin/register',[UserController::class,'storeAdmin']);

//Admin Homepage
Route::get('adminHomepage',[AdminController::class,'showAdminHomepage']);

//Create New Trans Category
Route::get('createCategory',[AdminController::class,'showCreateCategory']);
Route::post('createCategory/form',[AdminController::class,'creataTransactionCategory']);

//Delete Trans Category 
Route::get('deleteCategory/{id}',[AdminController::class,'DeleteTransactionCategory']);

//Update Trans Category
Route::get('passCategory/{id}', [AdminController::class, 'passTransactionCategory']);
Route::put('updateCategory', [AdminController::class, 'UpdateTransactionCategory']);

