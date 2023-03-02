<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transactions extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable=["amount", "desc", "walletId", "userId", "category", "transDate"];

    public function getCategories()
    {
        return $this->hasOne(TransactionCategory::class);
    }

    public function getWallets()
    {
        return $this->belongsTo(Wallet::class);
    }
}
