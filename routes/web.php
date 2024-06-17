<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::resource('posts', PostController::class);
Route::get('post/{slug}', [PostController::class, 'show_by_slug']);

Route::resource('comments', CommentController::class);

Route::resource('categories', CategoryController::class);
Route::get('category/{slug}', [CategoryController::class, 'show_by_slug']);

Route::resource('users', UserController::class);

Route::resource('posts', PostController::class)->middleware(['auth']);
Route::resource('comments', CommentController::class)->middleware(['auth']);


