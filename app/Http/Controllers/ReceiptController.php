<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

// Import models
use App\Models\Product;
use App\Models\Sale;
use App\Models\Printing;
use App\Models\Photocopy;
use App\Models\Repair;
use App\Models\OtherService;
use App\Models\Receipt;
use App\Models\ReceiptItem;





class ReceiptController extends Controller
{
   // Sample logic to insert a receipt and its items

    public function finalizeReceipt(Request $request)
    {
        $request->validate([
            'transaction_id' => 'required|string'
        ]);

        $transactionId = $request->transaction_id;
        $userId = Auth::id();

        // Fetch data from different service tables
        $photocopies = Photocopy::where('transaction_id', $transactionId)->get();
        $printings = Printing::where('transaction_id', $transactionId)->get();
        $repairs = Repair::where('transaction_id', $transactionId)->get();
        $others = OtherService::where('transaction_id', $transactionId)->get();
        $sales = Sale::where('transaction_id', $transactionId)->get();

        $items = [];
        $total = 0;

        foreach ($photocopies as $p) {
            $items[] = [
                'item_name' => 'Photocopy',
                'quantity' => $p->total_pages,
                'amount' => $p->total_cost
            ];
            $total += $p->total_cost;
        }

        foreach ($printings as $p) {
            $items[] = [
                'item_name' => 'Printing',
                'quantity' => $p->number_of_pages,
                'amount' => $p->total_cost
            ];
            $total += $p->total_cost;
        }

        foreach ($repairs as $r) {
            $amount = $r->cost * $r->quantity;
            $items[] = [
                'item_name' => $r->service_type,
                'quantity' => $r->quantity,
                'amount' => $amount
            ];
            $total += $amount;
        }

        foreach ($others as $o) {
            $amount = $o->cost * $o->quantity;
            $items[] = [
                'item_name' => $o->description,
                'quantity' => $o->quantity,
                'amount' => $amount
            ];
            $total += $amount;
        }

        foreach ($sales as $s) {
            $items[] = [
                'item_name' => 'Product ID: ' . $s->product_id,
                'quantity' => $s->quantity,
                'amount' => $s->total_price
            ];
            $total += $s->total_price;
        }

        if (count($items) === 0) {
            return response()->json(['error' => 'No items found for this transaction.'], 422);
        }

        // Save to database
        DB::beginTransaction();
        try {
            $receipt = Receipt::create([
                'transaction_id' => $transactionId,
                'user_id' => $userId,
                'total_amount' => $total,
                'payment_status' => 'paid'
            ]);

            foreach ($items as $item) {
                ReceiptItem::create([
                    'receipt_id' => $receipt->id,
                    'transaction_id' => $transactionId,
                    'item_name' => $item['item_name'],
                    'quantity' => $item['quantity'],
                    'amount' => $item['amount']
                ]);
            }

            DB::commit();
            return response()->json(['success' => true, 'message' => 'Receipt finalized successfully.']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'error' => 'Failed to finalize receipt.',
                'details' => $e->getMessage()
            ], 500);
        }
    }
}



