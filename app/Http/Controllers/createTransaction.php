<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\createTransaction;

class createTransaction extends Controller
{
    function createTrans(Request $request){
        $request->validate([
            'wallet' => 'required', 
            'category' => 'required',
            'amount' => 'required|integer',
            'date' => 'required',
            'desc' => 'nullable',
        ]);
        return ("Create Successfully!!");
    }
}
    
