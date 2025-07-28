<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminManageController;
use App\Http\Controllers\Admin\CourseController as AdminCourseController;
use App\Http\Controllers\Admin\ModuleController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\QuizController;
use App\Http\Middleware\IsSuperAdmin;

/*
|--------------------------------------------------------------------------
| HALAMAN PUBLIK
|--------------------------------------------------------------------------
*/
Route::get('/', fn () => view('home'))->name('home');
Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
Route::get('/shop', [ShopController::class, 'index'])->name('shop.index');
Route::get('/about', [AboutController::class, 'index'])->name('about.index');

/*
|--------------------------------------------------------------------------
| DASHBOARD & PROFIL SISWA
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/courses/{course}', [CourseController::class, 'show'])->name('courses.show');
});

/*
|--------------------------------------------------------------------------
| ADMIN LOGIN (GET & POST)
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->middleware('guest:admin')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
});

/*
|--------------------------------------------------------------------------
| ADMIN PANEL (Setelah Login)
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->middleware('auth:admin')->group(function () {
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
    Route::get('/dashboard', [AdminAuthController::class, 'dashboard'])->name('admin.dashboard');

    // === COURSES ===
    Route::get('/courses', [AdminCourseController::class, 'index'])->name('admin.courses.index');
    Route::get('/courses/create', [AdminCourseController::class, 'create'])->name('admin.courses.create');
    Route::post('/courses', [AdminCourseController::class, 'store'])->name('admin.courses.store');
    Route::get('/courses/{course}', [AdminCourseController::class, 'show'])->name('admin.courses.show');
    Route::get('/courses/{course}/edit', [AdminCourseController::class, 'edit'])->name('admin.courses.edit');
    Route::put('/courses/{course}', [AdminCourseController::class, 'update'])->name('admin.courses.update');
    Route::delete('/courses/{course}', [AdminCourseController::class, 'destroy'])->name('admin.courses.destroy');

    // === MODULES (per Course) ===
    Route::get('/courses/{course}/modules', [ModuleController::class, 'index'])->name('admin.modules.index');
    Route::get('/courses/{course}/modules/create', [ModuleController::class, 'create'])->name('admin.modules.create');
    Route::post('/courses/{course}/modules', [ModuleController::class, 'store'])->name('admin.modules.store');
    Route::get('/courses/{course}/modules/{module}', [ModuleController::class, 'show'])->name('admin.modules.show');
    Route::get('/courses/{course}/modules/{module}/edit', [ModuleController::class, 'edit'])->name('admin.modules.edit');
    Route::put('/courses/{course}/modules/{module}', [ModuleController::class, 'update'])->name('admin.modules.update');
    Route::delete('/courses/{course}/modules/{module}', [ModuleController::class, 'destroy'])->name('admin.modules.destroy');

    // === PRODUCTS (KIT) ===
    Route::get('/products', [ProductController::class, 'index'])->name('admin.products.index');
    Route::get('/products/create', [ProductController::class, 'create'])->name('admin.products.create');
    Route::post('/products', [ProductController::class, 'store'])->name('admin.products.store');
    Route::get('/products/{product}', [ProductController::class, 'show'])->name('admin.products.show');
    Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('admin.products.edit');
    Route::put('/products/{product}', [ProductController::class, 'update'])->name('admin.products.update');
    Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('admin.products.destroy');

    // === QUIZZES ===
    Route::get('/quizzes', [QuizController::class, 'index'])->name('admin.quizzes.index');
    Route::get('/quizzes/create', [QuizController::class, 'create'])->name('admin.quizzes.create');
    Route::post('/quizzes', [QuizController::class, 'store'])->name('admin.quizzes.store');
    Route::get('/quizzes/{quiz}/edit', [QuizController::class, 'edit'])->name('admin.quizzes.edit');
    Route::put('/quizzes/{quiz}', [QuizController::class, 'update'])->name('admin.quizzes.update');
    Route::delete('/quizzes/{quiz}', [QuizController::class, 'destroy'])->name('admin.quizzes.destroy');
});

/*
|--------------------------------------------------------------------------
| SUPERADMIN - CRUD ADMIN
|--------------------------------------------------------------------------
*/
Route::middleware(['auth:admin', IsSuperAdmin::class])->group(function () {
    Route::get('/admins', [AdminManageController::class, 'index'])->name('admin.index');
    Route::get('/admins/create', [AdminManageController::class, 'create'])->name('admin.create');
    Route::post('/admins', [AdminManageController::class, 'store'])->name('admin.store');
    Route::get('/admins/{admin}/edit', [AdminManageController::class, 'edit'])->name('admin.edit');
    Route::put('/admins/{admin}', [AdminManageController::class, 'update'])->name('admin.update');
    Route::delete('/admins/{admin}', [AdminManageController::class, 'destroy'])->name('admin.destroy');
});

/*
|--------------------------------------------------------------------------
| AUTH BAWAAN BREEZE (Siswa Register/Login)
|--------------------------------------------------------------------------
*/
require __DIR__.'/auth.php';
