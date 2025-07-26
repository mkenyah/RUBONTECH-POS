<?php

namespace App\Models;
// app/Models/OtherService.php

use Illuminate\Database\Eloquent\Model;
  use HasFactory;

class OtherService extends Model
{
    //
  
// app/Models/OtherService.php
protected $fillable = [
    'description',
    'cost',
    'quantity',
    'status',
    'payment_method',
    'user_id',
    'transaction_id'
];

public function user()
{
    return $this->belongsTo(User::class);
}


    
}
