<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//Model
use App\Models\Wallet;
use App\Models\TransactionCategory;
use App\Models\Transaction;



use App\Models\User;


class WalletController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('can:isUser');
    }
    
    function createWalletView(){
        return view('createWallet');
    }

    function createWallet(Request $request){
        $request->validate([
            'wallet' => 'required',
            'category' => 'required',
            'amount' => ['required','regex: /^\d{0,8}(\.\d{1,2})?$/'],
        ]);

        $wallet = new Wallet();
        $wallet->name = $request->input('wallet');
        $wallet->balance = $request->input('amount');
        $wallet->initial_balance = $request->input('amount');
        $wallet->user_id = auth()->id();
        $wallet->type = $request->input('category');
        $wallet->save();
        return redirect('/wallets');
    }

    function showWallet(){
        $user_id = auth()->id();
        $wallets = User::find($user_id)->getWallets;
        return view('wallet', compact('wallets'));
    }

    function updateWallet(Request $request){
        $request->validate([
            'wallet' => 'required',
            'initial_balance' => ['required','regex: /^\d{0,8}(\.\d{1,2})?$/'],
        ]);

        $wallet = Wallet::find($request->id);
        $this->authorize('update', $wallet);
        $wallet->name = $request->input('wallet');
        //Use the session
        $oldInitialBalance = session('oldInitialBalance');
        $newInitialBalance = $request->input('initial_balance');
        $difference = $oldInitialBalance - $newInitialBalance;

        $wallet->balance -= $difference; // update the wallet's balance by subtracting the difference from the current balance
        $wallet->initial_balance = $newInitialBalance;
        $wallet->save();

        // clear the session variable
        $request->session()->forget('oldInitialBalance');

        return redirect('wallets');
    }




    //to pass the data into the edit wallet page. With the Wallet, it will automatically find the relevant wallet
    function passWalletDetails(Wallet $wallet){
        session(['oldInitialBalance' => $wallet->initial_balance]); // store the original initial balance in a session variable
        return view('editWallet', compact('wallet'));
    }

    function deleteWallet($id){
        $data = Wallet::find($id);
        $this->authorize('delete', $data);
        $data->delete();
        return redirect("wallets");
    }

    //to show a specific wallet details
    function showWalletDetails(Wallet $wallet){
        $this->authorize('view', $wallet);
        $transData = Wallet::find($wallet['id'])->getTransactions;
        $categoryData = TransactionCategory::all();
        // dd($transData);
        return view('walletDetails', compact('wallet', 'transData', 'categoryData'));
    }

    // function getTransByWalletId($id){
    //     $transData = Wallet::find($id)->getTransactions;
    //     $categoryData = TransactionCategory::all();
    //     return view("walletDetails", ['walletData'=>$transData, 'categoryData'=>$categoryData]);
    // }

}

