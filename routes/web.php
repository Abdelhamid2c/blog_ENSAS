<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\posts\PostsController;


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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('home', [App\Http\Controllers\posts\PostsController::class, 'index'])->name('welcome');
Route::get('/', [App\Http\Controllers\posts\PostsController::class, 'index']);

Route::get('posts/index', [App\Http\Controllers\posts\PostsController::class, 'index'])->name('home');

Route::get('/contact', [App\Http\Controllers\posts\PostsController::class, 'contact'])->name('contact');
Route::get('/about', [App\Http\Controllers\posts\PostsController::class, 'about'])->name('about');


Route::get('/posts/single/{id}', [App\Http\Controllers\posts\PostsController::class, 'single'])->name('posts.single');
Route::post('/posts/comment-store', [App\Http\Controllers\posts\PostsController::class, 'storeComment'])->name('comment.store');
Route::get('/posts/create-post', [App\Http\Controllers\posts\PostsController::class, 'CreatePost'])->name('posts.create');
Route::post('/posts/post-store', [App\Http\Controllers\posts\PostsController::class, 'storePost'])->name('posts.store');
Route::get('/posts/post-delete/{id}', [App\Http\Controllers\posts\PostsController::class, 'deletePost'])->name('posts.delete');
Route::get('/posts/post-edit/{id}', [App\Http\Controllers\posts\PostsController::class, 'editPost'])->name('posts.edit');
Route::post('/posts/post-update/{id}', [App\Http\Controllers\posts\PostsController::class, 'updatePost'])->name('posts.update');
Route::any('posts/search', [App\Http\Controllers\posts\PostsController::class, 'Search'])->name('posts.search');


Route::get('categories/category/{category}', [App\Http\Controllers\categories\CategoriesController::class, 'category'])->name('category.update');



    Route::post('users/update/{id}', [App\Http\Controllers\Users\UsersController::class, 'updateprofile'])->name('users.update');
    Route::get('users/edit/{id}', [App\Http\Controllers\Users\UsersController::class, 'editProfile'])->name('users.edit');
    Route::get('users/profile/{id}', [App\Http\Controllers\Users\UsersController::class, 'Profile'])->name('users.profile');
  

