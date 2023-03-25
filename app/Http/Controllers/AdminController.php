<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransactionCategory;


class AdminController extends Controller
{
    //
    public function showAdminHomepage() {
        $category = TransactionCategory::all();
        return view('adminPage',compact('category'));
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
