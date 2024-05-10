<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\VisitorController;
use App\Http\Controllers\Api\FavoriteController;
use App\Http\Controllers\Api\EvaluationController;
use App\Http\Controllers\PublicCategoryController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
// Route::get('/', function () {
//     return view('welcome');
// });
Route::post('/auth/register',[UserController::class,'createUser']);

Route::get('/books',[VisitorController::class,'index'])->name('books');
Route::get('/Book/{id}',[VisitorController::class,'show']);
Route::post('/filter',[VisitorController::class,'filter'])->name('filter');

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::group(['middleware' => ['auth'],['apiM']], function() {
    Route::post('/favorite/{id}',[FavoriteController::class,'store'])->name('favorite');
    Route::post('evaluation/{id}',[EvaluationController::class,'store']);
    Route::post('/auth/login', [UserController ::class, 'loginUser']);




});
// Route::post('/favorite',[FavoriteController::class,'store'])->name('favorite');


