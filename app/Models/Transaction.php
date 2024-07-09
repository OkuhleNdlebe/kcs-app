<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = ['customer_id', 'transaction_date', 'reference', 'amount', 'type'];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
