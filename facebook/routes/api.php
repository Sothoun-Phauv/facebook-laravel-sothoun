<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route User
Route::get('/users',[UserController::class,'index']);
Route::post('/users',[UserController::class,'store']);
Route::get('/users/{id}',[UserController::class,'show']);
Route::put('/users/{id}',[UserController::class,'update']);
Route::delete('/users/{id}',[UserController::class,'destroy']);

// Route Profile

Route::get('profiles',[ProfileController::class,'index']);
Route::post('profiles',[ProfileController::class,'store']);
Route::get('profiles/{id}',[ProfileController::class,'show']);
Route::put('profiles/{id}',[ProfileController::class,'update']);
Route::delete('profiles/{id}',[ProfileController::class,'destroy']);

// Route Roles

Route::get('roles',[RolesController::class,'index']);
Route::post('roles',[RolesController::class,'store']);
Route::get('roles/{id}',[RolesController::class,'show']);
Route::put('roles/{id}',[RolesController::class,'update']);
Route::delete('roles/{id}',[RolesController::class,'destroy']);

/**
 * Rout Post
 * Get, Put, Post, Delete Method
 */

Route::get('posts',[PostController::class,'index']);
Route::post('posts',[PostController::class,'store']);
Route::get('posts/{id}',[PostController::class,'show']);
Route::put('posts/{id}',[PostController::class,'update']);
Route::delete('posts/{id}',[PostController::class,'destroy']);

// Route Comment
Route::get('comments',[CommentController::class,'index']);
Route::post('comments',[CommentController::class,'store']);
Route::get('comments/{id}',[CommentController::class,'show']);
Route::put('comments/{id}',[CommentController::class,'update']);
Route::delete('comments/{id}',[CommentController::class,'destroy']);