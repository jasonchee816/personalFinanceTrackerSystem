<?php

namespace App\Http\Controllers;

use App\Models\Wallet;
use Illuminate\Http\Request;
use App\Models\TransactionCategory;
use App\Models\Transaction;


class AdminController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('can:isAdmin');
    }

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
        $eachCat = [];
        $totalAmountCat = [];

        foreach($transByCat->keys() as $cat){
            array_push($eachCat, $cat);
            array_push($totalAmountCat, $transByCat[$cat]['totalPrice']);
        }
        
        
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
                $data['totalBalance'] += $data[$i]->balance;
            }
            $data1 = $data->unique('user_id');      
            $data->userNum = $data1->count()-1;
        });
        // dd($userByType);

        $eachType = [];
        $userNumType=[];

        foreach($userByType->keys() as $type){
            array_push($eachType, $type);
            array_push($userNumType, $userByType[$type]->userNum);
        }

        return view('adminPage',compact('category', 'transByCat','userByType', 'eachCat', 'totalAmountCat', 'eachType', 'userNumType'));
    }

    public function showAdminOperation() {
        $category = TransactionCategory::all();
        $transByCat = Transaction::orderBy('amount')
        ->select('*')
        ->join('transaction_categories', 'transaction_categories.id', '=', 'transactions.category')
        ->get()
        ->groupBy(function($data) {
            return $data->name;
        });

        return view('adminOperation',compact('category'));
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

    function UpdateTransactionCategory(Request $request){
        $request->validate([
            'categoryName' => 'required',
        ]);
        $transactionCategory = TransactionCategory::find($request->id);
        $transactionCategory->name = $request->input('categoryName');
        $transactionCategory->save();
        return redirect('/adminHomepage');
    }

    function passTransactionCategory($id){
        $transactionCategory = TransactionCategory::find($id);
        return view('adminUpdateCategory', compact('transactionCategory'));
    }
}
