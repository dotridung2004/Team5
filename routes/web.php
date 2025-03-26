<?php

use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\NewsViewController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\ResearchPaperController;
use App\Http\Controllers\DocumentTeacherController;
use App\Http\Controllers\SearchDocument;


Route::get('/', [NewsViewController::class, 'index']);


Route::get('/dashboard', [UserController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    route::get('/editprofile', [ProfileController::class, 'editprofile'])->name('profile.editprofile');
    route::get('/editpassword', [PasswordController::class, 'edit'])->name('password.edit');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('users', UserController::class);
    Route::get('/search', [UserController::class, 'search'])->name('users.search');
    Route::patch('/users/{tentaikhoan}/lock', [UserController::class, 'lock'])->name('users.lock');
    Route::resource('news', NewsController::class);
    Route::get('/searchtt', [NewsController::class, 'search'])->name('news.searchtt');
    Route::patch('/news/{matintuc}/approve', [NewsController::class, 'approve'])->name('news.approve');
    Route::patch('/news/{matintuc}/reject', [NewsController::class, 'reject'])->name('news.reject');

    Route::resource('feedbacks', FeedbackController::class);
    Route::get('/feedbacks/{mathacmac}/reply', [FeedbackController::class, 'storeReply'])->name('feedbacks.storeReply');


    Route::get('/documents/hidden', [DocumentController::class, 'hiddenHistory'])->name('documents.hiddenHistory');
    Route::resource('documents', DocumentController::class)->parameters([
        'documents' => 'matailieu'
    ]);

    Route::patch('/documents/{matailieu}/approve', [DocumentController::class, 'approve'])->name('documents.approve');
    Route::post('/documents/{matailieu}/hide', [DocumentController::class, 'hide'])->name('documents.hide');
    Route::post('/documents/{matailieu}/restore', [DocumentController::class, 'restore'])->name('documents.restore');
    Route::delete('/documents/{matailieu}', [DocumentController::class, 'destroy'])->name('documents.destroy');
});



Route::middleware(['auth', 'teacher'])->group(function () {
    Route::resource('researchpapers', ResearchPaperController::class);
    Route::resource('documentteacher', DocumentTeacherController::class);
});


Route::resource('searchsearchdocument', SearchDocument::class);
Route::get('/document/search/find', [SearchDocument::class, 'search'])->name('searchsearchdocument.search');


Route::post('/newsviews/{id}/comment', [FeedbackController::class, 'store'])->name('newsviews.comment');
Route::get('/newsviews/{id}', [NewsViewController::class, 'show'])->name('newsviews.show');
Route::get('/newsviews', [NewsViewController::class, 'index'])->name('newsviews.index');

require __DIR__ . '/auth.php';
