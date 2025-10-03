<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
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

Route::middleware('auth')->group(function () {

    //Profile Management
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Post creation and editing
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create'); // show form
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store'); // save new post
    Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit'); // show edit form
    Route::patch('/posts/{post}', [PostController::class, 'update'])->name('posts.update');  // update post
    Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');// delete post

    //users tabel routes
    Route::get('/users', function () {
        return view('users.index');
    })->name('users.index');

});

//Public routes for viewing posts
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');

require __DIR__.'/auth.php';
