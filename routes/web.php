<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Studentcontroller;

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
    return view('student');
});

Route::get('/', "App\Http\Controllers\Studentcontroller@index");

// just corrected edit route, was initially mistaken as a POST route
Route::get('/edit/{id}', "App\Http\Controllers\Studentcontroller@edit");

Route::get('/show/{id}', "App\Http\Controllers\Studentcontroller@show");
Route::get('/create', "App\Http\Controllers\Studentcontroller@create");
Route::post('/store', "App\Http\Controllers\Studentcontroller@store");
Route::post('/update/{id}',"App\Http\Controllers\Studentcontroller@update");

// including laravel 8 & 9 style delete route
Route::post('/delete/{id}', [Studentcontroller::class, 'destroy']);

// Route::get('/', [App\Http\Controllers\Studentcontroller::class, 'index'])->name('home');

// Route::get('/',[Studentcontroller::class,'index']);
// Route::get('/edit/{id}',[Studentcontroller::class ,'edit']);
// Route::get('/show/{id}',[Studentcontroller::class ,'show']);
// Route::get('/create',[Studentcontroller::class ,'create']);
// Route::get('/store',[Studentcontroller::class ,'store']);
// Route::get('/update/{id}',[Studentcontroller::class,'update']);

 
