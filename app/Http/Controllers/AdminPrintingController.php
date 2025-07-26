<?php

namespace App\Http\Controllers;
use App\Models\Printing;

use Illuminate\Http\Request;

class AdminPrintingController extends Controller
{
    //
    public function showAllPrintings()
    {
        $printings = Printing::with('user')->orderBy('created_at', 'desc')->get();
        return view('admin.admin_printing', compact('printings'));
    }

    public function markAsPaid(Request $request, $id)
    {
        $request->validate([
            'payment_method' => 'required|string',
        ]);

        $printing = Printing::findOrFail($id);
        $printing->status = 'paid';
        $printing->payment_method = $request->payment_method;
        $printing->transaction_id = 'TX-' . time() . '-' . rand(100, 999);
        $printing->save();

        return redirect()->route('admin.admin_printing')->with('success', 'Printing marked as paid.');
    }
}
