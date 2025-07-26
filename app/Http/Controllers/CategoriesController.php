<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category; // Make sure this is present and correct
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class CategoriesController extends Controller
{
    /**
     * Display a form to create a new category.
     * This view likely does NOT need a list of all categories.
     */
    public function create()
    {
        return view('admin.product_category');
    }

    /**
     * Store a newly created category in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        Category::create([
            'name' => $request->name,
            'description' => $request->description,
            'added_by' => Auth::id(), // system auto-inserted
        ]);

        return redirect('/admin/product_category')->with('success', 'Category added successfully!');
    }

    /**
     * Display a list of all categories.
     * This is where the $categories variable is retrieved and passed.
     */public function index()
{
    $categories = Category::orderBy('created_at', 'desc')->get(); // Newest first
    return view('admin.categories_table', compact('categories'));
}
    /**
     * Show the form for editing the specified category.
     * Uses findOrFail to get a single category or show 404.
     */
    public function show_edit_form($id)
    {
        $category = Category::findOrFail($id); // ✨ Corrected: Used Category::findOrFail($id)
        return view('admin.category_edit', compact('category'));
    }

    /**
     * Update the specified category in storage.
     */
  public function update(Request $request, $id)
{
    // Validate input fields
    $validated = $request->validate([
         'name' => 'required|string|max:255',
        'description' => 'nullable|string|max:500',
    ]);
 
    try {
        // Find category or fail
        $category = Category::findOrFail($id);

        // Update category name
        $category->update($validated);

        // Redirect with success message
        return redirect()->route('admin.categories_table')->with('success', 'Category updated successfully.');
    } catch (\Exception $e) {
        // Handle errors (e.g., if ID not found)
        return redirect()->back()->with('error', 'Failed to update category: ' . $e->getMessage());
    }
}

    /**
     * Remove the specified category from storage.
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        // Redirect to the route that displays the categories table
        return redirect()->route('admin.categories_table')->with('success', 'Category deleted successfully.');
    }



    //for downloadinf report
  public function caretogry_report()
{
    $categories = Category::orderBy('created_at', 'desc')->get();
    $downloadedAt = Carbon::now()->format('F d, Y h:i A');

    return view('admin.categories_table', compact('categories', 'downloadedAt'));
}
}