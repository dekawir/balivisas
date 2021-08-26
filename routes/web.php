<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
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
    return view('home');
});

// Auth::routes();
Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'index'])->name('form.login');
Route::post('/login-process', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');



//============================================= Admin==========================================
Route::prefix('user')->middleware(['auth'])->group(function(){
    Route::get('/home',[App\Http\Controllers\HomeController::class,'index'])->name('home');

});

Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');


Route::prefix('admin')->middleware(['auth'])->group(function(){
    Route::get('/dashboard', [App\Http\Controllers\AdminController::class, 'index'])->name('dashboard');
    Route::get('/user', [App\Http\Controllers\AdminController::class, 'user'])->name('user');
    Route::get('/edit/id={id}', [App\Http\Controllers\AdminController::class, 'edit'])->name('edit');


});
