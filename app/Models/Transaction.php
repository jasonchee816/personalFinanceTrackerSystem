<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transactions extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable=["amount", "description", "walletId", "category", "transDate"];

    public function getCategory()
    {
        return $this->hasOne(TransactionCategory::class);
    }

    public function getWallet()
    {
        return $this->belongsTo(Wallet::class);
    }
}
