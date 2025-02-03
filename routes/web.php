<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\PostController;

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

Route::get('/', [QuestionController::class, 'index']);

Route::get('/questions/create', [QuestionController::class, 'create']);

Route::post('/questions',[QuestionController::class, 'store']);

Route::get('/questions/{question}', [QuestionController::class, 'show']);

Route::get('/questions/{question}/edit', [QuestionController::class, 'edit']);

Route::put('/questions/{question}', [QuestionController::class, 'update']);

Route::delete('/questions/{question}', [QuestionController::class, 'delete']);

// ここから悩みコーナー
Route::get('/posts', [PostController::class, 'index']);

Route::get('/posts/create', [PostController::class, 'create']);

Route::post('/posts', [PostController::class, 'store']);

Route::get('/posts/{post}', [PostController::class, 'show']);

Route::get('/posts/{post}/edit', [PostController::class, 'edit']);

Route::put('/posts/{post}', [PostController::class, 'update']);

Route::delete('/posts/{post}', [PostController::class, 'delete']);