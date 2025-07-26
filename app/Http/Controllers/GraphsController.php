<?php
// app/Http/Controllers/GraphsController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Carbon\Carbon;

class GraphsController extends Controller
{
    public function index()
    {
        $userCount = User::count();
        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;

        $sales = DB::table('sales')->whereMonth('created_at', $currentMonth)->whereYear('created_at', $currentYear)->sum('total_price');
        $repairs = DB::table('repairs')->whereMonth('created_at', $currentMonth)->whereYear('created_at', $currentYear)->sum('cost');
        $photocopies = DB::table('photocopies')->whereMonth('created_at', $currentMonth)->whereYear('created_at', $currentYear)->sum('total_cost');
        $printing = DB::table('printing')->whereMonth('created_at', $currentMonth)->whereYear('created_at', $currentYear)->sum('total_cost');
        $other_services = DB::table('other_services')->whereMonth('created_at', $currentMonth)->whereYear('created_at', $currentYear)->sum('cost');
        $expenses = DB::table('expenses')->whereMonth('created_at', $currentMonth)->whereYear('created_at', $currentYear)->sum('amount');

        $profit = $sales + $repairs + $photocopies + $printing + $other_services - $expenses;

        return view('admin.admin_graph', compact(
            'userCount', 'sales', 'repairs', 'photocopies', 'printing',
            'other_services', 'expenses', 'profit'
        ));
    }

    public function getMonthlyData()
    {
        $year = Carbon::now()->year;

        $get = function ($table, $column) use ($year) {
            return DB::table($table)
                ->selectRaw('MONTH(created_at) as month, SUM(' . $column . ') as total')
                ->whereYear('created_at', $year)
                ->groupBy(DB::raw('MONTH(created_at)'))
                ->pluck('total', 'month')
                ->toArray();
        };

        $sales = $get('sales', 'total_price');
        $repairs = $get('repairs', 'cost');
        $photocopies = $get('photocopies', 'total_cost');
        $printing = $get('printing', 'total_cost');
        $others = $get('other_services', 'cost');
        $expenses = $get('expenses', 'amount');

        $monthlyData = [];

        // Ensure all 12 months are present
        for ($m = 1; $m <= 12; $m++) {
            $monthlyData['sales'][] = $sales[$m] ?? 0;
            $monthlyData['repairs'][] = $repairs[$m] ?? 0;
            $monthlyData['photocopies'][] = $photocopies[$m] ?? 0;
            $monthlyData['printing'][] = $printing[$m] ?? 0;
            $monthlyData['other_services'][] = $others[$m] ?? 0;
            $monthlyData['expenses'][] = $expenses[$m] ?? 0;

            $monthlyData['profit'][] =
                ($sales[$m] ?? 0) + ($repairs[$m] ?? 0) + ($photocopies[$m] ?? 0) +
                ($printing[$m] ?? 0) + ($others[$m] ?? 0) - ($expenses[$m] ?? 0);
        }

        return response()->json($monthlyData);
    }

    public function getYearlyData()
    {
        $get = function ($table, $column) {
            return DB::table($table)
                ->selectRaw('YEAR(created_at) as year, SUM(' . $column . ') as total')
                ->groupBy(DB::raw('YEAR(created_at)'))
                ->pluck('total', 'year')
                ->toArray();
        };

        $sales = $get('sales', 'total_price');
        $repairs = $get('repairs', 'cost');
        $photocopies = $get('photocopies', 'total_cost');
        $printing = $get('printing', 'total_cost');
        $others = $get('other_services', 'cost');
        $expenses = $get('expenses', 'amount');

        // Get all unique years from all tables
        $years = array_unique(array_merge(
            array_keys($sales),
            array_keys($repairs),
            array_keys($photocopies),
            array_keys($printing),
            array_keys($others),
            array_keys($expenses)
        ));
        sort($years);

        $yearlyData = [];

        foreach ($years as $y) {
            $yearlyData['sales'][] = $sales[$y] ?? 0;
            $yearlyData['repairs'][] = $repairs[$y] ?? 0;
            $yearlyData['photocopies'][] = $photocopies[$y] ?? 0;
            $yearlyData['printing'][] = $printing[$y] ?? 0;
            $yearlyData['other_services'][] = $others[$y] ?? 0;
            $yearlyData['expenses'][] = $expenses[$y] ?? 0;
            $yearlyData['profit'][] =
                ($sales[$y] ?? 0) + ($repairs[$y] ?? 0) + ($photocopies[$y] ?? 0) +
                ($printing[$y] ?? 0) + ($others[$y] ?? 0) - ($expenses[$y] ?? 0);
        }

        $yearlyData['labels'] = $years;

        return response()->json($yearlyData);
    }
}