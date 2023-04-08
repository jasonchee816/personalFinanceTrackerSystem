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

        foreach ($wallets as $wallet) {
            $chart_data[] = [
                'name' => $wallet->name,
                'balance' => $wallet->balance
            ];
        }
    }
    function getChartData()
    {
        $user_id = auth()->id();
        $wallets = User::find($user_id)->getWallets;
        $balance_data = [];
        $type_data = [];

        foreach ($wallets as $wallet) {
            $balance_data[] = [
                'name' => $wallet->name,
                'balance' => $wallet->balance
            ];
            $type_data[] = [
                'name' => $wallet->type,
                'count' => 1
            ];
        }

        $type_data = array_reduce($type_data, function($carry, $item) {
            $index = array_search($item['name'], array_column($carry, 'name'));
            if ($index !== false) {
                $carry[$index]['count']++;
            } else {
                $carry[] = $item;
            }
            return $carry;
        }, []);

        return response()->json([
            'balance_data' => $balance_data,
            'type_data' => $type_data
        ]);
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
        $data->getTransactions()->each(function ($transaction) {
            $transaction->delete();
        });
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

}

