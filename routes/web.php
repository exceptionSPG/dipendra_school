<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AboutController;
use App\Http\Controllers\Backend\BisestaController;
use App\Http\Controllers\Backend\BlogsController;
use App\Http\Controllers\Backend\CommitteeController;
use App\Http\Controllers\Backend\EventsController;
use App\Http\Controllers\Frontend\AboutController as FrontendAboutController;
use App\Http\Controllers\Frontend\FrBlogController;
use App\Http\Controllers\Frontend\FrCommitteeController;
use App\Http\Controllers\Frontend\FrEventController;
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
    Route::get('/', 'Index')->name('index'); //about.introduction
});

Route::controller(FrontendAboutController::class)->group(function () {
    Route::get('/about-us', 'Introduction')->name('frontend.about.introduction'); //frontend.about.teachers
    Route::get('/teachers', 'Teachers')->name('frontend.about.teachers'); //
    Route::get('/teacher/details/{id}', 'TeacherDetails')->name('teacher-details'); //frontend.about.timelines

    Route::get('/our/journey', 'Timelines')->name('frontend.about.timelines'); //frontend.about.timelines
});

Route::controller(FrCommitteeController::class)->group(function () {
    Route::get('/bibyasa', 'BiByaSaShow')->name('bibyasa'); //
    Route::get('/siawsa', 'SiAwSaShow')->name('siawsa'); //
    Route::get('/bhupu-bidhyarthi', 'BhupuBidhyarthiShow')->name('bhupu_bidhyarthi'); //

});


Route::controller(FrEventController::class)->group(function () {
    Route::get('/events', 'Events')->name('events'); //event.single
    Route::get('/event/details/{id}', 'EventDetails')->name('event.single'); //news

});

Route::controller(FrBlogController::class)->group(function () {
    Route::get('/news', 'Blogs')->name('news'); //event.single
    Route::get('/news/details/{id}', 'BlogDetails')->name('news.single'); //news

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

//

Route::controller(CommitteeController::class)->group(function () {

    Route::get('/committee/all', 'CommitteeView')->name('committee.all'); //committee.add
    Route::get('/committee/edit/{id}', 'CommitteeEdit')->name('committee.edit'); //committee.update
    Route::post('/committee/update', 'CommitteeUpdate')->name('committee.update'); //

    Route::get('/bibyasa/view', 'BibyasaView')->name('bibyasa.all'); //bibyasa.add
    Route::get('/bibyasa/add', 'BibyasaAdd')->name('bibyasa.add'); //bibyasa.store
    Route::post('/bibyasa/store', 'BibyasaStore')->name('bibyasa.store'); //bibyasa.edit
    Route::get('/bibyasa/edit/{id}', 'BibyasaEdit')->name('bibyasa.edit'); //bibyasa.edit
    Route::post('/bibyasa/update', 'BibyasaUpdate')->name('bibyasa.update'); //
    Route::get('/bibyasa/delete/{id}', 'BibyasaDelete')->name('bibyasa.delete'); //siawsa.all

    Route::get('/siawsa/view', 'siawsaView')->name('siawsa.all'); //siawsa.add
    Route::get('/siawsa/add', 'SiawsaAdd')->name('siawsa.add'); //siawsa.store
    Route::post('/siawsa/store', 'SiawsaStore')->name('siawsa.store'); //siawsa.edit
    Route::get('/siawsa/edit/{id}', 'SiawsaEdit')->name('siawsa.edit'); //siawsa.edit
    Route::post('/siawsa/update', 'SiawsaUpdate')->name('siawsa.update'); //
    Route::get('/siawsa/delete/{id}', 'SiawsaDelete')->name('siawsa.delete'); //bhupu_bidhyarthi




    Route::get('/bhupu/view', 'BhupuBidhyarthiView')->name('bhupu_bidhyarthi.all'); //bhupu_bidhyarthi.all
    Route::get('/bhupu/add', 'BhupuBidhyarthiAdd')->name('bhupu_bidhyarthi.add'); //bhupu_bidhyarthi.store
    Route::post('/bhupu/store', 'BhupuBidhyarthiStore')->name('bhupu_bidhyarthi.store'); //bhupu_bidhyarthi.edit
    Route::get('/bhupu/edit/{id}', 'BhupuBidhyarthiEdit')->name('bhupu_bidhyarthi.edit'); //bhupu_bidhyarthi.edit
    Route::post('/bhupu/update', 'BhupuBidhyarthiUpdate')->name('bhupu_bidhyarthi.update'); //
    Route::get('/bhupu/delete/{id}', 'BhupuBidhyarthiDelete')->name('bhupu_bidhyarthi.delete'); //events.all


});


Route::controller(EventsController::class)->group(function () {
    Route::get('/events/all', 'EventsAll')->name('events.all');
    Route::get('/events/add', 'EventsAdd')->name('events.add');
    Route::post('/events/store', 'EventsStore')->name('events.store'); //events.edit
    Route::get('/events/edit/{id}', 'EventsEdit')->name('events.edit'); //
    Route::post('/events/update', 'EventsUpdate')->name('events.update'); //
    Route::get('/events/delete/{id}', 'EventsDelete')->name('events.delete'); //blogs.all

    Route::get('/expired/events/all', 'ExpiredEventsAll')->name('expired.events.all');
});

Route::controller(BlogsController::class)->group(function () {
    Route::get('/blogs/all', 'BlogsAll')->name('blogs.all');
    Route::get('/blogs/add', 'BlogsAdd')->name('blogs.add');
    Route::post('/blogs/store', 'BlogStore')->name('blogs.store'); //
    Route::get('/blog/edit/{id}', 'BlogEdit')->name('blogs.edit'); //
    Route::post('/blogs/update', 'BlogUpdate')->name('blogs.update'); //
    Route::get('/blogs/delete/{id}', 'BlogsDelete')->name('blogs.delete'); //


});


require __DIR__ . '/auth.php';
