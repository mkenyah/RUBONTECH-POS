<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Sale;
use App\Models\Printing;
use App\Models\Photocopy;
use App\Models\Repair;
use App\Models\OtherService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

use Illuminate\Support\Str;



use Carbon\Carbon;

class TransactionsController extends Controller
{
    public function showTransaction()
    {
        $products = Product::all();
        return view('employee.transactions', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'transaction_id' => 'required|string',
            'product_id'     => 'required|exists:products,id',
            'quantity'       => 'required|integer|min:1',
        ]);

        try {
            $userId = Auth::id();
            $product = Product::findOrFail($request->product_id);

            if ($product->quantity < $request->quantity) {
                return response()->json(['error' => 'Not enough stock available.'], 400);
            }

            $paymentMethod = 'cash';
            if ($request->filled('payment_method')) {
                $pm = strtolower($request->payment_method);
                if ($pm === 'mpesa' && $request->filled('mpesa_code')) {
                    $paymentMethod = 'mpesa:' . $request->mpesa_code;
                } elseif (in_array($pm, ['cash', 'mpesa'])) {
                    $paymentMethod = $pm;
                }
            }

            $pricePerUnit = $product->selling_price;
            $totalPrice = $pricePerUnit * $request->quantity;

            Log::info('Sale.store() payload', $request->all());

            $sale = Sale::create([
                'product_id'     => $product->id,
    'quantity'       => $request->quantity,
    'price_per_unit' => $pricePerUnit,
    'total_price'    => $totalPrice,
    'payment_method' => $paymentMethod,
    'status'         => 'unpaid',
    'user_id'        => $userId,
    'transaction_id' => $request->transaction_id,
            ]);

            $product->decrement('quantity', $request->quantity);

            Log::info('Sale created', ['id' => $sale->id]);

            return response()->json([
                'message' => '✅ Product sale recorded successfully.',
                'sale'    => $sale,
            ]);
        } catch (\Exception $e) {
            Log::error('Sale.store() failed', ['error' => $e->getMessage()]);
            return response()->json([
                'error' => 'An error occurred while recording the sale.',
            ], 500);
        }
    }



    public function storePrinting(Request $request)
    {
        $request->validate([
            'cost_per_page' => 'required|numeric|min:0.01',
            'number_of_pages' => 'required|integer|min:1',
        ]);

        $userId = Auth::id();
        $totalCost = $request->cost_per_page * $request->number_of_pages;

        $paymentMethod = 'cash';
        if ($request->filled('payment_method')) {
            $pm = strtolower($request->payment_method);
            if ($pm === 'mpesa' && $request->filled('mpesa_code')) {
                $paymentMethod = 'mpesa:' . $request->mpesa_code;
            } elseif (in_array($pm, ['cash', 'mpesa'])) {
                $paymentMethod = $pm;
            }
        }

        Printing::create([
            'cost_per_page'   => $request->cost_per_page,
            'number_of_pages' => $request->number_of_pages,
            'total_cost'      => $totalCost,
            'payment_method'  => $paymentMethod,
            'status'          => 'unpaid',
            'user_id'         => $userId,
            'transaction_id'  => $request->transaction_id ?? now()->timestamp,
        ]);

        return response()->json(['message' => 'Print transaction recorded successfully.']);
    }

    public function storePhotocopy(Request $request)
    {
        $request->validate([
            'cost_per_page'  => 'required|numeric|min:0.01',
            'total_pages'    => 'required|integer|min:1',
            'transaction_id' => 'required|string|max:255',
        ]);

        $userId = Auth::id();
        $totalCost = $request->cost_per_page * $request->total_pages;

        $pm = strtolower($request->payment_method ?? 'cash');
        $paymentMethod = $pm === 'mpesa' && $request->filled('mpesa_code')
            ? 'mpesa:' . $request->mpesa_code
            : ($pm === 'mpesa' ? 'mpesa' : 'cash');

        Photocopy::create([
            'cost_per_page'  => $request->cost_per_page,
            'total_pages'    => $request->total_pages,
            'total_cost'     => $totalCost,
            'payment_method' => $paymentMethod,
            'status'         => 'unpaid',
            'user_id'        => $userId,
            'transaction_id' => $request->transaction_id,
        ]);

        return response()->json(['message' => 'Photocopy saved.']);
    }

    public function storeRepair(Request $request)
    {
        $request->validate([
            'service_type'    => 'required|string|max:255',
            'cost'            => 'required|numeric|min:0.01',
            'transaction_id'  => 'required|string|max:255',
             'quantity'        => 'required|integer|min:1',
        ]);

        $userId = Auth::id();
        $pmRaw = strtolower($request->input('payment_method', 'cash'));
        $paymentMethod = $pmRaw === 'mpesa' && $request->filled('mpesa_code')
            ? 'mpesa:' . $request->mpesa_code
            : ($pmRaw === 'mpesa' ? 'mpesa' : 'cash');

        $repair = Repair::create([
            'service_type'   => $request->service_type,
            'cost'           => $request->cost,
            'quantity'       => $request->quantity,
            'status'         => 'unpaid',
            'payment_method' => $paymentMethod,
            'user_id'        => $userId,
            'transaction_id' => $request->transaction_id,
        ]);

        return response()->json(['message' => 'Repair saved successfully', 'repair' => $repair]);
    }



    

