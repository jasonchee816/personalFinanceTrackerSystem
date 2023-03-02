<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ["name","balance","initialBalance","type"];

    public function getUsers()
    {
        return $this->belongsTo(User::class);
    }

    public function getTransactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
