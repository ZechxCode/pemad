<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;

use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Client\ProfileController;
use App\Http\Controllers\Admin\ServiceOffController;
use App\Http\Controllers\admin\ServiceReqController;
use App\Http\Controllers\Client\ServiceOfferController as ClientOffController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Client\ServiceRequestController as ClientReqController;
use App\Http\Controllers\Client\DashboardController as ClientDashboardController;

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


Route::controller(UserController::class)->group(function () {
    Route::get('login', 'login')->name('login');
    Route::post('login', 'storeLogin')->name('login.store');
    Route::get('register', 'register')->name('register');
    Route::post('register', 'storeRegister')->name('register.store');
    Route::post('/logout', 'logout')->name('logout');
});


Route::get('dashboard', [HomeController::class, 'dashboard'])->name('dashboard');

// Admin Dashboard
Route::prefix('admin')->name('admin.')->middleware('ensureUserRole:admin')->group(function () {
    Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    Route::get('client', [ClientController::class, 'index'])->name('client.managament');
    Route::get('client/create', [ClientController::class, 'create'])->name('client.create');
    Route::post('client/store', [ClientController::class, 'store'])->name('client.store');
    Route::get('client/{id}/edit', [ClientController::class, 'edit'])->name('client.edit');
    Route::post('client/{id}', [ClientController::class, 'update'])->name('client.update');
    Route::delete('client/{id}', [ClientController::class, 'destroy'])->name('client.delete');


    Route::get('servicereq', [ServiceReqController::class, 'serviceList'])->name('serviceReq');
    Route::get('servicereq/{id}/edit', [ServiceReqController::class, 'edit'])->name('serviceReq.edit');
    Route::post('servicereq/{id}', [ServiceReqController::class, 'update'])->name('serviceReq.update');
    Route::delete('servicereq/{id}', [ServiceReqController::class, 'destroy'])->name('serviceReq.delete');

    Route::get('serviceoff/create/{id}', [ServiceOffController::class, 'create'])->name('serviceOff.create');
    Route::post('serviceoff/store', [ServiceOffController::class, 'store'])->name('serviceOff.store');

    Route::get('project', [ProjectController::class, 'index'])->name('project');
    Route::get('project/{id}/edit', [ProjectController::class, 'edit'])->name('project.edit');
    Route::post('project/{id}', [ProjectController::class, 'update'])->name('project.update');
    Route::delete('project/{id}', [ProjectController::class, 'destroy'])->name('project.delete');
});

// Client Dashboard
Route::prefix('client')->namespace('client')->name('client.')->middleware('ensureUserRole:client')->group(function () {
    Route::get('dashboard', [ClientDashboardController::class, 'index'])->name('dashboard');
    Route::get('account', [ProfileController::class, 'index'])->name('account');
    Route::get('{id}/edit', [ProfileController::class, 'edit'])->name('edit');
    Route::post('{id}', [ProfileController::class, 'update'])->name('update');

    Route::get('servicereq', [ClientReqController::class, 'create'])->name('serviceReq.create');
    Route::post('servicereq/store', [ClientReqController::class, 'storeReq'])->name('serviceReq.store');
    Route::get('servicereq/{id}/edit', [ClientReqController::class, 'edit'])->name('serviceReq.edit');
    Route::post('servicereq/{id}', [ClientReqController::class, 'update'])->name('serviceReq.update');

    Route::post('serviceoff/{id}', [ClientOffController::class, 'update'])->name('serviceoff.update');
    Route::delete('serviceoff/{id}', [ClientOffController::class, 'destroy'])->name('serviceoff.delete');

    Route::get('project', [ProjectController::class, 'show'])->name('project');


    Route::get('project/invoice', [InvoiceController::class, 'index'])->name('payment');
    Route::get('project/invoice/{id}', [InvoiceController::class, 'create'])->name('project.invoice.create');
    Route::post('project/invoice/store', [InvoiceController::class, 'store'])->name('project.invoice.store');
    Route::post('project/invoice/bill', [InvoiceController::class, 'billStore'])->name('project.invoice.bill');
});
