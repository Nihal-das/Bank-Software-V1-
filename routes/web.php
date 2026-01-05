<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\ImageController;

Route::get('/', [CustomerController::class, 'index'])
    ->middleware('auth');

Route::get('/customer', [CustomerController::class, 'create'])
    ->middleware('auth');

Route::post('/customers/store', [CustomerController::class, 'store'])
    ->name('customers.store')
    ->middleware('auth');


////////////////// Customer SHOW Routes ///////////////////
Route::get('/customers', [CustomerController::class, 'show_all'])
    ->name('customers.show_all')
    ->middleware('auth');

Route::get('/customers/{customer}', [CustomerController::class, 'show'])
    ->name('customers.show')
    ->middleware('auth');


///////////////// Tranaction Routes ///////////////////

Route::get('/transactions', [TransactionController::class, 'create'])
    ->name('transactions.create')
    ->middleware('auth');

Route::post('/transactions/store', [TransactionController::class, 'store'])
    ->name('transactions.store')
    ->middleware('auth');


//////////////// Loan Transactions /////////////////////////////////

Route::get('/loans/create', [LoanController::class, 'create'])
    ->name('loans.create')
    ->middleware('auth');

Route::post('/loans', [LoanController::class, 'store'])
    ->name('loans.store')
    ->middleware('auth');

Route::get('/loans/repay', [LoanController::class, 'repay_form'])
    ->name('loans.repay')
    ->middleware('auth');

Route::post('/loans/repay', [LoanController::class, 'repay'])
    ->name('loans.repay.store')
    ->middleware('auth');






///////////////// register/login ///////////////////
Route::get('/register', [RegisterController::class, 'create']);
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/login', [SessionController::class, 'create'])
    ->name('login');

Route::post('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy']);



///////////////// Image Upload Routes ///////////////////

Route::middleware('auth')->group(function () {
    Route::get('/images', [ImageController::class, 'index']);
    Route::post('/image/upload', [ImageController::class, 'store'])->name('image.upload');
    Route::get('/image/view/{id}', [ImageController::class, 'show'])
        ->name('image.view')->middleware('auth');
});
