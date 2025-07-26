<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

  protected $fillable = [
    'product_name',
    'category_id',
    'quantity',
    'buying_price',
    'selling_price',
    'price_per_item',
    'stock_price',
    'final_profit',
    'totals_expected', // <-- Add this
    'user_in_charge',
];


    public function category()
{
    return $this->belongsTo(Category::class);
}

public function user()
{
    return $this->belongsTo(User::class, 'user_in_charge');
}

}
