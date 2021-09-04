<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'company'],function (){
    Route::get('company',[App\Http\Controllers\CompanyController::class, 'index'])->name('company.index');
    Route::get('create',[App\Http\Controllers\CompanyController::class, 'create'])->name('company.create');
    Route::post('create',[App\Http\Controllers\CompanyController::class, 'store'])->name('company.store');
    Route::get('edit/{id}',[App\Http\Controllers\CompanyController::class, 'edit'])->name('company.edit');
    Route::post('update/{id}',[App\Http\Controllers\CompanyController::class, 'update'])->name('company.update');
    Route::get('delete/{id}',[App\Http\Controllers\CompanyController::class, 'destroy'])->name('company.destroy');

});

Route::group(['prefix' => 'employees'],function (){
    Route::get('employee',[App\Http\Controllers\EmployeController::class, 'index'])->name('employee.index');
    Route::get('create/Employee',[App\Http\Controllers\EmployeController::class, 'create'])->name('employee.create');
    Route::post('create/Employee',[App\Http\Controllers\EmployeController::class, 'store'])->name('employee.store');
    Route::get('edit/employee/{id}',[App\Http\Controllers\EmployeController::class, 'edit'])->name('employee.edit');
    Route::post('update/employee/{id}',[App\Http\Controllers\EmployeController::class, 'update'])->name('employee.update');
    Route::get('delete/employee/{id}',[App\Http\Controllers\EmployeController::class, 'destroy'])->name('employee.destroy');

});


//Auth::routes();
Auth::routes(['register' => false]);//this code close of register

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
