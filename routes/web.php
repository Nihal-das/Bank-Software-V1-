<?php

use App\Http\Controllers\CalculatorController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KeyBoardController;

Route::get('/', [CustomerController::class, 'index'])
    ->middleware('auth');

////////////////// Customer Routes ///////////////////

Route::get('/customer', [CustomerController::class, 'create'])
    ->name('customer.create')
    ->middleware('auth')
    ->middleware('permission:/customer');

Route::post('/customers/store', [CustomerController::class, 'store'])
    ->name('customers.store')
    ->middleware('auth');

Route::get('/customers', [CustomerController::class, 'show_all'])
    ->name('customers.show_all')
    ->middleware('auth')
    ->middleware('permission:/customers');

Route::get('/customers/{customer}', [CustomerController::class, 'show'])
    ->name('customers.show')
    ->middleware('auth');

Route::get('/customer/update/{customer}', [CustomerController::class, 'edit_form'])
    ->name('customer.edit_form')
    ->middleware('auth')
    ->middleware('permission:/customer/update/{customer}');

Route::patch('/customer/update/{customer}', [CustomerController::class, 'update'])
    ->name('customer.update')
    ->middleware('auth');

Route::post('/customers/{customer}/delete', [CustomerController::class, 'delete'])
    ->name('customers.delete')
    ->middleware('auth')
    ->middleware('permission:/customers/{customer}/delete');





///////////////// Tranaction Routes ///////////////////

Route::get('/transactions', [TransactionController::class, 'create'])
    ->name('transactions.create')
    ->middleware('permission:/transactions')
    ->middleware('auth');

Route::post('/transactions/store', [TransactionController::class, 'store'])
    ->name('transactions.store')
    ->middleware('auth');




//////////////// Loan Transactions /////////////////////////////////

Route::get('/loans/create', [LoanController::class, 'create'])
    ->name('loans.create')
    ->middleware('permission:/loans/create')
    ->middleware('auth');

Route::post('/loans', [LoanController::class, 'store'])
    ->name('loans.store')
    ->middleware('auth');

Route::get('/loans/repay', [LoanController::class, 'repay_form'])
    ->name('loans.repay')
    ->middleware('permission:/loans/repay')
    ->middleware('auth');

Route::post('/loans/repay', [LoanController::class, 'repay'])
    ->name('loans.repay.store')
    ->middleware('auth');






///////////////// Register/login ///////////////////

Route::controller(RegisterController::class)->group(function () {

    Route::get('/register', 'create')
        ->name('register');
    Route::post('/register', 'store');
});

Route::controller(SessionController::class)->group(function () {
    Route::get('/login', 'create')
        ->name('login');

    Route::post('/login', 'store');

    Route::post('/logout', 'destroy')
        ->name('logout');
});




///////////////// Image Upload Routes ///////////////////

Route::middleware('auth')->group(function () {
    Route::get('/images', [ImageController::class, 'index'])
        ->middleware('permission:/images');

    Route::post('/image/upload', [ImageController::class, 'store'])->name('image.upload');

    Route::get('/image/view/{id}', [ImageController::class, 'show'])
        ->name('image.view');
});





////////////////Creating Roles/////////////


Route::controller(RoleController::class)->group(function () {

    Route::get('/roles', 'create')
        ->name('roles.create')
        ->middleware('permission:/roles')
        ->middleware('auth');

    Route::post('/roles', 'store')
        ->name('roles.store')
        ->middleware('auth');

    Route::get('/roles/view-all', 'show_all')
        ->name('roles.view_all')
        ->middleware('permission:/roles/view-all')
        ->middleware('auth');

    Route::get('/roles/view/{role}', 'show')
        ->name('roles.view')
        ->middleware('auth');

    Route::get('/roles/edit/{role}', 'edit')
        ->name('roles.edit_form')
        // ->middleware('permission:/roles/edit/{role}')
        ->middleware('auth');

    Route::patch('/roles/edit/{role}', 'update')
        ->name('roles.update')
        ->middleware('auth');

    Route::delete('/roles/delete/{role}', 'delete')
        ->name('roles.delete')
        ->middleware('permission:/roles/delete/{role}')
        ->middleware('auth');
});




///////////////////Admin Create User///////////////////////

Route::controller(UserController::class)->group(function () {

    Route::get('/dashboard', 'dashboard')
        ->name('dashboard')
        ->middleware('auth')
        ->middleware('permission:/dashboard');

    Route::get('/user/create', 'create')
        ->name('users.create')
        ->middleware('auth')
        ->middleware('permission:/user/create');

    Route::post('/user/create', 'store')
        ->name('users.store')
        ->middleware('auth');

    Route::get('/users/show-all', 'show_all')
        ->name('users.show_all')
        ->middleware('permission:/users/show-all')
        ->middleware('auth');

    Route::delete('/user/delete/{user}', 'destroy')
        ->name('users.delete')
        ->middleware('permission:/user/delete')
        ->middleware('auth');
});


/////////////////////////Menu Ordering/////////////////////

Route::get('/menu', [MenuController::class, 'show'])
    ->name('menu.view')
    ->middleware('auth');

Route::post('/menu/order-update', [MenuController::class, 'updateOrder'])
    ->name('menu.order.update')
    ->middleware('auth');

Route::get('/menu/refresh', [MenuController::class, 'refresh'])
    ->name('menu.refresh')
    ->middleware('auth');



//////////////////////// keyboard Game //////////////////////////

Route::get('/keyboard/test', [KeyBoardController::class, 'show'])
    ->middleware('auth');


////////////////////////Calculator///////////////////////////

Route::get('/calculator/show', [CalculatorController::class, 'show'])
    ->name('calculator.show');

Route::post('/calculator/show', [CalculatorController::class, 'calculate'])
    ->name('calculator.calculate');
