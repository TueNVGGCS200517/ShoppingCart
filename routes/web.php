<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
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


Route::get('/home', [CartController::class, 'home']);
Route::get('/checkout', [CartController::class, 'Checkout']);
Route::get('/thank', [CartController::class,'Thank']);
Route::get('/AddCart/{Id}', [CartController::class, 'AddCart']);
Route::get('/DeleteItemCart/{Id}', [CartController::class, 'DeleteItemCart']);
Route::get('/Cart', [CartController::class, 'ViewCart']);
Route::get('/Delete-Item-List-Cart/{Id}', [CartController::class, 'DeleteListItemCart']);
Route::get('/Save-Item-List-Cart/{Id}/{quanty}', [CartController::class, 'SaveListItemCart']);

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

