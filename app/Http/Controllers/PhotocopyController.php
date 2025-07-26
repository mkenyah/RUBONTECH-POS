<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Photocopy;

class PhotocopyController extends Controller
{
    public function showUserPhotocopies()
    {
        $userId = Auth::id();

        $photocopies = Photocopy::with('user')
            ->where('user_id', $userId)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('employee.user_photocopies', compact('photocopies'));
    }
}
