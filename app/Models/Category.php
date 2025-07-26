<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Category extends Model
{
    //
    use HasFactory;

    protected $fillable =[
        'name',
        'description',
        'added_by'
    ];


    public function user()
{
    return $this->belongsTo(User::class, 'added_by');
}

}
