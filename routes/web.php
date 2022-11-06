<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\BisestaController;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');


//Admin all routes here
Route::controller(AdminController::class)->group(function () {
    Route::get('/admin/logout', 'AdminLogout')->name('admin.logout');
    Route::get('/admin/profile', 'AdminProfile')->name('admin.profile');
    Route::get('/edit/profile', 'EditProfile')->name('edit.profile');
    Route::post('/store/profile', 'StoreProfile')->name('store.profile');
    Route::get('/change/password', 'ChangePassword')->name('change.password');
    Route::post('/update/password', 'UpdatePassword')->name('update.password');
    Route::get('/home/slide', 'HomeSlide')->name('home.slide');
    Route::get('/about', 'About')->name('about.page'); //dipendra.bisesta
});

Route::controller(BisestaController::class)->group(function () {
    Route::get('/dipendra/bisesta', 'BisestaView')->name('dipendra.bisesta'); //bisesta.store
    Route::post('/dipendra/bisesta', 'BisestaStore')->name('bisesta.store'); //
    Route::get('/bisesta/edit/{id}', 'BisestaEdit')->name('bisesta.edit'); //
    Route::post('/bisesta/update', 'BisestaUpdate')->name('bisesta.update'); //bisesta.delete
    Route::get('/bisesta/delete/{id}', 'BisestaDelete')->name('bisesta.delete'); //



});

require __DIR__ . '/auth.php';
