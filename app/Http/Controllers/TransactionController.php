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

    function showTransaction(){
        $wallets = auth()->user()->getWallets()->get();
        $wallets_id = auth()->user()->getWallets()->pluck('wallets.id');
        $transactions = Transaction::where('wallet_id', $wallets_id)->get();
        $expense_ids = TransactionCategory::where('type', 'expense')->pluck('transaction_categories.id')->all();
        // $income_ids = TransactionCategory::where('type', 'income')->pluck('transaction_categories.id');
        $expense = 0;
        $income = 0;
        for($i = 0; $i < count($transactions); $i++){
            if(in_array($transactions[$i]->category, $expense_ids)){
                $expense+= $transactions[$i]->amount;
            }
            else{
                $income+=$transactions[$i]->amount;
            }
        }
        // $expense = Transaction::where('wallet_id', $wallets_id)->where('category', '<=','6')->sum('amount');
        // $income = Transaction::where('wallet_id', $wallets_id)->where('category', '>','6')->sum('amount');
        $category = TransactionCategory::all();
        return view('transaction', compact('wallets','transactions','expense','income','category'));
    }
}
    
