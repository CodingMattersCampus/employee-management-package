<?php

/*
|--------------------------------------------------------------------------
| Office Routes
|--------------------------------------------------------------------------
|
| Here is where you can register office routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Route;

$domain = \config('app.domain');
Route::group(['domain' => "office.".$domain], function() {

    Route::group(['middleware' => "auth:office"], function() {
        Route::group(['prefix' => 'settings'], function(){
            Route::group(['prefix' => 'employees', "namespace" => "CodingMatters\EmployeeManagement\Http\Controllers"], function(){
        		Route::get('/', "ListingController@index")->name('office.employee.listing');
        		Route::post('/', "ListingController@create")->name('office.employee.create');
        	});
        });
    });
});
