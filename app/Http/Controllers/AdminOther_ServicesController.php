<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OtherService;

class AdminOther_ServicesController extends Controller
{
    // Show all other service records
    public function showAllOtherServices()
    {
        $otherServices = OtherService::with('user')
                            ->orderBy('created_at', 'desc')
                            ->get();

        return view('admin.admin_other_services', compact('otherServices'));
    }

    // Mark an other service as paid
    public function markAsPaid(Request $request, $id)
    {
        $request->validate([
            'payment_method' => 'required|string',
        ]);

        $otherService = OtherService::findOrFail($id);
        $otherService->status = 'paid';
        $otherService->payment_method = $request->payment_method;
        $otherService->transaction_id = 'TX-' . time() . '-' . rand(100, 999);
        $otherService->save();

        return redirect()->route('admin.admin_other_services')->with('success', 'Other service marked as paid.');
    }
}
