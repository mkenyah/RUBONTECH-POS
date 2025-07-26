<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Sale;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $userCount = User::count();
        $today = Carbon::today();

        $sales = DB::table('sales')
            ->whereDate('created_at', $today)
            ->sum('total_price');

        $repairs = DB::table('repairs')
            ->whereDate('created_at', $today)
            ->sum('cost');

        $photocopies = DB::table('photocopies')
            ->whereDate('created_at', $today)
            ->sum('total_cost');

        $printing = DB::table('printing')
            ->whereDate('created_at', $today)
            ->sum('total_cost');

        $other_services = DB::table('other_services')
            ->whereDate('created_at', $today)
            ->sum('cost');

        // Expenses.amount is varchar(10), so we cast to float using sum() on collection
        $expenses = DB::table('expenses')
            ->whereDate('created_at', $today)
            ->get()
            ->sum(function ($item) {
                return (float) $item->amount;
            });

        $profit = $sales + $photocopies + $printing + $other_services + $repairs - $expenses;

        // Get most sold products
       $totalQuantity = Sale::sum('quantity');

$mostSold = Sale::select('product_id', DB::raw('SUM(quantity) as total_sold'))
    ->groupBy('product_id')
    ->orderByDesc('total_sold')
    ->limit(5)
    ->get()
    ->map(function ($item) use ($totalQuantity) {
        $item->percentage = $totalQuantity > 0
            ? round(($item->total_sold / $totalQuantity) * 100)
            : 0;

        // Optional: fetch product_name from related table if needed
        $item->product_name = DB::table('products')
            ->where('id', $item->product_id)
            ->value('product_name');

        return $item;
    });

        return view('admin.admin_dashboard', compact(
            'userCount', 'sales', 'repairs', 'photocopies', 'printing', 'other_services', 'profit', 'expenses', 'mostSold'
        ));
    }
}
