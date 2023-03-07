<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    use HasFactory;

    const WALLET_TYPE = ['Savings Account','e-Wallet','Cash Wallet', 'Credit Card'];

    public $timestamps = false;
    protected $fillable = ["name","balance","initial_balance","type"];

    public function getUser()
    {
        return $this->belongsTo(User::class);
    }

    public function getTransactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
