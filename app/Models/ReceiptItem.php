<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ReceiptItem extends Model
{
    use HasFactory;

     protected $fillable = [
        'receipt_id',
        'transaction_id',
        'item_name',
        'quantity',
        'amount',
    ];

    public function receipt()
    {
        return $this->belongsTo(Receipt::class, 'receipt_id', 'receipt_id');
    }
}
