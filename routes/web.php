<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;



Route::resource('/dashboard', DashboardController::class)->middleware(['auth', 'verified']);


Route::group(['middleware' => ['auth', 'permission:post-index|role-list']], function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');



    Route::get('/users',[UserController::class,'Showuser'])->name('Showuser');


    Route::middleware('can:user-create')->group(function () {
        Route::get('/users/add',[UserController::class,'Adduser'])->name('Adduser');
        Route::post('/users/store',[UserController::class,'Saveuser'])->name('Saveuser');
    });

    Route::get('/users/edit/{id}',[UserController::class,'Edituser'])->name('Edituser');
    Route::put('/users/edit/{id}',[UserController::class,'SaveEdituser'])->name('SaveEdituser');
    Route::delete('/users/delete/{id}',[UserController::class,'destroy'])->name('Deleteuser');



    Route::resource('categories', CategoryController::class);

    Route::middleware('can:category-create')->group(function () {
        Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
        Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
    });




    Route::resource('tags', TagController::class);


  Route::middleware('can:tag-create')->group(function () {
        Route::get('/tags/create', [TagController::class, 'create'])->name('tags.create');
        Route::post('/tags', [TagController::class, 'store'])->name('tags.store');
    });



    Route::resource('roles', RoleController::class);

    Route::middleware('can:role-create')->group(function () {
        Route::get('/roles/create', [RoleController::class, 'create'])->name('roles.create');
        Route::post('/roles', [RoleController::class, 'store'])->name('roles.store');
    });

    Route::resource('posts', PostController::class);

    Route::middleware('can:post-create')->group(function () {
        Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
        Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    });
});




Route::get('/',[BlogController::class,'index'])->name('blog');
Route::get('blogs',[BlogController::class,'getBlogs'])->name('Blogs');
Route::get('content',[BlogController::class,'getContent'])->name('content');
Route::get('service',[BlogController::class,'getService'])->name('service');

Route::get('single_blog/{slug}', [BlogController::class, 'single_blog'])->name('single_blog');





Route::get('getPosts/comment',[CommentController::class,'index'])->name('comments.index')->middleware('auth');

Route::post('posts/comment/{PostComment}',[CommentController::class,'postComment'])->name('postComment')->middleware('auth');

Route::delete('comments/{id}', [CommentController::class,'Delnot'])->name('comments.delete')->middleware('auth');


Route::post('posts/commentreply/{CommentId}',[CommentController::class,'ReplyComment'])->name('ReplyComment')->middleware('auth');










require __DIR__.'/auth.php';
