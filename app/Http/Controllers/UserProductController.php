<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class UserProductController extends Controller

{
    // Display only products added by the currently logged-in employee
    public function index()
    {
      $products = Product::with(['category', 'user'])
            ->orderBy('created_at', 'desc')
            ->get();


        return view('employee.user_products', compact('products'));
    }
}
