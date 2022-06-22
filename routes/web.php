<?php

use App\Http\Controllers\HomeController;
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

Route::get('/{data?}',[HomeController::class,'index'])->name('home');
Route::get('/create',[HomeController::class,'create'])->name('home.create');
Route::post('/store',[HomeController::class,'store'])->name('home.store');
Route::get('/edit/{id?}',[HomeController::class,'edit'])->name('home.edit');
Route::put('/{id?}',[HomeController::class,'update'])->name('home.update');
Route::delete('/delte/{id?}',[HomeController::class,'destroy'])->name('home.destroy');


Route::get('/user{data?}', [UserController::class, 'index'])->name('user.index');
Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
Route::post('/user/store', [UserController::class, 'store'])->name('user.store');
Route::get('/user/edit/{id?}', [UserController::class, 'edit'])->name('user.edit');
Route::put('/user/{id?}', [UserController::class, 'update'])->name('user.update');
Route::delete('/user/{id?}', [UserController::class, 'destroy'])->name('user.destroy');


