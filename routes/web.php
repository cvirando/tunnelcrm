<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [App\Http\Controllers\HomeController::class, 'main'])->name('main');
Route::get('/license', [App\Http\Controllers\HomeController::class, 'license'])->name('license');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/modules', [App\Http\Controllers\HomeController::class, 'modules'])->name('modules');
Route::get('/disable-module/{name}', [App\Http\Controllers\HomeController::class, 'disableModule'])->name('disableModule');
Route::get('/enable-module/{name}', [App\Http\Controllers\HomeController::class, 'enableModule'])->name('enableModule');
