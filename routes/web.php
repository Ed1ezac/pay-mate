<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PayableController;
use App\Http\Controllers\OrganizationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group.
|
*/

Route::get('/',  function () {
    return view('welcome');
});

Auth::routes();

//Route::get('/', [HomeController::class, 'welcome']);
Route::get('/home', [HomeController::class, 'index'])->name('home');

///Organizations
Route::get('/organizations', [OrganizationController::class, 'list']);
Route::get('/new/organization', [OrganizationController::class, 'creationForm']);
Route::post('/create/organization', [OrganizationController::class, 'create'])->name('new_org');

//Payables
Route::get('/fees-and-charges', [PayableController::class, 'list']);
Route::get('/organization/{id?}/payables', [PayableController::class, 'forOrganization']);
Route::get('/new/payable', [PayableController::class, 'creationForm'])->name('new_payable');
Route::post('/create/payable', [PayableController::class, 'create'])->name('create_payable');

//Payment
Route::get('/my-payments', [PaymentController::class, 'myPayments']);
Route::get('/pay/for/payable/id/{id?}', [PaymentController::class, 'newPayment'])->name('make_payment');
Route::post('/perform-payment', [PaymentController::class, 'pay'])->name('create_payment');
Route::get('/user/challenge/admin/get-role', [HomeController::class, 'createFirstSuperAdmin'])->middleware(['auth']);
/*Route::group(['prefix' =>'admin', 'middleware' =>'auth'], function () {
});*/