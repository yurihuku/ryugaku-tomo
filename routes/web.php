<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\QuestionReplyController;
use App\Http\Controllers\PostReplyController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\SupportController;
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
Route::get('/', [QuestionController::class, 'index'])->middleware("auth")->name('questions.index');


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');


// Question

Route::controller(QuestionController::class)->middleware(['auth'])->group(function(){
    // Route::get('/questions', 'index')->name('questions.index');
    Route::get('/questions/create', 'create')->name('questions.create');
    Route::post('/questions', 'store')->name('questions.store');
    Route::get('/questions/{question}', 'show')->name('questions.show');
    Route::get('/questions/{question}/edit', 'edit')->name('questions.edit');
    Route::put('/questions/{question}', 'update')->name('questions.update');
    Route::delete('/questions/{question}', 'delete')->name('questions.delete');
});

// Post
Route::controller(PostController::class)->middleware(['auth'])->group(function(){
    Route::get('/posts', 'index')->name('posts.index');
    Route::get('/posts/create', 'create')->name('posts.create');
    Route::post('/posts', 'store')->name('posts.store');
    Route::get('/posts/{post}', 'show')->name('posts.show');
    Route::get('/posts/{post}/edit', 'edit')->name('posts.edit');
    Route::put('/posts/{post}', 'update')->name('posts.update');
    Route::delete('/posts/{post}', 'delete')->name('posts.delete');    
});

//Reply
Route::post('/posts/reply', [PostReplyController::class, 'reply'])->middleware("auth");

Route::post('/questions/reply', [QuestionReplyController::class, 'reply'])->middleware("auth");

// Reactions
Route::post('/posts/{post}/like', [LikeController::class, 'likePost'])->middleware("auth");

Route::post('/posts/{post}/support', [SupportController::class, 'SupportPost'])->middleware("auth");


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
