<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\QuestionReplyController;
use App\Http\Controllers\PostReplyController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


// Question

Route::controller(QuestionController::class)->middleware(['auth'])->group(function(){
    Route::get('/questions', 'index')->name('index');
    Route::get('/questions/create', 'create')->name('create');
    Route::post('/questions', 'store')->name('store');
    Route::get('/questions/{question}', 'show')->name('show');
    Route::get('/questions/{question}/edit', 'edit')->name('edit');
    Route::put('/questions/{question}', 'update')->name('update');
    Route::delete('/questions/{question}', 'delete')->name('delete');
});

// Post
Route::controller(PostController::class)->middleware(['auth'])->group(function(){
    Route::get('/posts', 'index')->name('index');
    Route::get('/posts/create', 'create')->name('create');
    Route::post('/posts', 'store')->name('store');
    Route::get('/posts/{post}', 'show')->name('show');
    Route::get('/posts/{post}/edit', 'edit')->name('edit');
    Route::put('/posts/{post}', 'update')->name('update');
    Route::delete('/posts/{post}', 'delete')->name('delete');    
});

//Reply
Route::post('/posts/reply', [PostReplyController::class, 'reply'])->middleware("auth");

Route::post('/questions/reply', [QuestionReplyController::class, 'reply'])->middleware("auth");


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
