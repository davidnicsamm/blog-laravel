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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::redirect('/','blog');
Auth::routes();
Route::get('blog','App\Http\Controllers\Web\PageController@blog')->name('blog');
Route::get('blog/{slug}','App\Http\Controllers\Web\PageController@post')->name('post');
