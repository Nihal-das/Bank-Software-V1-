<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;

Route::get('/', [CustomerController::class, 'index'])
    ->middleware('auth');

Route::get('/customer', [CustomerController::class, 'create'])
    ->middleware('auth')
    ->middleware('permission:/customer');

Route::post('/customers/store', [CustomerController::class, 'store'])
    ->name('customers.store')
    ->middleware('auth');


////////////////// Customer SHOW Routes ///////////////////
Route::get('/customers', [CustomerController::class, 'show_all'])
    ->name('customers.show_all')
    ->middleware('auth')
    ->middleware('permission:/customers');

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
        ->name('image.view');
});





////////////////Creating Roles/////////////

Route::get('/roles', [RoleController::class, 'create'])
    ->name('roles.create')
    ->middleware('auth');

Route::post('/roles', [RoleController::class, 'store'])
    ->name('roles.store')
    ->middleware('auth');

Route::get('/roles/view_all', [RoleController::class, 'show_all'])
    ->name('roles.view_all')
    ->middleware('auth');

Route::get('/roles/view/{role}', [RoleController::class, 'show'])
    ->name('roles.view')
    ->middleware('auth');

Route::get('/roles/edit/{role}', [RoleController::class, 'edit'])
    ->name('roles.edit_form')
    ->middleware('auth');

Route::patch('/roles/edit/{role}', [RoleController::class, 'update'])
    ->name('roles.update')
    ->middleware('auth');

Route::delete('/roles/delete/{role}', [RoleController::class, 'delete'])
    ->name('roles.delete')
    ->middleware('auth');


///////////////////Admin Create User///////////////////////

Route::get('/dashboard', [UserController::class, 'dashboard'])
    ->name('dashboard')
    ->middleware('auth');

Route::get('/user/create', [UserController::class, 'create'])
    ->name('users.create')
    ->middleware('auth');

Route::post('/user/create', [UserController::class, 'store'])
    ->name('users.store')
    ->middleware('auth');
