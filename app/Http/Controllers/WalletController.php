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

        return redirect()->route('wallet')->with('success', 'Wallet created successfully!');
    }
}

