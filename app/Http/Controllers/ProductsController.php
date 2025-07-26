<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\User; // Ensure this is imported
use Illuminate\Support\Facades\Auth;

class ProductsController extends Controller
{
    // Show form to add new product
    public function create()
    {
        $categories = Category::all();
        return view('admin.add_products', compact('categories'));
    }

    // Store new product
    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'quantity' => 'required|integer|min:1',
            'buying_price' => 'required|numeric|min:0',
            'selling_price' => 'required|numeric|min:0',
        ]);

        // Calculate values
        $quantity = $request->quantity;
        $buyingPrice = $request->buying_price;
        $sellingPrice = $request->selling_price;

        $stockPrice = $quantity * $buyingPrice;
        $finalProfit = ($sellingPrice - $buyingPrice) * $quantity;
        $totalsExpected = $finalProfit + $stockPrice;

        // Create product
        $product = new Product();
        $product->product_name = $request->product_name;
        $product->category_id = $request->category_id;
        $product->quantity = $quantity;
        $product->buying_price = $buyingPrice;
        $product->selling_price = $sellingPrice;
        $product->stock_price = $stockPrice;
        $product->final_profit = $finalProfit;
        $product->totals_expected = $totalsExpected;
        $product->user_in_charge = Auth::id();

        $product->save();

        return redirect()->back()->with('success', 'Product added successfully!');
    }

    // Fetch products for display
    public function fetch_products()
    {
        $products = Product::with(['category', 'user'])->get();
        return view('admin.view_products', compact('products'));
    }

public function edit($id)
{
    $product = Product::findOrFail($id);
    $categories = Category::all();
    return view('admin.edit_product', compact('product', 'categories'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'product_name' => 'required|string|max:255',
        'category_id' => 'required|exists:categories,id',
        'quantity' => 'required|integer|min:1',
        'buying_price' => 'required|numeric|min:0',
        'selling_price' => 'required|numeric|min:0',
    ]);

    $product = Product::findOrFail($id);

    $product->product_name = $request->product_name;
    $product->category_id = $request->category_id;
    $product->quantity = $request->quantity;
    $product->buying_price = $request->buying_price;
    $product->selling_price = $request->selling_price;
    $product->stock_price = $request->quantity * $request->buying_price;
    $product->final_profit = ($request->selling_price - $request->buying_price) * $request->quantity;
    $product->totals_expected = $product->stock_price + $product->final_profit;

    $product->save();

    return redirect()->back()->with('success', 'Product updated successfully!');
}


public function destroy($id)
{
    $product = Product::findOrFail($id);
    $product->delete();

    return redirect()->back()->with('success', 'Product deleted successfully.');
}



}
