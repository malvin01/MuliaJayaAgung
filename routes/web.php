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

//sub group shop
Route::group([
    'prefix' => 'shops',
    'as' => 'shops.',
], function(){
        Route::get('/', [App\Http\Controllers\Shop\HomeController::class,'index'])->name('shop.index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['middleware' => 'auth'], function() {
    Route::group([
        'prefix' => 'admin',
        'middleware' => 'role:admin',
        'as' => 'admin.',
    ], function(){

        Route::get('/dashboard', [
            App\Http\Controllers\Admin\DashboardController::class,
            'index'
        ])->name('dashboard.index');

        Route::get('/categories/check-slug', [
            App\Http\Controllers\Admin\CategoryController::class,
            'checkSlug'
        ])->name('categories.checkSlug');

        Route::resource(
            'categories',
            'App\Http\Controllers\Admin\CategoryController',
            ['except' => ['show']]
        );

        Route::resource(
            'discounts',
            'App\Http\Controllers\Admin\DiscountController',
            ['except' => ['show']]
        );

        Route::resource(
            'products',
            'App\Http\Controllers\Admin\ProductController',
            ['except' => ['show']]
        );
    });
});
