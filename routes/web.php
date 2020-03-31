<?php

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
    return view('index');
});

Route::group(
        ['namespace' => 'Admin', 'prefix' => 'admin', 'as' => 'admin.'], function () {
       Route::get('admin-event/message/{id}', 'EventController@submitMesaage');
        Route::get('admin-event/notes/{id}', 'EventController@submitNote');
        Route::get('admin-event/get-event/{id}', 'EventController@getEvent');
        Route::resource('admin-event', 'EventController')->except('show');
        
        Route::get('teachers-onboarding', function () {
            return view('admin/teachers/onboarding');
        })->name('teachers-onboarding');
        Route::get('teacher-dashboard', function () {
            return view('admin/teachers/dashboard');
        })->name('teacher-dashboard');
        Route::get('enter-time-off', function () {
            return view('admin/teachers/enter-time-off');
        })->name('enter-time-off');
        Route::get('module-certificate', function () {
            return view('admin/teachers/module-certificate');
        })->name('module-certificate');
		
		// Update Event Route
        Route::post('/store', ['as' => 'events.store',
            'uses' => 'ManageEventsController@store']);

        // Update Event Route
        Route::post('/eventUpdate/{id}',
            ['as' => 'events.updatestore',
            'uses' => 'ManageEventsController@update']);

        // Delete Event Route
        Route::post('/eventDelete/{id}',['as' => 'events.delete',
            'uses' => 'ManageEventsController@delete']);

        // Event Route For Module By Subject Id
        Route::post('eventModulesList', ['as' => 'events.getmoduleslist',
            'uses' => 'ManageEventsController@getModuleBySubjectId']);

        // Event routes
        Route::get('events/{week?}/{weekno?}',
            ['uses' => 'ManageEventsController@index'])->name('events.index');
        Route::resource('events', 'ManageEventsController');

        Route::get('move-student', function () {
            return view('admin/event_quick_view/move-student');
        })->name('move-student');

        Route::get('student-dashboard', function () {
            return view('students/dashboard');
        })->name('student-dashboard');
    });

Route::get('teachers', 'Admin\TeachersController@index');
Route::get('login/{provider}', 'Auth\SocialLoginController@redirectToProvider');
Route::get('login/{provider}/callback',
    'Auth\SocialLoginController@handleProviderCallback');
Route::get('logout', 'Auth\SocialLoginController@logout');