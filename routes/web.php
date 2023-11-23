<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Models\Post;
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

require __DIR__ . '/auth.php';


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/{user:username}',[UserController::class , 'index'])->name('user_profile')->middleware('auth');
Route::get('/edit/{user:username}' , [UserController::class , 'edit'])->name('user_edit')->middleware('auth');
Route::put('/update/{user:username}' , [UserController::class , 'update'])->name('user_update')->middleware('auth');
Route::controller(PostController::class)->middleware('auth')->group(function () {
    Route::get('/',  'index')->name('home');
    Route::get('/p/create', 'create')->name('create_post');
    Route::post('/p/create', 'store')->name('store_post');
    Route::get('/p/{post}', 'show')->name('show_post');
    Route::get('/p/edit/{post}', 'edit')->name('edit_post');
    Route::patch('/p/update/{post}', 'update')->name('update_post');
    Route::delete('/p/delete/{post}', 'destroy')->name('delete_post');

});
Route::get('/explore/show' , [PostController::class , 'explore'])->name('explore');

Route::post('/p/{post}/comment', [CommentController::class, 'store'])->name('store_comment')->middleware('auth');
Route::get('/like/{post}' , LikeController::class)->middleware('auth');

