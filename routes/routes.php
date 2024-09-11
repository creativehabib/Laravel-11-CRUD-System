<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MediaManager\MediaController;
use App\Http\Controllers\MediaManagerController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


//    Route::resource('category', CategoryController::class);
//    Route::resource('post', PostController::class);
//
//    Route::resource('mediaManager', MediaManagerController::class);
//    Route::post('/getMediaById', [MediaManagerController::class, 'getMediaById'])->name('getMediaById');
//    Route::post('/mediaUpdate', [MediaManagerController::class, 'mediaUpdate'])->name('mediaUpdate');
//    Route::post('/onMediaDelete', [MediaManagerController::class, 'onMediaDelete'])->name('onMediaDelete');
//
//
//
//    Route::get('/media-manager/get-files', [MediaManagerController::class, 'index'])->name('uppy.index');
//    Route::get('/media-manager/get-selected-files', [MediaManagerController::class, 'selectedFiles'])->name('uppy.selectedFiles');
//    Route::post('/media-manager/add-files', [MediaManagerController::class, 'store'])->name('uppy.store');
//    Route::get('/media-manager/delete-files/{id}', [MediaManagerController::class, 'delete'])->name('uppy.delete');
});

require __DIR__.'/auth.php';
