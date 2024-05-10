<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PublicCategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;





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

Auth::routes();


    

Route::group(['middleware' => ['auth'],['user']], function() {
    // Route::get('dashboard',function(){
    //     return view('dashboard');

    
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::resource('/roles', RoleController::class);
Route::resource('/users', UserController::class);
Route::get('/books',[ BookController::class,'index'])->name('Book.index');
Route::get('/create book',[ BookController::class,'create'])->name('Book.create');
Route::post('/add-book',[ BookController::class,'store'])->name('Book.store');
Route::get('/add public category',[ PublicCategoryController::class,'create'])->name('PublicCategories.create');
Route::post('/store public category',[ PublicCategoryController::class,'store'])->name('PublicCategories.store');
Route::resource('/publicCategory', PublicCategoryController::class);
Route::resource('/subCategory', SubCategoryController::class);
});    