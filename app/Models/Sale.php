<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = [
   'product_id',
    'quantity',
    'price_per_unit',
    'total_price',
    'payment_method',
    'status',
    'user_id',
    'transaction_id'
];

public function product()
{
    return $this->belongsTo(Product::class);
}
public function user()
{
    return $this->belongsTo(User::class);
}

}
