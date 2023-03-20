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
    function createWallet(Request $request){
        $request->validate([
            'wallet' => 'required',
            'category' => 'required',
            'amount' => 'required|integer',
        ]);

        $wallet = new Wallet();
        $wallet->name = $request->input('wallet');
        $wallet->balance = $request->input('amount');
        $wallet->initial_balance = $request->input('amount');
        //hardcoded user_id
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
            'balance' => 'required|integer',
        ]);
        $wallet = Wallet::find($request->id);
        $wallet->name = $request->input('name');
        $wallet->balance = $request->input('balance');
        $wallet->save();
        return redirect('wallets');
    }

    //to pass the data into the edit wallet page. With the Wallet, it will automatically find the relevant wallet
    function passWalletDetails(Wallet $wallet){
        return view('editWallet', compact('wallet'));
    }

    function deleteWallet($id){
        $data = Wallet::find($id);
        $data->delete();
        return redirect("wallets");
    }

    //to show a specific wallet details
    function showWalletDetails(Wallet $wallet){

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
    function showHomepageDetails(){
        $user_id = auth()->id();
        $wallets = auth()->user()->getWallets()->get();
        $wallets_id = auth()->user()->getWallets()->pluck('wallets.id');
        $transactions = Transaction::whereIn('wallet_id', $wallets_id)->get();
        return view('userHomepage', compact('wallets', 'transactions'));
    }
}

