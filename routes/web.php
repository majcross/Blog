<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminPostsController;
use App\Http\Controllers\AdminUsersController;
use App\Http\Controllers\AdminMediasController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\CommentRepliesController;
use App\Http\Controllers\AdminCategoriesController;

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

Route::get('/post/{id}', [AdminPostsController::class, 'post']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';



Route::get('/admin', function(){
    return view('admin.index');
});

Route::group(['middleware'=>'admin'], function(){

    Route::resource('admin/user', AdminUsersController::class);

    Route::resource('admin/post', AdminPostsController::class);

    Route::resource('admin/categories', AdminCategoriesController::class);

    Route::resource('admin/media', AdminMediasController::class);

    Route::resource('admin/comments', PostCommentsController::class);

    Route::resource('admin/comment/replies', CommentRepliesController::class);

    // Route::get('admin/media', [AdminMediasController::class, 'index'])->name('media.index');

    // Route::get('admin/media/upload',['as'=>'media.upload', 'uses'=> [AdminMediasController::class, 'store']]);

});

