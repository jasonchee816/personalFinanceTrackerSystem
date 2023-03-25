<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionCategory extends Model
{
    const CAT_TYPE = ['income', 'expense'];
    
    use HasFactory;
    public $timestamps = false;

    protected $fillable=["name", "type"];

    public function getTransactions()
    {
        return $this->hasMany(Transaction::class);
    }

}
