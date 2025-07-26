<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Sale;
use Carbon\Carbon;

class User_DashboardController extends Controller
{
    public function index()
    {
        $userId = Auth::id(); // Logged-in employee
        $today = Carbon::today();

        // Daily summaries - employee-specific
        $sales = DB::table('sales')
            ->where('user_id', $userId)
            ->whereDate('created_at', $today)
            ->sum('total_price');

        $repairs = DB::table('repairs')
            ->where('user_id', $userId)
            ->whereDate('created_at', $today)
            ->sum('cost');

        $photocopies = DB::table('photocopies')
            ->where('user_id', $userId)
            ->whereDate('created_at', $today)
            ->sum('total_cost');

        $printing = DB::table('printing')
            ->where('user_id', $userId)
            ->whereDate('created_at', $today)
            ->sum('total_cost');

        // Most sold items by this employee
        $totalQuantity = Sale::where('user_id', $userId)->sum('quantity');

        $mostSold = Sale::select('product_id', DB::raw('SUM(quantity) as total_sold'))
            ->where('user_id', $userId)
            ->groupBy('product_id')
            ->orderByDesc('total_sold')
            ->limit(5)
            ->get()
            ->map(function ($item) use ($totalQuantity) {
                $item->percentage = $totalQuantity > 0
                    ? round(($item->total_sold / $totalQuantity) * 100)
                    : 0;

                $item->product_name = DB::table('products')
                    ->where('id', $item->product_id)
                    ->value('product_name');

                return $item;
            });

        return view('employee.employee_dashboard', compact(
            'sales',
            'repairs',
            'photocopies',
            'printing',
            'mostSold'
        ));
    }
}
