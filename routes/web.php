<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\MediaManager\MediaController;
use App\Http\Controllers\MediaManagerController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FrontendController::class,'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    //Category CRUD
    Route::resource('categories', CategoryController::class);

    // Post CRUD
    Route::resource('posts', PostController::class);

    Route::resource('/permissions', PermissionController::class);
    Route::resource('users', UserController::class);

    Route::resource('/roles', RoleController::class);
    Route::post('/roles/{role}/permissions', [RoleController::class,'givePermissions'])->name('roles.permissions');
    Route::delete('/roles/{role}/permissions/{permission}', [RoleController::class,'revokePermissions'])->name('roles.permissions.revoke');




    // Image Manager
    Route::post('image_upload', [\App\Http\Controllers\ImageUploadController::class,'imageUpload'])->name('image_upload');

    Route::resource('mediaManager', MediaController::class);
    Route::post('/getMediaById', [MediaManagerController::class, 'getMediaById'])->name('getMediaById');
    Route::post('/mediaUpdate', [MediaManagerController::class, 'mediaUpdate'])->name('mediaUpdate');
    Route::post('/onMediaDelete', [MediaManagerController::class, 'onMediaDelete'])->name('onMediaDelete');



    Route::get('/media-manager/get-files', [MediaManagerController::class, 'index'])->name('uppy.index');
    Route::get('/media-manager/get-selected-files', [MediaManagerController::class, 'selectedFiles'])->name('uppy.selectedFiles');
    Route::post('/media-manager/add-files', [MediaManagerController::class, 'store'])->name('uppy.store');
    Route::get('/media-manager/delete-files/{id}', [MediaManagerController::class, 'delete'])->name('uppy.delete');
});

require __DIR__.'/auth.php';
