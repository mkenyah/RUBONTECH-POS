<?php

use App\Http\Controllers\AdminSalesController;
use App\Http\Controllers\AdminRepairesController;
use App\Http\Controllers\AdminPrintingController;
use App\Http\Controllers\AdminPhotocopyController;
 use App\Http\Controllers\AdminOther_ServicesController;
 use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ReceiptController;
use App\Http\Controllers\GraphsController;
use App\Http\Controllers\UserSalesController;
use App\Http\Controllers\Categories_ViewController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\TransactionsController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\RepairController;
use App\Http\Controllers\UserProductController ;
use App\Http\Controllers\UserCategoryController;
use App\Http\Controllers\User_DashboardController;
use App\Http\Controllers\UserLoginController;



use App\Models\Product;




// 👇 Login routes should NOT be in the 'auth' middleware group
Route::get('/', [LoginController::class, 'loginForm'])->name('login');
Route::post('/', [LoginController::class, 'login']);

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    // other protected routes
});


// 👇 Only protect dashboard and logout inside the middleware
Route::middleware('auth')->group(function () {
    Route::get('/admin/admin_dashboard', function () {
        return view('admin.admin_dashboard');
    })->name('admin.admin_dashboard');

    Route::get('/employee/employee_dashboard', function () {
        return view('employee.employee_dashboard');
    })->name('employee.employee_dashboard');

    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});

Route::middleware(['auth'])->group(function () {
    
    Route::get('employee/employee_dashboard', [User_DashboardController::class, 'index'])
        ->name('employee.employee_dashboard');
});

