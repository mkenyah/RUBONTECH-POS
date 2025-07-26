<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Printing extends Model
{
    use HasFactory;

    protected $table = 'printing';

    protected $fillable = [
        'cost_per_page',
        'number_of_pages',
        'total_cost',
        'status',
        'payment_method',
        'user_id',
        'transaction_id',
    ];

    public function user()
{
    return $this->belongsTo(User::class);
}

}
