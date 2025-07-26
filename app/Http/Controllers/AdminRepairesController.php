<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Repair;

class AdminRepairesController extends Controller
{
    //
    public function showAllRepairs()
    {
        $repairs = Repair::with('user')
                         ->orderBy('created_at', 'desc')
                         ->get();

        return view('admin.admin_repairs', compact('repairs'));
    }

    public function markAsPaid(Request $request, $id)
{
    $request->validate([
        'payment_method' => 'required|string',
    ]);

    $repair = Repair::findOrFail($id);
    $repair->status = 'paid';
    $repair->payment_method = $request->payment_method;
    $repair->transaction_id = 'TX-' . time() . '-' . rand(100, 999);
    $repair->save();

    return redirect()->route('admin.admin_repairs')->with('success', 'Repair marked as paid.');
}

    
}
