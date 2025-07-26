<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class UserCategoryController extends Controller
{
    // Display all categories for employee
    public function index()
    {
        $categories = Category::with('user') // Eager load the user relationship
                              ->orderBy('created_at', 'desc')
                              ->get();

        return view('employee.user_categories', compact('categories'));
    }
}
