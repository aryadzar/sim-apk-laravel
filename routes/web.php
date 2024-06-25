<?php

use App\Http\Middleware\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;

Route::get('/', function () {
    return view('welcome');
})->name('login');


Route::group(['middleware' => ['auth', 'CheckRole:admin']], function(){
    Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin_dashboard');

    Route::get('/admin/data-users', [AdminController::class, 'read'])->name('data_users');

    Route::post('admin/data-users/tambah-user',[AdminController::class, 'tambah_user'] )->name('tambah_user');

    Route::delete('admin/data-users/delete-user/{id}',[AdminController::class, 'delete_user'] )->name('delete_user');

    Route::get('admin/data-users/user-details/{id}', [AdminController::class, 'user_details'] )->name('user_details');

    Route::post('admin/data-users/edit-details-user/{id}', [AdminController::class, 'edit_details_user'] )->name('edit_details_user');

    Route::post('admin/data-users/user-details/update-img/{id}', [AdminController::class, 'updateProfile'])->name('update_profile');

    Route::delete('admin/data-users/user-details/delete-img/{id}', [AdminController::class, 'removeProfileImage'])->name('remove_profile_image');
});





Route::post('/login', [LoginController::class, 'login']);

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

