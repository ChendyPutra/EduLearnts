<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminManageController;
use App\Http\Middleware\IsSuperAdmin;

Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])->middleware('guest:admin');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->middleware('guest:admin');

Route::middleware(['auth:admin', IsSuperAdmin::class])->group(function () {
    Route::get('/admins', [AdminManageController::class, 'index'])->name('admin.index');
    Route::get('/admins/create', [AdminManageController::class, 'create'])->name('admin.create');
    Route::post('/admins', [AdminManageController::class, 'store'])->name('admin.store');
    Route::get('/admins/{admin}/edit', [AdminManageController::class, 'edit'])->name('admin.edit');
    Route::put('/admins/{admin}', [AdminManageController::class, 'update'])->name('admin.update');
    Route::delete('/admins/{admin}', [AdminManageController::class, 'destroy'])->name('admin.destroy');
});