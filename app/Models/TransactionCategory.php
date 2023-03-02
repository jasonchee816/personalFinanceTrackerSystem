<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transactionCategories extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable=["name", "type"];

    public function transactions()
    {
        return $this->belongsTo(transaction::class);
    }

}