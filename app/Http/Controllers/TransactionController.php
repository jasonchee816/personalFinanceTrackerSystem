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
            'transTypeVal' => 'required', 
            'walletVal' => 'required', 
            'categoryVal' => 'required',
            'amountVal' => 'required|integer',
            'dateVal' => 'required',
            'descVal' => 'nullable',
        ]);
        return ("Create Successfully!!");
    }
}
    
