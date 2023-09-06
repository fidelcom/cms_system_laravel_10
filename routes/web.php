<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Home\AboutController;
use App\Http\Controllers\Home\HomeSliderController;
use App\Http\Controllers\HomeController;
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

Route::controller(HomeController::class)->group(function (){
    Route::get('about', 'homeAbout')->name('home.about');
});

Route::get('/dashboard', function () {
    return view('admin/index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::controller(AdminController::class)->group(function (){
    Route::get('/admin/logout', 'destroy')->name('admin.logout');
    Route::get('/admin/profile', 'profile')->name('admin.profile');
    Route::get('/admin/edit/profile', 'editProfile')->name('edit.profile');
    Route::post('/admin/store/profile', 'storeProfile')->name('store.profile');
    Route::get('/admin/change/password', 'changePassword')->name('change.password');
    Route::post('/admin/update/password', 'updatePassword')->name('update.password');

});

//Home Slide
Route::controller(HomeSliderController::class)->prefix('/admin')->group(function (){
    Route::get('home/slide', 'homeSlider')->name('home.slide');
    Route::post('update/slide', 'updateSlider')->name('update.slider');
});

//About Slide
Route::controller(AboutController::class)->prefix('/admin')->group(function (){
    Route::get('about/page', 'aboutPage')->name('about.page');
    Route::get('about/multi/image', 'aboutMultiImage')->name('about.multi.image');
    Route::post('update/about', 'updateAbout')->name('update.about');
    Route::post('store/multi/image', 'storeMultiImage')->name('store.multi.image');
    Route::get('all/multi/image', 'allMultiImage')->name('all.multi.image');
    Route::get('edit/multi/image/{id}', 'editMultiImage')->name('edit.multi.image');
    Route::post('update/multi/image/{id}', 'updateMultiImage')->name('update.multi.image');
    Route::get('delete/multi/image/{id}', 'deleteMultiImage')->name('delete.multi.image');
});



require __DIR__.'/auth.php';
