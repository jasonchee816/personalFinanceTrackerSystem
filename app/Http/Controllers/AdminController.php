<?php

namespace App\Http\Controllers;

use App\Models\Wallet;
use Illuminate\Http\Request;
use App\Models\TransactionCategory;
use App\Models\Transaction;


class AdminController extends Controller
{
    //
    public function showAdminHomepage() {
        $category = TransactionCategory::all();
        $transByCat = Transaction::orderBy('amount')
        ->select('*')
        ->join('transaction_categories', 'transaction_categories.id', '=', 'transactions.category')
        ->get()
        ->groupBy(function($data) {
            return $data->name;
        });

        collect($transByCat)
        ->map(function($data){      
            //each cat
            $data->put('totalPrice' , 0.0);
            for($i=0; $i<count($data)-1; $i++){
                // dd($data[$i]);
                $data['totalPrice'] += $data[$i]->amount;
            }
        });
        // dd($transByCat);
    
        $userByType = Wallet::orderBy('balance')
        ->select('*')
        ->join('users', 'users.id', '=', 'wallets.user_id')
        ->get()
        ->groupBy(function($data) {
            return $data->type;
        });

        collect($userByType)
        ->map(function($data){      
            //each cat
            $data->put('totalBalance' , 0.0);
            for($i=0; $i<count($data)-1; $i++){
                // dd($data[$i]);
                $data['totalBalance'] += $data[$i]->balance;
            }

            $data1 = $data->unique('user_id');      
            $data->userNum = $data1->count()-1;
        });
        // dd($userByType["e-Wallet"]->userNum);
        return view('adminPage',compact('category', 'transByCat','userByType'));
    }

    public function showCreateCategory() {
        return view('createCategory');
    }

    public function creataTransactionCategory(Request $request) {
        $request->validate([
            'categoryName' => 'required',
            'categoryType' => 'required',
        ]);
        $transactionCategory = new TransactionCategory();
        $transactionCategory->name = $request->input('categoryName');
        $transactionCategory->type = $request->input('categoryType');
        $transactionCategory->save();
        return redirect('/adminHomepage');
    }

    public function DeleteTransactionCategory($id) {
        $data = TransactionCategory::find($id);
        $data ->delete();
        return redirect('/adminHomepage');
    }

    function UpdateTransactionCategory(Request $request){
        $request->validate([
            'categoryName' => 'required',
            'categoryType' => 'required',
        ]);
        $transactionCategory = TransactionCategory::find($request->id);
        $transactionCategory->name = $request->input('categoryName');
        $transactionCategory->type = $request->input('categoryType');
        $transactionCategory->save();
        return redirect('/adminHomepage');
    }

    function passTransactionCategory($id){
        $transactionCategory = TransactionCategory::find($id);
        return view('adminUpdateCategory', compact('transactionCategory'));

    }
}
