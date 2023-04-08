<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Wallet;
use App\Models\TransactionCategory;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use DB;



class TransactionController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('can:isUser');
    }

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

        $wallet = Wallet::find($request->input('wallet'));
        if ($request->transactionType == 'income') {
            $wallet->balance += $request->amount;
        } else if ($request->transactionType == 'expense') {
            $wallet->balance -= $request->amount;
        }
        $wallet->save();
        return redirect('/');
    }

    function editTransView($id){
        $walletData = Wallet::where('user_id', auth()->id())->get();
        $transData = Transaction::find($id);
        session(['oldAmount'=> $transData->amount]);
        session(['oldWallet'=> $transData->wallet_id]);
        session(['oldType'=> $transData->getCategory()->first()->type]);
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
        $newWallet = Wallet::find($request->input('wallet'));
        $this->authorize('update', $transaction);
        $this->authorize('update', $newWallet);

        $transaction->wallet_id = $request->input('wallet');
        $transaction->category = $request->input('category');
        $transaction->amount = $request->input('amount');
        $transaction->trans_date = $request->input('transactionDate');
        $transaction->description = $request->input('description');
        $transaction->save();

        $isTypeSame = (session('oldType') == $transaction->getCategory()->first()->type);
        $isWalletSame = (session('oldWallet') == $request->input('wallet'));
        $isAmountSame = (session('oldAmount') == $request->input('amount'));

        $oldType = session('oldType');
        $oldAmount = session('oldAmount');


        if($isWalletSame){
            if($isTypeSame){
                if($isAmountSame){
                }
                else{
                    $oldType == 'income'? 
                    $newWallet->balance += ($request->amount - $oldAmount): 
                    $newWallet->balance -= ($request->amount - $oldAmount); 
                }
            }
            else{
                if($session('oldType')== 'income')
                    $newWallet->balance -= ($request->amount + $oldAmount); 
                else
                    $newWallet->balance += ($request->amount + $oldAmount);
            }
        }
        else{
            $oldWallet = Wallet::find(session('oldWallet'));
            if($oldType == 'income')
                $oldWallet->balance -= $oldAmount;
            else
                $oldWallet->balance += $oldAmount;
            $oldWallet->save();

            if ($request->transactionType == 'income') 
                $newWallet->balance += $request->amount;
            else 
                $newWallet->balance -= $request->amount;
        }
        $newWallet->save();
        return redirect('/');
    }

    function showTransactions(){
        $wallets = auth()->user()->getWallets()->get();
        $wallets_id = auth()->user()->getWallets()->pluck('wallets.id');
        $transactions = Transaction::where('wallet_id', $wallets_id)->orderBy('trans_date', 'DESC')->get();
        $transactionsGrouped = Transaction::where('wallet_id', $wallets_id)
                                ->select('category', DB::raw('SUM(amount) as amount'))
                                ->groupBy('category')->get();
        $expense_ids = TransactionCategory::where('type', 'expense')->pluck('transaction_categories.id')->all();
        // $income_ids = TransactionCategory::where('type', 'income')->pluck('transaction_categories.id');
        $expense = 0;
        $income = 0;
        $incomeCategory = [];
        $incomeAmountGrouped = [];
        $expenseCategory = [];
        $expenseAmountGrouped = [];

        for($i = 0; $i < count($transactionsGrouped); $i++){
            if(in_array($transactionsGrouped[$i]->category, $expense_ids)){
                $expense+= $transactionsGrouped[$i]->amount;
                array_push($expenseAmountGrouped, $transactionsGrouped[$i]->amount);
                array_push($expenseCategory, TransactionCategory::find($transactionsGrouped[$i]->category)->name);
            }
            else{
                $income+=$transactionsGrouped[$i]->amount;
                array_push($incomeAmountGrouped, $transactionsGrouped[$i]->amount);
                array_push($incomeCategory, TransactionCategory::find($transactionsGrouped[$i]->category)->name);
            }
        }

        $category = TransactionCategory::all();
        return view('transactions', compact('wallets','transactions','expense','income','category', 
                    'incomeCategory','incomeAmountGrouped', 'expenseCategory', 'expenseAmountGrouped'));
    }

    function deleteTrans($id){
        $data = Transaction::find($id);
        $this->authorize('delete', $data);
        $wallet = $data->getWallet()->first();
        if($data->getCategory()->first()->type == 'income')
            $wallet->balance -= $data->amount;
        else
            $wallet->balance += $data->amount;
        $wallet->save();
        $data->delete();
        return redirect('/');
    }
}