public function storeOtherService(Request $request)
{
    $request->validate([
        'description'    => 'required|string|max:255',
        'cost'           => 'required|numeric|min:0.01',
        'transaction_id' => 'required|string|max:255',
        'quantity'       => 'required|integer|min:1', 
    ]);

    $userId = Auth::id();
    $pmRaw = strtolower($request->input('payment_method', 'cash'));
    $paymentMethod = $pmRaw === 'mpesa' && $request->filled('mpesa_code')
        ? 'mpesa:' . $request->mpesa_code
        : ($pmRaw === 'mpesa' ? 'mpesa' : 'cash');

    $other = OtherService::create([
        'description'    => $request->description,
        'cost'           => $request->cost,
        'quantity'       => $request->quantity, 
        'status'         => 'unpaid',
        'payment_method' => $paymentMethod,
        'user_id'        => $userId,
        'transaction_id' => $request->transaction_id,
    ]);

    return response()->json([
        'message' => '✅ Other service saved successfully',
        'other'   => $other
    ]);
}





// Controller
 public function search(Request $request)
{
    $q = $request->input('q');

    // You can keep this validation if you want to ensure a minimum query length on the server-side
    // $request->validate(['q' => 'nullable|string|min:2']);

    $products = Product::where('product_name', 'like', "%$q%")
        // Removed ->orWhere('product_code', 'like', "%$q%") - this was already out, good.
        ->select('id', 'product_name', 'quantity', 'selling_price') // No product_code here - correct.
        ->limit(10) // Limit the results to keep responses small - good practice.
        ->get();

    return response()->json($products);
}
    public function handleTransaction(Request $request)
    {
        if ($request->has('product_id')) {
            return $this->store($request);
        }

        if ($request->has('cost_per_page') && $request->has('number_of_pages')) {
            return $this->storePrinting($request);
        }

        if ($request->has('cost_per_page') && $request->has('total_pages')) {
            return $this->storePhotocopy($request);
        }

        return back()->with('error', 'Invalid form submission.');
    }

    // ✅ FINAL version of confirmCashPayment
public function confirmCashPayment(Request $request)
{
    try {
        $request->validate([
            'transaction_id' => 'required|string',
        ]);

        $trxId = $request->transaction_id;

        // ✅ Check if transaction exists in any of the service tables
        $hasItems = collect(['sales', 'printing', 'photocopies', 'repairs', 'other_services'])
            ->some(function ($table) use ($trxId) {
                return DB::table($table)->where('transaction_id', $trxId)->exists();
            });

        if (!$hasItems) {
            return response()->json([
                'status' => 'error',
                'message' => '❌ Cannot confirm payment: No items found in the receipt.',
            ]);
        }

        // ✅ Update status and method in each table where the transaction exists
        foreach (['sales', 'printing', 'photocopies', 'repairs', 'other_services'] as $table) {
            DB::table($table)
                ->where('transaction_id', $trxId)
                ->update([
                    'status' => 'paid',
                    'payment_method' => 'cash',
                    'updated_at' => now(),
                ]);
        }

        // ✅ Insert the receipt
        

        return response()->json([
            'status' => 'success',
            'message' => "✅ Cash payment confirmed for transaction {$trxId}.",
            'shouldRefresh' => true,
        ]);

    } catch (\Exception $e) {
        Log::error('❌ Payment confirmation failed: ' . $e->getMessage());
        return response()->json([
            'status' => 'error',
            'message' => '❌ An error occurred during payment confirmation.',
        ], 500);
    }
}












