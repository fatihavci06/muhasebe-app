<?php

use App\Http\Controllers\front\BankController;
use App\Http\Controllers\front\CustomerController;
use App\Http\Controllers\front\FinancialController;
use App\Http\Controllers\front\InvoiceController;
use App\Http\Controllers\front\PaymentController;
use App\Http\Controllers\IndexController;
use App\Models\FinancialStatement;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('index', [IndexController::class, 'index'])->name('index');
Auth::routes();

Route::group(['prefix' => 'customer', 'middleware' => 'auth'], function () {
    // Bu grup içindeki tüm routelar için bir önek ve namespace belirlenir.
    Route::get('/', [CustomerController::class, 'index'])->name('customer.index');
    Route::get('create', [CustomerController::class, 'create'])->name('customer.create');
    Route::post('create', [CustomerController::class, 'store'])->name('customer.store');
    Route::get('edit/{id}', [CustomerController::class, 'edit'])->name('customer.edit');
    Route::put('update/{id}', [CustomerController::class, 'update'])->name('customer.update');
    Route::get('delete/{id}', [CustomerController::class, 'destroy'])->name('customer.delete');
});

Route::group(['prefix' => 'bank', 'middleware' => 'auth'], function () {

    Route::get('/', [BankController::class, 'index'])->name('bank.index');
    Route::get('create', [BankController::class, 'create'])->name('bank.create');
    Route::post('create', [BankController::class, 'store'])->name('bank.store');
    Route::get('edit/{id}', [BankController::class, 'edit'])->name('bank.edit');
    Route::put('update/{id}', [BankController::class, 'update'])->name('bank.update');
    Route::get('delete/{id}', [BankController::class, 'destroy'])->name('bank.delete');
});

Route::group(['prefix' => 'payment', 'middleware' => 'auth'], function () {
    // Bu grup içindeki tüm routelar için bir önek ve namespace belirlenir.
    Route::get('/', [PaymentController::class, 'index'])->name('payment.index');
    Route::get('create', [PaymentController::class, 'create'])->name('payment.create');
    Route::post('create', [PaymentController::class, 'store'])->name('payment.store');
    Route::get('edit/{id}', [PaymentController::class, 'edit'])->name('payment.edit');
    Route::put('update/{id}', [PaymentController::class, 'update'])->name('payment.update');
    Route::get('delete/{id}', [PaymentController::class, 'destroy'])->name('payment.destroy');
});
Route::get('financial/get',[FinancialController::class,'getAllData'])->name('financial.getdata');
Route::resource('financial', FinancialController::class);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/invoice/list', [InvoiceController::class, 'list'])->name('invoice.list');
Route::post('/invoice/store', [InvoiceController::class, 'store'])->name('invoice.store');
Route::get('/invoice/delete/{id?}', [InvoiceController::class, 'destroy'])->name('invoice.destroy');
Route::get('/invoice/{type?}', [InvoiceController::class, 'index'])->name('invoice');
Route::get('/invoice/edit/{id}', [InvoiceController::class, 'edit'])->name('invoice.edit');
Route::put('/invoice/update/{id}', [InvoiceController::class, 'update'])->name('invoice.update');
