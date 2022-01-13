<?php

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

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('controls', [App\Http\Controllers\ControlPanelController::class, 'index'])->name('controls.index');

Route::get('addToCart/{menu}', [App\Http\Controllers\MenuController::class, 'addToCart'])->name('cart.add');
Route::get('shopping-cart', [App\Http\Controllers\MenuController::class, 'showCart'])->name('cart.show');
Route::delete('remove-cart/{menu}', [App\Http\Controllers\MenuController::class, 'removeToCart'])->name('cart.remove');
Route::put('update-cart/{menu}', [App\Http\Controllers\MenuController::class, 'updateToCart'])->name('cart.update');


//Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles','App\Http\Controllers\RoleController');
    Route::resource('users','App\Http\Controllers\UserController');
//});


Route::resource('menu','App\Http\Controllers\MenuController');
Route::resource('categories','App\Http\Controllers\CategoryController');
Route::resource('offers','App\Http\Controllers\OfferController');
Route::resource('opinions','App\Http\Controllers\OpinionController');
Route::resource('abouts','App\Http\Controllers\AboutController');
Route::resource('contacts','App\Http\Controllers\ContactController');


