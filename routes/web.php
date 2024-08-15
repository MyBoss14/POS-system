<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Backend\SalaryController;
use App\Http\Controllers\Backend\CustomerController;
use App\Http\Controllers\Backend\EmployeeController;
use App\Http\Controllers\Backend\SupplierController;

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

//------------- admin middleware ------------------
Route::middleware(['auth'])->group(function(){
// admin profile
Route::get('/admin/profile',[AdminController::class,'AdminProfile'])->name('admin.profile');

// profile update
Route::post('/admin/profile/store',[AdminController::class,'AdminProfileStore'])->name('admin.profile.store');

// change password
Route::get('/change/password',[AdminController::class,'AdminChangePassword'])->name('change.password');
Route::post('/update/password',[AdminController::class,'AdminUpdatePassword'])->name('update.password');

// Employee
Route::controller(EmployeeController::class)->group(function(){
    Route::get('/all/employee','AllEmployee')->name('all.employee');
    Route::get('/add/employee','AddEmployee')->name('add.employee');
    Route::post('/store/employee','StoreEmployee')->name('employee.store');
    Route::get('/edit/employee/{id}','EditEmployee')->name('edit.employee');
    Route::post('/update/employee','UpdateEmployee')->name('update.employee');
    Route::get('/delete/employee/{id}','DeleteEmployee')->name('delete.employee');

});

// Cusomter
Route::controller(CustomerController::class)->group(function(){
    Route::get('/all/customer','AllCustomer')->name('all.customer');
    Route::get('/add/customer','AddCustomer')->name('add.customer');
    Route::post('/store/customer','StoreCustomer')->name('customer.store');
    Route::get('/edit/customer/{id}','EditCustomer')->name('edit.customer');
    Route::post('/update/customer','UpdateCustomer')->name('update.customer');
    Route::get('/delete/customer/{id}','DeleteCustomer')->name('delete.customer');

});

// Supplier
Route::controller(SupplierController::class)->group(function(){
    Route::get('/all/supplier','AllSupplier')->name('all.supplier');
    Route::get('/add/supplier','AddSupplier')->name('add.supplier');
    Route::post('/store/supplier','StoreSupplier')->name('supplier.store');
    Route::get('/edit/supplier/{id}','EditSupplier')->name('edit.supplier');
    Route::post('/update/supplier','UpdateSupplier')->name('update.supplier');
    Route::get('/delete/supplier/{id}','DeleteSupplier')->name('delete.supplier');
    Route::get('/details/supplier/{id}','DetailsSupplier')->name('details.supplier');

});

// Advance Salary
Route::controller(SalaryController::class)->group(function(){
    Route::get('/all/advance/salary','AllAdvanceSalary')->name('all.advance.salary');
    Route::get('/add/advance/salary','AddAdvanceSalary')->name('add.advance.salary');
    Route::post('/store/advance/salary','StoreAdvanceSalary')->name('advance.salary.store');
    Route::get('/edit/advance/salary/{id}','EditAdvanceSalary')->name('edit.advance.salary');
    Route::post('/update/advance/salary','UpdateAdvanceSalary')->name('update.advance.salary');
    Route::get('/delete/advance/salary/{id}','DeleteAdvanceSalary')->name('delete.advance.salary');
    Route::get('/details/advance/salary/{id}','DetailsAdvanceSalary')->name('details.advance.salary');

});

});
//------------- end  admin middleware ------------------

