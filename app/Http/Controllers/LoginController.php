<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function loginForm(){
        return view('User_login.login');
    }

    public function login(Request $request){
        $request->validate([
            'username' => 'required|string',
            'password' => 'required',
        ]);

        $credentials = $request->only('username', 'password');

        $userExists = User::where('username', $request->username)->exists();

        if (!$userExists) {
            return back()->with('error', 'Username does not exist.')->withInput();
        }

        if (!Auth::attempt($credentials, $request->remember)) {
            return back()->with('error', 'Invalid password')->withInput();
        }

        $user = Auth::user();
        $request->session()->flash("Success", 'Login successful! Redirecting....');

        if ($user->role === 'admin') {
            return redirect()->route('admin.admin_dashboard');
        } elseif ($user->role === 'employee') {
            return redirect()->route('employee.employee_dashboard');
        }

        return redirect()->route('login');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
