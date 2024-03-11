<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\SubcatController;
use App\Http\Controllers\Admin\CategoryController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

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
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/diposite/money', [App\Http\Controllers\HomeController::class, 'deposite'])->name('diposite.money')->middleware('verified');;

// for mal trap

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
 
    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

// this route for showing varification page 
Route::get('/email/verify', function () {
    return view('auth.verify');
})->middleware('auth')->name('verification.notice');

//this route for resend mail again
Route::post('/resend-mail', [App\Http\Controllers\HomeController::class, 'resend'])->name('verification.resend');
// encript and decript
Route::get('/user/details/{id}', [App\Http\Controllers\HomeController::class, 'userDetail'])->name('user.details');
// hashing password
Route::post('/user/store', [App\Http\Controllers\HomeController::class, 'passHashing'])->name('store.user');
// password Change
Route::get('/password/change', [App\Http\Controllers\HomeController::class, 'passChange'])->name('password.change');
// pass update
Route::post('/password/update', [App\Http\Controllers\HomeController::class, 'passUpdate'])->name('password.update');

//class
// Students Controller
Route::resource('categories', CategoryController::class);
Route::get('/subcategory/index', [SubcatController::class, 'index'])->name('subcategory.index');
Route::get('/subcategory/create', [SubcatController::class, 'create'])->name('subcategory.create');
Route::post('/subcategory/store', [SubcatController::class, 'store'])->name('subcategory.store');
Route::get('/subcategory/delete/{id}', [SubcatController::class, 'destroy'])->name('subcategory.destroy');
Route::get('/subcategory/edit/{id}', [SubcatController::class, 'edit'])->name('subcategory.edit');
Route::post('/subcategory/update/{id}', [SubcatController::class, 'update'])->name('subcategory.update');

// Post Controller

Route::get('/post/index', [PostController::class, 'index'])->name('post.index');
Route::get('/post/create', [PostController::class, 'create'])->name('post.create');
Route::post('/post/store', [PostController::class, 'store'])->name('post.store');
Route::get('/post/delete/{id}', [PostController::class, 'destroy'])->name('post.destroy');
Route::get('/post/edit/{id}', [PostController::class, 'edit'])->name('post.edit');
Route::post('/post/update/{id}', [PostController::class, 'update'])->name('post.update');