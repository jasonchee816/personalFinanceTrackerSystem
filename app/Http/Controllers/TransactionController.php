<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Wallet;
use App\Models\TransactionCategory;


class TransactionController extends Controller
{
    function createTransView(){
        $walletData = Wallet::where('user_id', auth()->id())->get();
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

        $transaction = new Transaction();
        $transaction->wallet_id = $request->input('wallet');
        $transaction->category = $request->input('category');
        $transaction->amount = $request->input('amount');
        $transaction->trans_date = $request->input('transactionDate');
        $transaction->description = $request->input('description');

        $transaction->save();
        return redirect('/');
    }

    function editTransView($id){
        $walletData = Wallet::where('user_id', auth()->id())->get();
        $transData = Transaction::find($id);
        $categoryData = TransactionCategory::all();
        return view("editTransaction", ['walletData'=>$walletData, 'categoryData'=>$categoryData, 'transData'=> $transData]);
    }

    function editTrans(Request $request, $id){
        $request->validate([
            'transactionType' => 'required', 
            'wallet' => 'required', 
            'category' => 'required',
            'amount' => ['required','regex: /^\d{0,8}(\.\d{1,2})?$/'],
            'transactionDate' => 'required',
            'description' => 'nullable',
        ]);

        $transaction = Transaction::find($id);
        $transaction->wallet_id = $request->input('wallet');
        $transaction->category = $request->input('category');
        $transaction->amount = $request->input('amount');
        $transaction->trans_date = $request->input('transactionDate');
        $transaction->description = $request->input('description');
        $transaction->save();
        return redirect('/');
    }
}
    
