<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;

class TransactionController extends Controller
{
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
    
