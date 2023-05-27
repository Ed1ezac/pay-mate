<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
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

Auth::routes();

Route::get('/', [HomeController::class, 'welcome']);
Route::get('/home', [HomeController::class, 'index'])->name('home');

///Organizations
Route::get('/organizations', [OrganizationController::class, 'list']);
Route::get('/new/organization', [OrganizationController::class, 'creationForm']);
Route::post('/create/organization', [OrganizationController::class, 'create'])->name('new_org');

//Payables
Route::get('/organization/{id?}/payables', [PayableController::class, 'forOrganization']);
Route::get('/new/payable/', [PayableController::class, 'creationForm'])->name('new_payable');
Route::post('/create/payable', [PayableController::class, 'create'])->name('create_payable');
