<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Repair;

class RepairController extends Controller
{
    public function showUserRepairs()
    {
        // Get the currently logged-in user's ID
        $userId = Auth::id();

        // Fetch only the repairs created by this user
        $repairs = Repair::where('user_id', $userId)
                         ->orderBy('created_at', 'desc')
                         ->get();

        return view('employee.user_repairs', compact('repairs'));
    }
}
