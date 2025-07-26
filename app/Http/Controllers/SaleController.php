<?php

namespace App\Http\Controllers;
use App\Models\Sale;


use Illuminate\Http\Request;

class saleController extends Controller
{
    //
public function showsales()
{
   $sales = Sale::orderBy('created_at', 'desc')->get(); 
return view('admin.admin_sales', compact('sales'));
 // ✅ Now $sales is defined
}
public function markAsPaid(Request $request, $id)
{
    $request->validate([
        'payment_method' => 'required|string',
    ]);

    $sale = Sale::findOrFail($id);
    $sale->status = 'paid';
    $sale->payment_method = $request->payment_method;
    $sale->save();

    return redirect()->route('admin.admin_sales');
}







}
