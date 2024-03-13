<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Home\HomeSliderController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('frontend.index');
});

Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin All Route
Route::get('/admin/logout', [AdminController::class, 'destroy'])
    ->name('admin.logout');
Route::get('/admin/profile', [AdminController::class, 'profile'])
    ->name('admin.profile');
Route::get('/edit/profile', [AdminController::class, 'editProfile'])
    ->name('edit.profile');/**/
Route::post('/store/profile', [AdminController::class, 'storeProfile'])
    ->name('store.profile');
Route::get('/change/password', [AdminController::class, 'changePassword'])
    ->name('change.password');
Route::post('/update/password', [AdminController::class, 'updatePassword'])
    ->name('update.password');

// Home Slide All Route
Route::get('home/slide', [HomeSliderController::class, 'homeSlide'])
    ->name('home.slide');
Route::post('update/slide', [HomeSliderController::class, 'updateSlide'])
    ->name('update.slide');

require __DIR__.'/auth.php';