Route::middleware(['auth'])->group(function () {

  Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/admin/product_category', [CategoriesController::class, 'create']);
Route::post('/admin/product_category', [CategoriesController::class, 'store'])->name('categories.store');

Route::get('/admin/categories_table', [Categories_ViewController::class, 'viewCategories'])->name('admin.categories_table');





// Edit form
Route::get('/admin/category/edit/{id}', [CategoriesController::class, 'show_edit_form'])->name('admin.category_edit');
Route::put('/admin/category/update/{id}', [CategoriesController::class, 'update'])->name('admin.category.update');

// Delete category
Route::delete('/admin/category/delete/{id}', [CategoriesController::class, 'destroy'])->name('admin.category_delete');


// products table
// Show the "Add Product" form
Route::get('/admin/add_products', [ProductsController::class, 'create'])->name('admin.add_product');

// Handle the form submission to store the product
Route::post('/admin/add_products', [ProductsController::class, 'store'])->name('products.store');

//fetching product
Route::get('admin/view_products', [ProductsController::class, 'fetch_products'])->name('products.fetch_products');

// editting products
Route::get('/admin/product_edit/{id}', [ProductsController::class, 'edit'])->name('admin.product_edit');
Route::put('/admin/product_update/{id}', [ProductsController::class, 'update'])->name('admin.product_update');
Route::delete('/admin/product_delete/{id}', [ProductsController::class, 'destroy'])->name('admin.product_delete');


// users

// GET route to show the form
Route::get('/admin/add_users', [UserController::class, 'create'])->name('users.create');

// POST route to handle form submission
Route::post('/admin/add_users', [UserController::class, 'store'])->name('users.store');

// View all users
Route::get('/admin/view_users', [UserController::class, 'index'])->name('admin.view_users');

// Show form to edit a user
Route::get('/admin/view_users/{id}/edit', [UserController::class, 'edit'])->name('admin.user_edit');

// Update user
Route::put('/admin/view_users/{id}', [UserController::class, 'update'])->name('admin.user_update');

// Delete user
Route::delete('/admin/view_users/{id}', [UserController::class, 'destroy'])->name('admin.user_destroy');

// EXPENSES ROUTES

    // Show all expenses for logged-in user
    Route::get('/admin/view_expenses', [ExpenseController::class, 'index'])->name('expenses.index');

    // Show create form

    

Route::get('/admin/add_expenses', [ExpenseController::class, 'create'])->name('expenses.create');
Route::post('/admin/add_expenses', [ExpenseController::class, 'store'])->name('expenses.store');

    

    // // Store expense
    
    Route::get('/admin/view_expenses{id}/edit', [ExpenseController::class, 'edit'])->name('expenses.edit');
   Route::put('/admin/edit_expenses/{expense}', [ExpenseController::class, 'update'])->name('expenses.update');



    // // Delete expense
    Route::delete('/admin/view_expenses{expense}', [ExpenseController::class, 'destroy'])->name('expenses.destroy');



    // Dashboard Routes
   Route::get('/admin/admin_dashboard', [DashboardController::class, 'index'])->name('admin.admin_dashboard');

   Route::post('/sales/store', [TransactionsController::class, 'store']);

Route::post('/photocopy/store', [TransactionsController::class, 'storePhotocopy']);


Route::post('/repairs/store', [TransactionsController::class, 'storeRepair']);

//    tractions page
Route::get('/employee/transactions', [TransactionsController::class, 'showTransaction'])->name('employee.transactions');
   Route::post('/employee/transactions', [TransactionsController::class, 'handleTransaction'])->name('transactions.handle');

   
Route::post('/sales/store', [TransactionsController::class, 'store']);

Route::post('/sales/store', [TransactionsController::class, 'store']);
Route::post('/printing/store', [TransactionsController::class, 'storePrinting']);
Route::post('/sales/store', [TransactionsController::class, 'store']);
Route::post('/printing/store', [TransactionsController::class, 'storePrinting']);
Route::get('/products/search', [TransactionsController::class, 'search']);
Route::post('/confirm-cash-payment', [TransactionsController::class, 'confirmCashPayment']);

Route::post('/confirm-mpesa-payment', [TransactionsController::class, 'confirmMpesaPayment'])->name('confirm.mpesa');
Route::get('/check-payment-status/{transactionId}', [TransactionsController::class, 'checkPaymentStatus']);
Route::post('/mpesa/callback', [TransactionsController::class, 'handleCallback']);




// routes/web.php
Route::post('/stk-push', [TransactionsController::class, 'stkPush']);

Route::post('/api/mpesa/callback', [TransactionsController::class, 'handleCallback']);


Route::post('/mpesa/callback', [TransactionsController::class, 'handleCallback']);



// payment routes

Route::post('/mpesa/callback', [TransactionsController::class, 'handleCallback']);

Route::post('/confirm-mpesa-payment', [TransactionsController::class, 'confirmMpesaPayment'])
    ->name('confirm.mpesa.payment');

Route::post('/stk-push-callback', [TransactionsController::class, 'handleCallback'])
    ->name('mpesa.callback');

Route::get('/check-payment-status/{transactionId}', [TransactionsController::class, 'checkPaymentStatus'])
    ->name('check.payment.status');



Route::post('/api/mpesa/callback', [TransactionsController::class, 'callback']);



Route::post('/employee/repairs', [TransactionsController::class, 'storeRepair'])->name('repairs.store');
Route::post('/employee/OtherService', [TransactionsController::class, 'storeOtherService'])->name('OtherService.store');
// routes/web.php or routes/api.php
Route::post('/otherservice/store', [TransactionsController::class, 'storeOtherService']);

Route::post('/others/store', [TransactionsController::class, 'store']);


Route::post('/employee/transactions', [TransactionsController::class, 'confirmPayment'])->name('confirm.payment');
// routes/web.php
Route::post('/employee/transactions', [TransactionsController::class, 'confirm']);
Route::post('/employee/transactions', [TransactionsController::class, 'confirmCashPayment']);
Route::post('/employee/transactions', [TransactionsController::class, 'store']);


Route::post('/payment/manual-confirm', [TransactionsController::class, 'manualConfirm']);
Route::post('/mpesa/callback', [TransactionsController::class, 'handleCallback']);
Route::post('/verify-mpesa-payment', [TransactionsController::class, 'verifyMpesaPayment']);

Route::post('/verify-mpesa-payment', [TransactionsController::class, 'verifyMpesaPayment']);

Route::post('/verify-mpesa-payment', [TransactionsController::class, 'verifyMpesaPayment']);






Route::post('/receipt/finalize', [ReceiptController::class, 'finalizeReceipt'])->name('receipt.finalize');



// Route::middleware('auth')->group(function () {
//     Route::get('/admin/sales', [SaleController::class, 'showSales'])->name('admin.sales');
//     Route::get('/user/sales', [SaleController::class, 'showSales'])->name('user.sales');
// });




Route::get('/employee/repairs', [RepairController::class, 'showUserRepairs'])->name('repairs.user');

Route::get('/employee/printings', [App\Http\Controllers\PrintingController::class, 'showUserPrints'])
     ->name('employee.printings');

     Route::get('/employee/photocopies', [App\Http\Controllers\PhotocopyController::class, 'showUserPhotocopies'])
     ->name('employee.photocopies');

     Route::get('/employee/other-services', [App\Http\Controllers\OtherServiceController::class, 'showUserOtherServices'])
     ->name('employee.other_services');

// Employee-only product view
Route::get('/employee/products', [UserProductController::class, 'index'])->name('employee.products');
});
    // ->middleware(['auth'])
    // ->name('employee.products');
    Route::get('/employee/categories', [UserCategoryController::class, 'index'])->name('employee.categories');

    Route::middleware(['auth'])->group(function () {
         Route::post('/logout', [LoginController::class, 'logout'])->name('logout'); 
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});


