<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ImageUploadController;

Route::get('/', [ BlogController::class, 'home' ])->name('home');
//---------------------------------main page-------------------------------------------------------//

Route::get('/auth/login', [ AuthController::class, 'login' ])->name('login');
Route::get('/auth/signup', [ AuthController::class, 'signup' ])->name('signup');
Route::get('/auth/logout', [ AuthController::class, 'logout' ])->name('logout');


Route::post('/auth/login', [ AuthController::class, 'login_post' ])->name('login_post');
Route::post('/auth/signup', [ AuthController::class, 'signup_post' ])->name('signup_post');

Route::post('upload-image', 'ImageUploadController@store')->name('upload-image');

Route::post('/comment', [ CommentController::class, 'comment' ])->name('comment');
Route::post('/contact', [ ContactController::class, 'contact' ])->name('contact');


//---------------------------------blog page-------------------------------------------------------//

Route::middleware('auth')->group(function(){
    Route::get('/blog/create', [ BlogController::class, 'create_blog' ])->name('create_blog');
    Route::post('/blog/create', [ BlogController::class, 'create_blog_post' ])->name('create_blog_post');
    Route::get('blog/{id}/edit',[BlogController::class,'edit_blog'])->name('edit_blog');
    Route::put('blog/{id}/edit',[BlogController::class,'edit_blog_post'])->name('edit_blog_post');
    Route::delete('blog/{id}/delete',[BlogController::class,'delete_blog_post'])->name('delete_blog_post');
    Route::get('dashboard',[BlogController::class,'dashboard'])->name('dashboard');
    Route::get('/blogs',[BlogController::class,'all_blog'])->name('all_blog');
});
Route::get('/blog/{id}', [ BlogController::class, 'blog' ])->name('blog');
Route::get('categories/{id}',[CategoryController::class,'blog_with_category'])->name('blog_with_category');
Route::get('/latest_blogs', [ BlogController::class, 'latest_blogs' ])->name('latest_blogs');
Route::get('/contact', [ BlogController::class, 'contact' ])->name('contact');
Route::get('/about', [ BlogController::class, 'about' ])->name('about');

//---------------------------------category page---------------------------------------------------//
Route::middleware('auth')->group(function(){
Route::get('category/create',[CategoryController::class,'create_category'])->name('create_category');
Route::post('category/create',[CategoryController::class,'store_category'])->name('store_category');
Route::get('categories',[CategoryController::class,'all_category'])->name('all_category');
Route::get('category/{id}/edit',[CategoryController::class,'edit_category'])->name('edit_category');
Route::put('category/{id}/edit',[CategoryController::class,'update_category'])->name('update_category');
Route::delete('category/{id}/delete',[CategoryController::class,'delete_category'])->name('delete_category');
});

