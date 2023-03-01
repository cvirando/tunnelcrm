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

Route::get('/users', [App\Http\Controllers\UsersController::class, 'index'])->name('usersIndex');
Route::post('/users-store', [App\Http\Controllers\UsersController::class, 'store'])->name('usersStore');
Route::delete('/users-delete/{id}', [App\Http\Controllers\UsersController::class, 'destroy'])->name('usersDestroy');
Route::get('/profile', [App\Http\Controllers\UsersController::class, 'profile'])->name('profile');
Route::put('/update-profile/{id}', [App\Http\Controllers\UsersController::class, 'update'])->name('updateProfile');

Route::group(['prefix' => 'performance'], function () {
    Route::get('/', [App\Http\Controllers\PerformanceController::class, 'index'])->name('performance');
    Route::post('/clearCaches', [App\Http\Controllers\PerformanceController::class, 'clearCaches'])->name('clearCaches');
    Route::post('/debugMode', [App\Http\Controllers\PerformanceController::class, 'debugMode'])->name('debugMode');
    Route::post('/SendTestMAil', [App\Http\Controllers\PerformanceController::class, 'SendTestMAil'])->name('SendTestMAil');
    Route::post('/MaintenanceMode', [App\Http\Controllers\PerformanceController::class, 'MaintenanceMode'])->name('MaintenanceMode');
});