private function formatPhone($phone)
{
    $phone = preg_replace('/\D/', '', $phone); // Remove non-digits

    // 07xxxxxxxx or 01xxxxxxxx
    if (preg_match('/^0(7|1)\d{8}$/', $phone)) {
        return '254' . substr($phone, 1);
    }

    // Already formatted
    if (preg_match('/^254(7|1)\d{8}$/', $phone)) {
        return $phone;
    }

    throw new \Exception('Invalid phone number format: ' . $phone);
}







public function confirmMpesaPayment(Request $request)
{
    $validated = $request->validate([
        'transaction_id' => 'required|string',
        'payment_method' => 'required|in:mpesa',
        'total_amount'   => 'required|numeric|min:1',
        'phone_number' =>  ['required', 'regex:/^0(7|1)\d{8}$/'],


    ]);

    try {
        $access_token = $this->getAccessToken();
        $timestamp = now()->format('YmdHis');
        $password = base64_encode(
            env('MPESA_SHORTCODE') .
            env('MPESA_PASSKEY') .
            $timestamp
        );

        $phone = $this->formatPhone($validated['phone_number']);
        $callbackUrl = env('MPESA_CALLBACK_URL');

        Log::info('📞 Formatted Phone:', ['phone' => $phone]);
        Log::info('🔁 Callback URL:', ['url' => $callbackUrl]);

        $payload = [
            "BusinessShortCode" => env('MPESA_SHORTCODE'),
            "Password" => $password,
            "Timestamp" => $timestamp,
            "TransactionType" => "CustomerPayBillOnline",
            "Amount" => $validated['total_amount'],
            "PartyA" => $phone,
            "PartyB" =>'880100',
            "PhoneNumber" => $phone,
            "CallBackURL" => $callbackUrl,
            "AccountReference" => "103194",
            "TransactionDesc" => "Payment for services"
        ];

        $response = Http::withToken($access_token)
            ->post('https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest', $payload);

        Log::info('📡 Safaricom Raw Response:', [
            'status' => $response->status(),
            'body' => $response->body()
        ]);

        if (!$response->ok()) {
            return response()->json([
                'status' => 'error',
                'message' => 'STK Push failed — Unable to connect to Safaricom.',
                'debug' => $response->body()
            ]);
        }

        $res = $response->json();

        if (isset($res['errorCode']) || isset($res['errorMessage'])) {
            return response()->json([
                'status' => 'error',
                'message' => $res['errorMessage'] ?? 'Safaricom returned an error.',
                'debug' => $res
            ]);
        }

        if (!isset($res['CheckoutRequestID'])) {
            Log::warning('⚠️ STK Push missing CheckoutRequestID', $res);

            return response()->json([
                'status' => 'error',
                'message' => 'STK Push failed — Missing CheckoutRequestID.',
                'debug' => $res
            ]);
        }

       DB::table('transactions')->updateOrInsert(
    ['transaction_id' => $validated['transaction_id']],
    [
        'checkout_request_id' => $res['CheckoutRequestID'],
        'status' => 'pending',
        'phone' => $phone,
        'payment_method' => 'mpesa',
        'updated_at' => now(),
        'created_at' => now(), // optional: for first-time insert only
    ]
);



        return response()->json([
            'status' => 'success',
            'message' => $res['CustomerMessage'] ?? 'STK Push sent successfully ✅',
            'debug' => $res
        ]);

    } catch (\Exception $e) {
        Log::error('❌ STK Push Exception', [
            'message' => $e->getMessage(),
            'file' => $e->getFile(),
            'line' => $e->getLine()
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'STK Push sent successfully ✅.',
            'debug' => $e->getMessage()
        ]);
    }
}

// private function getAccessToken()
// {
//     $consumerKey = env('MPESA_CONSUMER_KEY');
//     $consumerSecret = env('MPESA_CONSUMER_SECRET');

//     if (!$consumerKey || !$consumerSecret) {
//         throw new \Exception('MPESA consumer key or secret is not set in .env');
//     }

//     $response = Http::withBasicAuth($consumerKey, $consumerSecret)
//         ->get('https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials');

//     if (!$response->ok()) {
//         throw new \Exception('Failed to get MPESA access token: ' . $response->body());
//     }

//     return $response->json()['access_token'] ?? throw new \Exception('Access token missing from response');
// }


public function callback(Request $request)
{
    Log::info('📥 MPESA CALLBACK RECEIVED', [
        'payload' => $request->all()
    ]);
}





