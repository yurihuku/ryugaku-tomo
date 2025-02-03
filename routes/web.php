<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuestionController;

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