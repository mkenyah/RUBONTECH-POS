<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\OtherService;

class OtherServiceController extends Controller
{
    public function showUserOtherServices()
    {
        $userId = Auth::id();

        $otherServices = OtherService::with('user')
            ->where('user_id', $userId)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('employee.user_other_services', compact('otherServices'));
    }
}
