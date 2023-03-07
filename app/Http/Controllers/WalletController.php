<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//Model
use App\Models\Wallet;


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
        $wallet->user_id = 0;
        $wallet->type = $request->input('category');
        $wallet->save();

        return redirect('/wallets');
    }

    function showWallet(){
        $wallets = Wallet::all();
        return view('wallet', compact('wallets'));
    }

    function updateWallet(Request $request){
        $wallet = Wallet::find($request->id);
        $wallet->name = $request->input('name');
        $wallet->balance = $request->input('balance');
        $wallet->save();
        return redirect('wallets');
    }

    function passWalletDetails(Wallet $wallet){
        return view('editWallet', compact('wallet'));
    }

    function deleteWallet($id){
        $data = Wallet::find($id);
        $data->delete();
        return redirect("wallets");
    }

    function showWalletDetails(Wallet $wallet){
        return view('walletDetails', compact('wallet'));
    }

}

