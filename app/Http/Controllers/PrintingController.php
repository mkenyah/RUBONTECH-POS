<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Printing;

class PrintingController extends Controller
{
    public function showUserPrints()
    {
        $userId = Auth::id();

        $printings = Printing::with('user') // if you have the user relation
            ->where('user_id', $userId)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('employee.user_printing', compact('printings'));
    }
}
