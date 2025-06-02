<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AuthController;

// Use the public-facing NewsController directly
use App\Http\Controllers\NewsController;

// Use an alias for the admin NewsController
use App\Http\Controllers\Admin\NewsController as AdminNewsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Public-facing General Routes
Route::get('/', [HomeController::class, 'index'])->name('home'); // الصفحة الرئيسية
Route::get('/about', [AboutController::class, 'index'])->name('about'); // من نحن
Route::get('/events', [EventsController::class, 'index'])->name('events'); // الأنشطة والبطولات
Route::get('/contact', [ContactController::class, 'index'])->name('contact'); // تواصل معنا

// Authentication Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Public-facing News Routes
// IMPORTANT: Order matters for routes with wildcards!
// 1. Main news index
Route::get('/news', [NewsController::class, 'index'])->name('news');

// 2. Filtered news by type (e.g., /news/article) - MUST come before news.show if types can conflict with slugs
//    The `whereIn` constraint ensures this route only matches specific types.
Route::get('/news/{type}', [NewsController::class, 'showByType'])
    ->name('news.type')
    ->whereIn('type', ['news', 'interview', 'article']); // Ensure these match your defined types

// 3. Single news item by slug (e.g., /news/my-awesome-article)
Route::get('/news/{news:slug}', [NewsController::class, 'show'])->name('news.show');


// Admin Routes - Protected by 'auth' middleware
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    // Admin News Resource Routes (handles index, create, store, show, edit, update, destroy)
    Route::resource('news', AdminNewsController::class);

    // You can add more admin routes here later for other modules (e.g., users, settings)
    // Route::resource('users', AdminUserController::class);
});