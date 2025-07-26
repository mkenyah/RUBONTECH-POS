<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expense;
use Illuminate\Support\Facades\Auth;

class ExpenseController extends Controller
{
    /**
     * Show the form for creating a new expense.
     */
    public function create()
    {
        return view('admin.add_expenses');
    }

    /**
     * Store a newly created expense in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'amount' => 'required|numeric|min:0',
            'payment_method' => 'required|string|max:255',
        ]);

        Expense::create([
            'category' => $request->category,
            'description' => $request->description,
            'amount' => $request->amount,
            'payment_method' => $request->payment_method,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('expenses.create')->with('success', 'Expense recorded successfully.');
    }


    public function index()
    {
        $expenses = Expense::latest()->get(); // You can paginate if preferred

        return view('admin.view_expenses', compact('expenses'));
    }

    public function edit($id)
{
    $expense = Expense::findOrFail($id);
    return view('admin.edit_expenses', compact('expense'));
}

 public function update(Request $request, $id)
    {
        $request->validate([
            'category' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'payment_method' => 'required|string|max:255',
        ]);

        $expense = Expense::findOrFail($id);
        $expense->category = $request->category;
        $expense->description = $request->description;
        $expense->amount = $request->amount;
        $expense->payment_method = $request->payment_method;
        $expense->save();

        return redirect()->back()->with('success', 'Expense updated successfully.');
    }
    /**
     * Remove the specified expense.
     */
    public function destroy(Expense $expense)
    {
        if ($expense->user_id !== Auth::id()) {
            abort(403); // prevent deleting someone else's expense
        }

        $expense->delete();
        return redirect()->route('expenses.index')->with('success', 'Expense deleted.');
    }
}
