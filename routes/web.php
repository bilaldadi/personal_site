<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Home\HomeSliderController;
use App\Http\Controllers\Home\portfolioController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('frontend.index');
});

// Admin all routes

Route::controller(AdminController::class)->group(function (){
    Route::get('/admin/logout','destroy')->name('admin.logout');
    Route::get('/admin/profile','profile')->name('admin.profile');
    Route::get('/edit/profile','EditProfile')->name('edit.profile');
    Route::post('/store/profile','StoreProfile')->name('store.profile');
    Route::get('/change/password','ChangePassword')->name('change.password');
    Route::post('/update/password','UpdatePassword')->name('update.password');

});// end Admin all routes


// Home all routes

Route::controller(HomeSliderController::class)->group(function (){
    Route::get('/home/slide','HomeSlider')->name('home.slide');
    Route::post('/update/slider','UpdateSlider')->name('update.slider');


});// end Home all routes

// portfolio all routes

Route::controller(portfolioController::class)->group(function (){
    Route::get('/all/portfolio','AllPortfolio')->name('all.portfolio');
    Route::get('/add/portfolio','AddPortfolio')->name('add.portfolio');
    Route::post('/store/portfolio','StorePortfolio')->name('store.portfolio');
    Route::get('/edit/portfolio/{id}','EditPortfolio')->name('edit.portfolio');
    Route::get('/delete/portfolio/{id}','DeletePortfolio')->name('delete.portfolio');
    Route::post('/update/portfolio','UpdatePortfolio')->name('update.portfolio');




});// end Home all routes

Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth','verified'])->name('dashboard');

require __DIR__.'/auth.php';
