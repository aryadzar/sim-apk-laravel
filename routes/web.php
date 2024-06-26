<?php

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Middleware\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;

Route::get('/', function () {
    return view('welcome');
})->name('login');


Route::group(['middleware' => ['auth', 'CheckRole:admin']], function(){
    //Dashboard Admin
    Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin_dashboard');

    //Mengelola User
    Route::get('/admin/data-users', [AdminController::class, 'read'])->name('data_users');
    Route::post('admin/data-users/tambah-user',[AdminController::class, 'tambah_user'] )->name('tambah_user');
    Route::delete('admin/data-users/delete-user/{id}',[AdminController::class, 'delete_user'] )->name('delete_user');
    Route::get('admin/data-users/user-details/{id}', [AdminController::class, 'user_details'] )->name('user_details');
    Route::post('admin/data-users/edit-details-user/{id}', [AdminController::class, 'edit_details_user'] )->name('edit_details_user');
    Route::post('admin/data-users/user-details/update-img/{id}', [AdminController::class, 'updateProfile'])->name('update_profile');
    Route::delete('admin/data-users/user-details/delete-img/{id}', [AdminController::class, 'removeProfileImage'])->name('remove_profile_image');
    Route::post('admin/data-users/user-details/change-password', [AdminController::class, 'change_password_user'])->name('change_password_user');

    //mengelola Pesawat
    Route::get('/admin/data-pesawat', [AdminController::class, 'read_pesawat'])->name('data_pesawat');
    Route::get('/admin/data-pesawat/detail-pesawat/{id}', [AdminController::class, 'detail_pesawat'])->name('detail_pesawat');
    Route::delete('/admin/data-pesawat/delete-pesawat/{id}', [AdminController::class, 'delete_pesawat'])->name('delete_pesawat');
    Route::post('/admin/data-pesawat/tambah-pesawat', [AdminController::class, 'tambah_pesawat'])->name('tambah_pesawat');
    Route::get('/get-tipe-pesawat-options', [AdminController::class, 'getTipePesawatOptions'])->name('get_tipe_pesawat_options');
    Route::get('/get-jenis-body-pesawat-options', [AdminController::class, 'getJenisBodyPesawatOptions'])->name('get_jenis_body_pesawat_options');
    Route::post('admin/data-users/detail-pesawat/update-img/{id}', [AdminController::class, 'update_foto_pesawat'])->name('update_foto_pesawat');
    Route::delete('admin/data-users/user-details/delete-img/{id}', [AdminController::class, 'delete_foto_pesawat'])->name('delete_foto_pesawat');

});

Route::group(['middleware' => ['auth', 'CheckRole:admin,teknisi,manager']], function(){

    Route::get('/user/user-details/{id}', function($id){
        $target_user = User::find($id);
        $current_user = Auth::user();

        if (!$target_user) {
            return redirect()->route('profile_user', $current_user->id)->with('error', 'User tidak ditemukan.');
        }

        // Periksa apakah pengguna yang masuk adalah pengguna yang diminta atau admin
        if ($current_user->id !== $target_user->id) {
            return redirect()->route('profile_user', $current_user->id)->with('error', 'Anda tidak diizinkan untuk melihat profil ini.');
        }

        return view('user-details', compact('target_user'));
    } )->name('profile_user');

    Route::post('/user/user-details/change-profile/{id}', function (Request $request, $id){
            // Temukan pengguna berdasarkan ID
            $data = User::find($id);

            // Validasi input dengan pengecualian ID pengguna yang sedang diedit
            $request->validate([
                'name' => 'required|string|max:255'
            ]);


            // Update data pengguna
            $data->update($request->only( 'name'));

            // Redirect ke halaman detail pengguna
            return redirect()->route('profile_user', $id)->with('success', 'User details updated successfully.');
    })->name('change_profile');

    Route::delete('admin/data-users/user-details/delete-img/{id}', [AdminController::class, 'removeProfileImage'])->name('remove_profile_image');
    Route::post('admin/data-users/user-details/update-img/{id}', [AdminController::class, 'updateProfile'])->name('update_profile');

});



Route::post('/login', [LoginController::class, 'login']);

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

