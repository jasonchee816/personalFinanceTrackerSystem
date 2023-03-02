<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transactions extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable=["amount", "desc", "walletId", "userId", "categories", "transDate"];

    public function getCategories()
    {
        return $this->hasOne(transactionCategories::class);
    }

    public function getWallets()
    {
        return $this->belongsTo(wallets::class);
    }
}
