<?php

use App\Http\Controllers\API\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|-------------------------------------------------------------------------N-
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('post', PostController::class);

//Route::prefix('/post')->name('post')->controller(\App\Http\Controllers\API\PostController::class)->group(function() {
//    Route::get('/', 'index');
//    Route::get('/{post}', 'show')->where([
//        'post' => '[0-9]+',
//    ]);
//    Route::get('/new', 'create');
//    Route::post('/new', 'store');
//    Route::get('/edit/{id}', 'edit');
//    Route::post('/update/{id}', 'update');
//    Route::delete('/delete/{id}', 'delete');
//});
