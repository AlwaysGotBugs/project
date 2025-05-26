<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ContactController;
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

Route::get('/', [HomeController::class, 'index'])->name('home'); // الصفحة الرئيسية
Route::get('/about', [AboutController::class, 'index'])->name('about'); // من نحن
Route::get('/events', [EventsController::class, 'index'])->name('events'); // الأنشطة والبطولات
Route::get('/news', [NewsController::class, 'index'])->name('news'); // الأخبار والتحديثات
Route::get('/contact', [ContactController::class, 'index'])->name('contact'); // تواصل معنا
