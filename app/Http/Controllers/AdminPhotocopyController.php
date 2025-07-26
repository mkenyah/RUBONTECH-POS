<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Photocopy;

class AdminPhotocopyController extends Controller
{
    // Show all photocopy records
    public function showAllPhotocopies()
    {
        $photocopies = Photocopy::with('user')
                        ->orderBy('created_at', 'desc')
                        ->get();

        return view('admin.admin_photocopy', compact('photocopies'));
    }

    // Mark a photocopy as paid
    public function markAsPaid(Request $request, $id)
    {
        $request->validate([
            'payment_method' => 'required|string',
        ]);

        $photocopy = Photocopy::findOrFail($id);
        $photocopy->status = 'paid';
        $photocopy->payment_method = $request->payment_method;
        $photocopy->transaction_id = 'TX-' . time() . '-' . rand(100, 999);
        $photocopy->save();

        return redirect()->route('admin.admin_photocopy')->with('success', 'Photocopy marked as paid.');
    }
}
