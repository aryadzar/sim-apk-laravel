<?php

use App\Http\Controllers\AdminController;
use App\Http\Middleware\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

Route::get('/', function () {
    return view('welcome');
})->name('login');


Route::group(['middleware' => ['auth', 'CheckRole:admin']], function(){
    Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin_dashboard');

    Route::get('/admin/data-users', [AdminController::class, 'read'])->name('data_users');

    Route::post('admin/data-users/tambah-user',[AdminController::class, 'tambah_user'] )->name('tambah_user');

    Route::post('admin/data-users/delete-user/{id}',[AdminController::class, 'delete_user'] )->name('delete_user');

});





Route::post('/login', [LoginController::class, 'login']);

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

