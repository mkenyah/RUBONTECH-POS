<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Sale;

class UserSalesController extends Controller
{
    /**
     * Show only sales that belong to the logged-in user.
     */
    public function showUserSales()
    {
        $userId = Auth::id(); // Get the logged-in user's ID

        $sales = Sale::with(['product', 'user'])
            ->where('user_id', $userId)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('employee.user_sales', compact('sales'));
    }
}
