<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataFeedController;
use App\Http\Controllers\DashboardController;
use App\Livewire\Customers, App\Livewire\Transactions, App\Livewire\CustomerEnquiries;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::redirect('/', 'login');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/enquiries', CustomerEnquiries::class)->name('enquiries');
    Route::get('/dashboard/customers', Customers::class)->name('customers');
    Route::get('/dashboard/transactions', Transactions::class)->name('transactions');

});
