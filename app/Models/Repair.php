<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Repair extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_type',
        'cost',
        'quantity',
        'status',
        'payment_method',
        'user_id',
        'transaction_id',
        'created_at',
    ];

     public function user()
    {
        return $this->belongsTo(User::class);
    }
}