public function verifyMpesaPayment(Request $request)  
{
    try {
        $request->validate([
            'transaction_id' => 'required|string',
        ]);

        $trxId = $request->transaction_id;
        $tables = ['sales', 'printing', 'photocopies', 'repairs', 'other_services'];
        $rowsUpdated = 0;

        foreach ($tables as $table) {
            $updated = DB::table($table)->where('transaction_id', $trxId)
                ->where('status', '!=', 'paid') // avoid redundant updates
                ->update([
                    'status' => 'paid',
                    'payment_method' => 'mpesa',
                    'updated_at' => now()
                ]);

            $rowsUpdated += $updated;
        }

        if ($rowsUpdated === 0) {
            return response()->json([
                'status' => 'error',
                'message' => "❌ No unpaid records found for transaction ID: $trxId"
            ]);
        }

        return response()->json([
            'status' => 'success',
            'message' => "✅ MPESA payment confirmed for transaction $trxId"
        ]);

    } catch (\Exception $e) {
        Log::error('❌ MPESA Payment confirmation failed: ' . $e->getMessage());

        return response()->json([
            'status' => 'error',
            'message' => '❌ An error occurred during MPESA payment confirmation.'
        ], 500);
    }
}









/**
 * Update all service tables with the transaction ID
 */
private function markTransactionPaidInTables(string $transactionId, string $method = 'mpesa'): void
{
    $tables = ['sales', 'printing', 'photocopies', 'repairs', 'other_services'];

    foreach ($tables as $table) {
        $count = DB::table($table)
            ->where('transaction_id', $transactionId)
            ->update([
                'status' => 'paid',
                'payment_method' => $method,
                'updated_at' => now()
            ]);

        Log::info("🔧 Updated table '{$table}' for transaction ID {$transactionId}", ['rows_updated' => $count]);

        if ($count === 0) {
            Log::warning("⚠️ No rows found in '{$table}' with transaction ID: {$transactionId}");
        }
    }
}




    public function handleCallback(Request $request)
    {
        Log::channel('daily')->info('🔔 MPESA CALLBACK HIT', $request->all());

        $data = $request->input('Body.stkCallback');
        if (!$data) return response()->json(['error'=>'Invalid'],400);

        $resCode = data_get($data,'ResultCode');
        $checkoutId = data_get($data,'CheckoutRequestID');
        if ($resCode != 0) {
            Log::channel('daily')->warning("STK failed with code $resCode");
            return response()->json(['message'=>'Not completed','code'=>$resCode]);
        }

        $items = collect($data['CallbackMetadata']['Item'])->keyBy('Name');
        $mpesaCode = data_get($items,'MpesaReceiptNumber.Value');
        $phone = data_get($items,'PhoneNumber.Value');

        $trx = DB::table('transactions')->where('checkout_request_id',$checkoutId)->first();
        if (!$trx) {
            Log::channel('daily')->error("❌ No transaction for checkout ID $checkoutId");
            return response()->json(['error'=>'txn not found'],404);
        }

        DB::table('transactions')->where('checkout_request_id',$checkoutId)
            ->update(['status'=>'paid','payment_method'=>"mpesa:$mpesaCode",'phone'=>$phone,'updated_at'=>now()]);
        Log::channel('daily')->info("✅ Transaction marked paid: {$trx->transaction_id}");

        foreach(['sales','printing','photocopies','repairs','other_services'] as $table){
            DB::table($table)
                ->where('transaction_id',$trx->transaction_id)
                ->update(['status'=>'paid','payment_method'=>'mpesa','updated_at'=>now()]);
            Log::channel('daily')->info("✅ Updated $table for TX {$trx->transaction_id}");
        }

        return response()->json(['message'=>'Services marked paid']);
    }

    public function checkPaymentStatus($transactionId)
    {
        $txn = DB::table('transactions')->where('transaction_id', $transactionId)->first();

        if (!$txn) {
            return response()->json(['status' => 'not_found']);
        }

        return response()->json(['status' => $txn->status]);
    }
private function getAccessToken()
{
    $consumerKey = env('MPESA_CONSUMER_KEY');
    $consumerSecret = env('MPESA_CONSUMER_SECRET');

    if (!$consumerKey || !$consumerSecret) {
        throw new \Exception('MPESA consumer key or secret is not set in .env');
    }

    $response = Http::withBasicAuth($consumerKey, $consumerSecret)
        ->get('https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials');

    if (!$response->ok()) {
        throw new \Exception('Failed to get MPESA access token: ' . $response->body());
    }

    return $response->json()['access_token'] ?? throw new \Exception('Access token missing from response');
}



   
}
    // ⬇ Optional: Keep your other methods like handleCallback, etc...

