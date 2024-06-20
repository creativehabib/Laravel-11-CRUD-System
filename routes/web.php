<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ImageUloadController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\MediaManagerController;
use App\Http\Controllers\MediaManager\MediaController;

Route::get('dashboard', function() {
    return view('dashboard');
});
Route::get('/', function () {
    return view('welcome');
});


route::resource('category', CategoryController::class);
route::resource('post', PostController::class);


Route::get('/media-manager/get-files', [MediaManagerController::class, 'index'])->name('uppy.index');
Route::get('/media-manager/get-selected-files', [MediaManagerController::class, 'selectedFiles'])->name('uppy.selectedFiles');
Route::post('/media-manager/add-files', [MediaManagerController::class, 'store'])->name('uppy.store');
Route::get('/media-manager/delete-files/{id}', [MediaManagerController::class, 'delete'])->name('uppy.delete');
Route::get('/media-manager', [MediaController::class, 'index'])->name('mediaManager.index');

Route::post('/mediaUpdate', [MediaManagerController::class, 'mediaUpdate'])->name('mediaUpdate');
Route::post('/getMediaById', [MediaManagerController::class, 'getMediaById'])->name('getMediaById');

Route::post('/update-status', [CategoryController::class, 'updateStatus'])->name('updateStatus');


// Route::post('/upload','ImageUploadController@upload');
Route::post('/image-upload',[ImageUloadController::class, 'imageUpload'])->name('image_upload');
