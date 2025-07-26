<?php

namespace App\Http\Controllers;
use App\Models\Category;

use Illuminate\Http\Request;

class Categories_ViewController extends Controller
{
    //
public function viewCategories()
{
    $categories = Category::all();
    return view('admin.categories_table', compact('categories'));
}






}
