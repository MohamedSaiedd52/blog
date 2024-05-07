<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;



Route::resource('/dashboard', DashboardController::class)->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');





    Route::get('/users',[UserController::class,'Showuser'])->name('Showuser');
    Route::get('/users/add',[UserController::class,'Adduser'])->name('Adduser');
    Route::post('/users/store',[UserController::class,'Saveuser'])->name('Saveuser');
    Route::get('/users/edit/{id}',[UserController::class,'Edituser'])->name('Edituser');
    Route::put('/users/edit/{id}',[UserController::class,'SaveEdituser'])->name('SaveEdituser');
    Route::delete('/users/delete/{id}',[UserController::class,'destroy'])->name('Deleteuser');




   Route::resource('categories', CategoryController::class);
   Route::resource('tags', TagController::class);

   Route::resource('posts', PostController::class);




});

Route::get('/',[BlogController::class,'index'])->name('blog');
Route::get('blogs',[BlogController::class,'getBlogs'])->name('Blogs');
Route::get('content',[BlogController::class,'getContent'])->name('content');
Route::get('service',[BlogController::class,'getService'])->name('service');

Route::get('single_blog/{slug}', [BlogController::class, 'single_blog'])->name('single_blog');





Route::post('posts/comment/{PostComment}',[CommentController::class,'postComment'])->name('postComment')->middleware('auth');




Route::post('posts/commentreply/{CommentId}',[CommentController::class,'ReplyComment'])->name('ReplyComment')->middleware('auth');










require __DIR__.'/auth.php';
