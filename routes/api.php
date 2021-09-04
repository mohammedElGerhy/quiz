<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*route companies*/
Route::post('get-companies', 'App\Http\Controllers\Api\CompanyController@index');
Route::post('create-companies', 'App\Http\Controllers\Api\CompanyController@store');
Route::post('update-companies', 'App\Http\Controllers\Api\CompanyController@update');
Route::post('delete-companies', 'App\Http\Controllers\Api\CompanyController@deleteCompany');

/*route employ*/
Route::post('get-employees', 'App\Http\Controllers\Api\EmployeeController@index');
Route::post('create-employees', 'App\Http\Controllers\Api\EmployeeController@store');
Route::post('update-employees', 'App\Http\Controllers\Api\EmployeeController@update');
Route::post('delete-employees', 'App\Http\Controllers\Api\EmployeeController@deleteEmployee');
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/
//all routes / api here must be api authenticated
/*
//Route::group(['middleware' => ['api', 'checkPassword', 'changeLanguage'],], function (){
    Route::post('get-main-categories', 'App\Http\Controllers\Api\CategoriesController@index');
    Route::post('get-category-byId', 'App\Http\Controllers\Api\CategoriesController@getCategoryById');
    Route::post('change-category-status', 'App\Http\Controllers\Api\CategoriesController@changeStatus');
    Route::group(['prefix' => 'admin'],function (){
        Route::post('login', 'App\Http\Controllers\Api\Admin\AuthController@login');
        Route::post('logout','App\Http\Controllers\Api\Admin\AuthController@logout') -> middleware(['auth.guard:admin-api']);
        //invalidate token security side

        //broken access controller user enumeration
    });

    Route::group(['prefix' => 'user'],function (){
        Route::post('login','App\Http\Controllers\Api\User\AuthController@Login') ;
    });


    Route::group(['prefix' => 'user' ,'middleware' => 'auth.guard:user-api'],function (){
        Route::post('profile',function(){
           // return  'test ';
            return \Auth::user(); // return authenticated user data
        });
});

//});
*/
