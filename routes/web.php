<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeDataController;

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

Route::get('/index',[EmployeeDataController::class,'index'])->name('PA-Index');
Route::get('/create',[EmployeeDataController::class,'create'])->name('create');
Route::get('/store',[EmployeeDataController::class,'store'])->name('PA-store');
Route::post('/store',[EmployeeDataController::class,'store'])->name('PA-store');
Route::get('/employee-data/{id}/edit', [EmployeeDataController::class,'edit'])->name('employee-data.edit');
Route::put('/employee-data/{id}', [EmployeeDataController::class,'update'])->name('employee-data.update');
// Route::post('/employee-data/{id}', [EmployeeDataController::class,'destroy'])->name('employee-data.destroy');
Route::get('/employee-data/{id}', [EmployeeDataController::class,'show'])->name('employee-data.show');
Route::delete('employee-data/{id}', [EmployeeDataController::class,'destroy'])->name('employee-data.destroy');




