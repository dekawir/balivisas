<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CarouselController;
use App\Http\Controllers\TeamController;

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

Route::get('/',[HomeController::class,'index'] )->name('home');

// Auth::routes();
Route::get('/login', [LoginController::class, 'index'])->name('form.login');
Route::post('/login-process', [LoginController::class, 'login'])->name('login');



//============================================= User ==========================================
Route::prefix('user')->middleware(['auth','is_admin:user'])->group(function(){
    Route::get('/dashboard',[UserController::class,'index'])->name('dashboard.0');
    Route::get('/articles', [ArticleController::class, 'articles'])->name('article.0');
    Route::get('/update-article/id={id}', [ArticleController::class, 'updateForm'])->name('edit.article.0');
    Route::post('/update-article', [ArticleController::class, 'update'])->name('update.article');
    Route::get('/carosel', [CarouselController::class, 'index'])->name('carousel.0');
    Route::post('/add-carousel', [CarouselController::class, 'add'])->name('add.carousel');
    Route::get('/update-carousel/id={id}', [CarouselController::class, 'updateForm'])->name('edit.carousel.0');
    Route::get('/delete-carousel/id={id}', [CarouselController::class, 'delete']);
    Route::get('/team', [TeamController::class, 'index'])->name('team.0');
    Route::get('/update-team/id={id}', [TeamController::class, 'updateForm'])->name('edit.team.0');
    Route::post('/update-team', [TeamController::class, 'team'])->name('update.team');
    Route::get('/delete-team/id={id}', [TeamController::class, 'delete']);
    Route::get('/update-profile', [AdminController::class, 'updateProfile'])->name('update.profile.0');

});

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');


Route::prefix('admin')->middleware(['auth','is_admin:admin'])->group(function(){
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard.1');
    Route::post('/user-add', [AdminController::class, 'insert'])->name('insert');
    Route::get('/user', [AdminController::class, 'user'])->name('user');
    Route::get('/edit/id={id}', [AdminController::class, 'updateForm'])->name('edit');
    Route::post('/user-update', [AdminController::class, 'update'])->name('update');
    Route::get('/delete/id={id}', [AdminController::class, 'delete']);
    Route::post('/user-add', [AdminController::class, 'add'])->name('add');
    Route::get('/articles', [ArticleController::class, 'articles'])->name('article.1');
    Route::post('/add-article', [ArticleController::class, 'addArticle'])->name('add.article');
    Route::get('/delete-article/id={id}', [ArticleController::class, 'delete']);
    Route::get('/update-article/id={id}', [ArticleController::class, 'updateForm'])->name('edit.article.1');
    Route::post('/update-article', [ArticleController::class, 'update'])->name('update.article');
    Route::get('/carosel', [CarouselController::class, 'index'])->name('carousel.1');
    Route::post('/add-carousel', [CarouselController::class, 'add'])->name('add.carousel');
    Route::get('/update-carousel/id={id}', [CarouselController::class, 'updateForm'])->name('edit.carousel.1');
    Route::post('/update-carousel', [CarouselController::class, 'update'])->name('update.carousel');
    Route::get('/delete-carousel/id={id}', [CarouselController::class, 'delete']);
    Route::get('/team', [TeamController::class, 'index'])->name('team.1');
    Route::post('/add-team', [TeamController::class, 'add'])->name('add.team');
    Route::get('/update-team/id={id}', [TeamController::class, 'updateForm'])->name('edit.team.1');
    Route::post('/update-team', [TeamController::class, 'update'])->name('update.team');
    Route::get('/delete-team/id={id}', [TeamController::class, 'delete']);
    Route::get('/update-profile', [AdminController::class, 'updateProfile'])->name('update.profile.1');


    
    

});
