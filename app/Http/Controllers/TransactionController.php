<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Wallet;
use App\Models\TransactionCategory;


class TransactionController extends Controller
{
    function createTransView(Request $request){
        $walletData = Wallet::where('user_id', $request->id)->get();
        $categoryData = TransactionCategory::all();
        return view("createTransaction", ['walletData'=>$walletData, 'categoryData'=>$categoryData]);
    }


    function createTrans(Request $request){
        $request->validate([
            'transactionType' => 'required', 
            'wallet' => 'required', 
            'category' => 'required',
            'amount' => ['required','regex: /^\d{0,8}(\.\d{1,2})?$/'],
            'transactionDate' => 'required',
            'description' => 'nullable',
        ]);
    }
}
    