Route::post('/login', [LoginController::class, 'login'])->name('login.attempt');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');



// use App\Http\Controllers\SaleController;

Route::middleware(['auth'])->group(function () {
 Route::get('/admin.admin_sales', [SaleController::class, 'showsales'])->name('admin.admin_sales');
Route::patch('/admin/sales/mark-paid/{id}', [SaleController::class, 'markAsPaid'])->name('admin.sales.markPaid');

Route::get('/employee.user_sales', [UserSalesController::class, 'showUserSales'])->name('employee.user_sales');

// use App\Http\Controllers\AdminRepairesController;

Route::get('/admin.admin_repairs', [AdminRepairesController::class, 'showAllRepairs'])
    ->name('admin.admin_repairs');

Route::patch('/admin/repairs/mark-paid/{id}', [AdminRepairesController::class, 'markAsPaid'])
    ->name('admin.repairs.markPaid');
});


Route::middleware(['auth'])->group(function () {

    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
// Route::middleware(['auth'])->group(function () {
Route::get('/admin.admin_printing', [AdminPrintingController::class, 'showAllPrintings'])
    ->name('admin.admin_printing');

Route::patch('/admin/printing/mark-paid/{id}', [AdminPrintingController::class, 'markAsPaid'])
    ->name('admin.printing.markPaid');
// });

Route::get('/admin.admin_photocopy', [AdminPhotocopyController::class, 'showAllPhotocopies'])
    ->name('admin.admin_photocopy');

// Mark a photocopy as paid
Route::patch('/admin/photocopy/mark-paid/{id}', [AdminPhotocopyController::class, 'markAsPaid'])
    ->name('admin.photocopy.markPaid');

   

Route::get('/admin.admin_other_services', [AdminOther_ServicesController::class, 'showAllOtherServices'])
    ->name('admin.admin_other_services');

Route::patch('/admin/other-services/mark-paid/{id}', [AdminOther_ServicesController::class, 'markAsPaid'])
    ->name('admin.other_services.markPaid');

//   Route::get('/admin/admin_graph', [GraphsController::class, 'getMonthlySummary'])
//     ->name('admin.admin_graph');

 // Show the chart page
Route::get('/admin/admin_graph', [GraphsController::class, 'index'])->name('admin.admin_graph');

// JSON endpoint for data
Route::get('/monthly-graphs-data', [GraphsController::class, 'getMonthlySummary']);


Route::get('/admin/routeadmin.admin_graph', [GraphsController::class, 'showGraphs']);
Route::get('/graphs/monthly', [GraphsController::class, 'getMonthlyData']);
Route::get('/graphs/yearly', [GraphsController::class, 'getYearlyData']);
Route::get('/admin/graphs', [GraphsController::class, 'index']);
Route::get('/graphs/monthly', [GraphsController::class, 'getMonthlyData']);
Route::get('/graphs/yearly', [GraphsController::class, 'getYearlyData']);
Route::get('/graphs/live-totals', [GraphsController::class, 'getLiveTotals']);
Route::get('/getMonthlyData', [GraphsController::class, 'getMonthlyData']);
    Route::get('/getYearlyData', [GraphsController::class, 'getYearlyData']);


Route::get('/admin/graphs', [GraphsController::class, 'index']);
Route::get('/admin/graphs/getMonthlyData', [GraphsController::class, 'getMonthlyData']);
Route::get('/admin/graphs/getYearlyData', [GraphsController::class, 'getYearlyData']);


});