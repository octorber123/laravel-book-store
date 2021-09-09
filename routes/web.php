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

Route::get('/', function () {
    return view('welcome');

}
);

//register routes for CRUD functions
Route::resource('books','BookController');
Route::resource('orders','OrderController');
Route::get('/orders/finished', 'OrderController@orders');
Auth::routes();

Route::get('/home', 'BookController@index')->name('home');
