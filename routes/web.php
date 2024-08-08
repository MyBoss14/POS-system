<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// admin logout
Route::get('/admin/logout',[AdminController::class,'AdminDestroy'])->name('admin.logout');
Route::get('/logout',[AdminController::class,'AdminLogoutPage'])->name('admin.logout.page');

//////// admin route /////////
Route::middleware(['auth'])->group(function(){
// admin profile
Route::get('/admin/profile',[AdminController::class,'AdminProfile'])->name('admin.profile');

// profile update
Route::post('/admin/profile/store',[AdminController::class,'AdminProfileStore'])->name('admin.profile.store');

// change password
Route::get('/change/password',[AdminController::class,'AdminChangePassword'])->name('change.password');
Route::post('/update/password',[AdminController::class,'AdminUpdatePassword'])->name('update.password');

});


