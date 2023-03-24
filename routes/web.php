<?php

use App\Http\Controllers\CommentsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
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



Route::group(["middleware" => ["auth"]], function () {
    /** ----------------------------------- start posts route------------------------------------ */
    Route::get('/', [PostController::class, "index"])->name("posts.index");
    Route::get('/posts', [PostController::class, "index"])->name("posts.index");
    Route::get('/posts/create', [PostController::class, "create"])->name("posts.create");
    Route::post('/posts', [PostController::class, "store"])->name("posts.store");
    Route::get('/posts/{post}', [PostController::class, "show"])->name("posts.show");
    Route::get('/posts/{post}/edit', [PostController::class, "edit"])->name("posts.edit");
    Route::put('/posts/{post}', [PostController::class, "update"])->name("posts.update");
    Route::put('/posts/{post}/restore', [PostController::class, "restore"])->name("posts.restore");
    Route::delete('/posts/{post}', [PostController::class, "destroy"])->name("posts.destroy");
    Route::get('api/posts/{post}', [PostController::class, "toResponse"])->name("posts.toResponse");
    /** ----------------------------------- end posts route------------------------------------ */

    /** ----------------------------------- start comments route------------------------------------ */

    Route::post('/comments/{post}', [CommentsController::class, "store"])->name("comments.store");
    Route::put('/comments/{comment}', [CommentsController::class, "update"])->name("comments.update");
    Route::delete('/comments/{comment}', [CommentsController::class, "destroy"])->name("comments.destroy");
    /** ----------------------------------- end comments route------------------------------------ */

    /** ----------------------------------- start comments route------------------------------------ */
    Route::get('/users/{user}', [UserController::class, "edit"])->name("users.edit");
    Route::put('/users/{user}', [UserController::class, "update"])->name("users.update");


    /** ----------------------------------- end comments route------------------------------------ */
});










Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
