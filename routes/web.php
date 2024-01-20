<?php

use App\Http\Controllers\front\CustomerController;
use App\Http\Controllers\front\FinancialController;
use App\Http\Controllers\front\InvoiceController;
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
Route::get('financial/get',[FinancialController::class,'getAllData'])->name('financial.getdata');
Route::resource('financial', FinancialController::class);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/invoice/list', [InvoiceController::class, 'list'])->name('invoice.list');
Route::post('/invoice/store', [InvoiceController::class, 'store'])->name('invoice.store');
Route::get('/invoice/delete/{id?}', [InvoiceController::class, 'destroy'])->name('invoice.destroy');
Route::get('/invoice/{type?}', [InvoiceController::class, 'index'])->name('invoice');
Route::get('edit/{id}', [InvoiceController::class, 'edit'])->name('invoice.edit');
Route::put('update/{id}', [InvoiceController::class, 'update'])->name('invoice.update');
