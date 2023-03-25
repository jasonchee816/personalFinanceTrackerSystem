<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable=["amount", "description", "wallet_id", "category", "trans_date"];

    public function getCategory()
    {
        return $this->belongsTo(TransactionCategory::class, 'category');
    }

    public function getWallet()
    {
        return $this->belongsTo(Wallet::class, 'wallet_id');
    }
}
