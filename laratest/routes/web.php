<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\UserController;
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

Route::get('/abc.com', [ProductController::class, 'index'])->middleware('sess');
Route::get('/show_product/{id}', [ProductController::class, 'show_product']);




Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'verify']);
Route::get('/logout', [LogoutController::class, 'index']);


route::get('/registration', [RegistrationController::class, 'index']);
route::post('/registration', [RegistrationController::class, 'store_user']);

route::get('/contact_us', [UserController::class, 'contact_us']);
route::get('/profile/{username}', [UserController::class, 'index']);

route::get('/edit_profile/{username}', [UserController::class, 'profile']);
route::post('/edit_profile/{username}', [UserController::class, 'update_info']);

route::get('/premium_membership', [UserController::class, 'premium_membership']);
route::get('/confirm_premium_membership', [UserController::class, 'confirm_premium_membership']);

route::get('/add_product', [ProductController::class, 'add_product']);
route::post('/add_product', [ProductController::class, 'added_product']);





Route::post('/order_now', [ProductController::class, 'order_now']);
Route::post('/add_to_cart', [ProductController::class, 'add_to_cart']);
Route::get('/show_cart', [ProductController::class, 'show_cart']);

Route::get('/order_from_cart/{date}', [ProductController::class, 'order_from_cart']);
Route::get('/cart_delete/{id}', [ProductController::class, 'cart_delete']);

Route::get('/order_history', [ProductController::class, 'order_history']);


Route::post('/wish', [ProductController::class, 'wish']);
Route::get('/show_wish', [ProductController::class, 'show_wish']);

Route::post('/search_product', [ProductController::class, 'search_product']);


Route::get('/report_seller/{id}', [UserController::class, 'report_seller']);
Route::post('/report_seller/{id}', [UserController::class, 'report_seller_submit']);


Route::get('/ask_question/{id}', [ProductController::class, 'ask_question']);
Route::post('/ask_question/{id}', [ProductController::class, 'ask_question_submit']);


Route::get('/review/{id}', [ProductController::class, 'review']);
Route::post('/review/{id}', [ProductController::class, 'review_submit']);




Route::get('/best_selling_product', [ProductController::class, 'best_selling_product']); /////////////



Route::get('/low_to_high_price', [ProductController::class, 'low_to_high_price']);
Route::get('/high_to_low_price', [ProductController::class, 'high_to_low_price']);


