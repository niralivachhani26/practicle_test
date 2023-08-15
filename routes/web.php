<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ClientController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

/***** employee */
Route::get('/',[EmployeeController::class,'index'])->name('home');
Route::get('/create_employee',[EmployeeController::class,'create'])->name('create_employee');
Route::POST('/store_employee',[EmployeeController::class,'store'])->name('store_employee');
Route::get('/edit_employee/{id}',[EmployeeController::class,'edit'])->name('edit_employee');
Route::post('/update_employee/{id}',[EmployeeController::class,'update'])->name('update_employee');
Route::DELETE('/delete_employee/{id}',[EmployeeController::class,'destroy'])->name('delete_employee');
Route::POST('/changestatus',[EmployeeController::class,'changestatus'])->name('changestatus');

/***** clients */
Route::get('/clienthome',[ClientController::class,'index'])->name('clienthome');
Route::get('/create_clients',[ClientController::class,'create'])->name('create_clients');
Route::POST('/store_clients',[ClientController::class,'store'])->name('store_clients');
Route::get('/edit_client/{id}',[ClientController::class,'edit'])->name('edit_client');
Route::get('/getcity/{id}',[ClientController::class,'getcity'])->name('getcity');
Route::POST('/update_client/{id}',[ClientController::class,'update'])->name('update_client');
Route::DELETE('/delete_client/{id}',[ClientController::class,'destroy'])->name('delete_client');
