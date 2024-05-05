<?php

use App\Http\Controllers\front\BankController;
use App\Http\Controllers\front\CustomerController;
use App\Http\Controllers\front\FinancialController;
use App\Http\Controllers\front\InvoiceController;
use App\Http\Controllers\front\OfferController;
use App\Http\Controllers\front\PaymentController;
use App\Http\Controllers\front\ProductController;
use App\Http\Controllers\front\ProfileController;
use App\Http\Controllers\front\UserController;
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
Auth::routes();
Route::middleware(['auth'])->group(function () {
    // Routes that require authentication and admin role
    Route::get('invoice/invoice-payment', [InvoiceController::class, 'listWithPaymentType'])->name('invoice.listWithPaymentType');

    Route::get('index', [IndexController::class, 'index'])->name('index');
    Route::middleware(['permission'])->group(function () {

        Route::group(['prefix' => 'customer'], function () {
            // Bu grup içindeki tüm routelar için bir önek ve namespace belirlenir.
            Route::get('/', [CustomerController::class, 'index'])->name('customer.index');
            Route::get('extre/{id}', [CustomerController::class, 'extre'])->name('customer.extre');
            Route::get('create', [CustomerController::class, 'create'])->name('customer.create');
            Route::post('create', [CustomerController::class, 'store'])->name('customer.store');
            Route::get('edit/{id}', [CustomerController::class, 'edit'])->name('customer.edit');
            Route::put('update/{id}', [CustomerController::class, 'update'])->name('customer.update');
            Route::get('delete/{id}', [CustomerController::class, 'destroy'])->name('customer.delete');
        });
        Route::group(['prefix' => 'bank'], function () {

            Route::get('/', [BankController::class, 'index'])->name('bank.index');
            Route::get('create', [BankController::class, 'create'])->name('bank.create');
            Route::post('create', [BankController::class, 'store'])->name('bank.store');
            Route::get('edit/{id}', [BankController::class, 'edit'])->name('bank.edit');
            Route::put('update/{id}', [BankController::class, 'update'])->name('bank.update');
            Route::get('delete/{id}', [BankController::class, 'destroy'])->name('bank.delete');
        });
        Route::group(['prefix' => 'offer','middleware'=>'offer'], function () {

            Route::get('/', [OfferController::class, 'index'])->name('offer.index');
            Route::get('create', [OfferController::class, 'create'])->name('offer.create');
            Route::post('create', [OfferController::class, 'store'])->name('offer.store');
            Route::get('edit/{id}', [OfferController::class, 'edit'])->name('offer.edit');
            Route::put('update/{id}', [OfferController::class, 'update'])->name('offer.update');
            Route::get('delete/{id}', [OfferController::class, 'destroy'])->name('offer.delete');
        });
        Route::group(['prefix' => 'product'], function () {

            Route::get('/', [ProductController::class, 'index'])->name('product.index');
            Route::get('create', [ProductController::class, 'create'])->name('product.create');
            Route::post('create', [ProductController::class, 'store'])->name('product.store');
            Route::get('edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
            Route::put('update/{id}', [ProductController::class, 'update'])->name('product.update');
            Route::get('delete/{id}', [ProductController::class, 'destroy'])->name('product.delete');
        });
        Route::group(['prefix' => 'payment'], function () {
            // Bu grup içindeki tüm routelar için bir önek ve namespace belirlenir.
            Route::get('/', [PaymentController::class, 'index'])->name('payment.index');
            Route::get('create/{id?}', [PaymentController::class, 'create'])->name('payment.create');
            Route::post('create', [PaymentController::class, 'store'])->name('payment.store');
            Route::get('edit/{id}', [PaymentController::class, 'edit'])->name('payment.edit');
            Route::put('update/{id}', [PaymentController::class, 'update'])->name('payment.update');
            Route::get('delete/{id}', [PaymentController::class, 'destroy'])->name('payment.destroy');
        });
        Route::group(['prefix' => 'user'], function () {
            // Bu grup içindeki tüm routelar için bir önek ve namespace belirlenir.
            Route::get('/', [UserController::class, 'index'])->name('user.index');
            Route::get('create/{id?}', [UserController::class, 'create'])->name('user.create');
            Route::post('create', [UserController::class, 'store'])->name('user.store');
            Route::get('edit/{id}', [UserController::class, 'edit'])->name('user.edit');
            Route::put('update/{id}', [UserController::class, 'update'])->name('user.update');
            Route::get('delete/{id}', [UserController::class, 'destroy'])->name('user.destroy');
        });
        Route::get('financial/get', [FinancialController::class, 'getAllData'])->name('financial.getdata');
        Route::resource('financial', FinancialController::class);

        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
        Route::group(['prefix' => 'invoice'], function () {
            // Bu grup içindeki tüm routelar için bir önek ve namespace belirlenir.
            Route::get('list', [InvoiceController::class, 'list'])->name('invoice.list');
            Route::post('store', [InvoiceController::class, 'store'])->name('invoice.store');
            Route::get('delete/{id?}', [InvoiceController::class, 'destroy'])->name('invoice.destroy');
            Route::get('{type?}', [InvoiceController::class, 'index'])->name('invoice');
            // Route::get('invoice-payment', [InvoiceController::class, 'listWithPaymentType'])->name('invoice.listWithPaymentType');

            Route::get('/invoice/edit/{id}', [InvoiceController::class, 'edit'])->name('invoice.edit');
            Route::put('/invoice/update/{id}', [InvoiceController::class, 'update'])->name('invoice.update');
        });



        Route::middleware('permission')->get('profile-edit', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::middleware('permission')->put('profile-update', [ProfileController::class, 'update'])->name('profile.update');

    });

});




// Route::middleware(['auth'])->group(function () {
//     Route::group(['prefix' => 'bank',], function () {

//         Route::get('/', [BankController::class, 'index'])->name('bank.index');
//         Route::get('create', [BankController::class, 'create'])->name('bank.create');
//         Route::post('create', [BankController::class, 'store'])->name('bank.store');
//         Route::get('edit/{id}', [BankController::class, 'edit'])->name('bank.edit');
//         Route::put('update/{id}', [BankController::class, 'update'])->name('bank.update');
//         Route::get('delete/{id}', [BankController::class, 'destroy'])->name('bank.delete');
//     });
// });
// Route::group(['prefix' => 'product', 'middleware' => 'permission'], function () {

//     Route::get('/', [ProductController::class, 'index'])->name('product.index');
//     Route::get('create', [ProductController::class, 'create'])->name('product.create');
//     Route::post('create', [ProductController::class, 'store'])->name('product.store');
//     Route::get('edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
//     Route::put('update/{id}', [ProductController::class, 'update'])->name('product.update');
//     Route::get('delete/{id}', [ProductController::class, 'destroy'])->name('product.delete');
// });




