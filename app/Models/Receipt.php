<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Receipt extends Model
{
    use HasFactory;

        protected $fillable = [
        'transaction_id',
        'user_id',
        'payment_status',
        'total_amount',
    ]; 

    public function items()
    {
        return $this->hasMany(ReceiptItem::class, 'receipt_id', 'receipt_id');
    }
}
