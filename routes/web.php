<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FeedbackController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\Admin\AdminController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/feedback/create', [FeedbackController::class, 'create'])->name('feedback.create');
Route::get('/feedback', [FeedbackController::class, 'index'])->name('feedback.index');
Route::post('/feedback', [FeedbackController::class, 'store'])->name('feedback.store');

Route::get('feedback/{feedback}/comments', [CommentController::class, 'showComments'])->name('feedback.showComments');
Route::post('feedback/{feedback}/comments', [CommentController::class, 'storeComment'])->name('comments.store');

// Admin routes
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/users', [AdminController::class, 'users'])->name('admin.users');
    Route::delete('/user/{id}', [AdminController::class, 'deleteUser'])->name('admin.deleteUser');

    Route::get('/feedback', [AdminController::class, 'feedbackItems'])->name('admin.feedbackItems');
    Route::delete('/feedback/{id}', [AdminController::class, 'deleteFeedbackItem'])->name('admin.deleteFeedbackItem');

    Route::post('/feedback/{id}/toggle-comment-status', [FeedbackController::class, 'toggleCommentStatus'])->name('feedback.toggleCommentStatus');

});
Route::middleware(['auth'])->get('/users/search/{query}', [CommentController::class, 'searchUsers'])->name('users.search');

Route::post('/feedback/{id}/vote', [FeedbackController::class, 'vote'])->name('feedback.vote')->middleware('auth');
