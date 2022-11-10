<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AboutController;
use App\Http\Controllers\Backend\BisestaController;
use App\Http\Controllers\Frontend\AboutController as FrontendAboutController;
use App\Http\Controllers\Frontend\IndexController;

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

Route::controller(IndexController::class)->group(function () {
    Route::get('/', 'Index')->name('index');//about.introduction
});

Route::controller(FrontendAboutController::class)->group(function () {
    Route::get('/about-us', 'Introduction')->name('frontend.about.introduction');//frontend.about.teachers
    Route::get('/teachers', 'Teachers')->name('frontend.about.teachers');//frontend.about.teachers
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
    Route::get('/bisesta/delete/{id}', 'BisestaDelete')->name('bisesta.delete'); //about.introduction



});


Route::controller(AboutController::class)->group(function () {

    Route::get('/about/introduction', 'IntroductionView')->name('about.introduction'); //about.introduction
    Route::post('/introduction/update', 'IntroductionUpdate')->name('update.introduction');

    Route::get('/teacher/all', 'TeachersView')->name('teachers.view'); //teachers.add
    Route::get('/teacher/add', 'TeachersAdd')->name('teachers.add'); //teacher.store
    Route::post('/teacher/store', 'TeacherStore')->name('teacher.store'); //teachers.edit
    Route::get('/teacher/edit/{id}', 'TeacherEdit')->name('teachers.edit'); //teacher.update
    Route::post('/teacher/update', 'TeacherUpdate')->name('teacher.update'); //
    Route::get('/teacher/delete/{id}', 'TeacherDelete')->name('teacher.delete'); //


    Route::get('/timeline/all', 'TimelineView')->name('timeline.view'); //timeline.store
    Route::post('/timeline/store', 'TimelineStore')->name('timeline.store'); //timeline.edit
    Route::get('/timeline/edit/{id}', 'TimelineEdit')->name('timeline.edit'); //
    Route::post('/timeline/update', 'TimelineUpdate')->name('timeline.update'); //timeline.edit
    Route::get('/timeline/delete/{id}', 'TimelineDelete')->name('timeline.delete'); //timeline.edit




});

require __DIR__ . '/auth.php';
