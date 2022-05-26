<?php

use Illuminate\Support\Facades\Route;

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

Route::prefix('projects')->group(function() {
    Route::get('', 'App\Http\Controllers\ProjectController@index')->name('project.index');
    Route::get('create', 'App\Http\Controllers\ProjectController@create')->name('project.create');
    Route::post('store', 'App\Http\Controllers\ProjectController@store')->name('project.store');
    Route::get('edit/{project}', 'App\Http\Controllers\ProjectController@edit')->name('project.edit');
    Route::post('update/{project}', 'App\Http\Controllers\ProjectController@update')->name('project.update');
    Route::post('destroy/{project}', 'App\Http\Controllers\ProjectController@destroy' )->name('project.destroy');
    Route::get('show/{project}', 'App\Http\Controllers\ProjectController@show')->name('project.show');

    // Route::get('search', 'App\Http\Controllers\AuthorController@search')->name('author.search');

});

Route::prefix('groups')->group(function() {
    Route::get('', 'App\Http\Controllers\GroupController@index')->name('group.index');
    Route::get('create', 'App\Http\Controllers\GroupController@create')->name('group.create');
    Route::post('store', 'App\Http\Controllers\GroupController@store')->name('group.store');
    Route::get('edit/{group}', 'App\Http\Controllers\GroupController@edit')->name('group.edit');
    Route::post('update/{group}', 'App\Http\Controllers\GroupController@update')->name('group.update');
    Route::post('destroy/{group}', 'App\Http\Controllers\GroupController@destroy' )->name('group.destroy');
    Route::get('show/{group}', 'App\Http\Controllers\GroupController@show')->name('group.show');
});

Route::prefix('students')->group(function() {
    Route::get('', 'App\Http\Controllers\StudentController@index')->name('student.index');
    Route::get('create', 'App\Http\Controllers\StudentController@create')->name('student.create');
    Route::post('store', 'App\Http\Controllers\StudentController@store')->name('student.store');
    Route::get('edit/{student}', 'App\Http\Controllers\StudentController@edit')->name('student.edit');
    Route::post('update/{student}', 'App\Http\Controllers\StudentController@update')->name('student.update');
    Route::post('destroy/{student}', 'App\Http\Controllers\StudentController@destroy' )->name('student.destroy');
    Route::get('show/{student}', 'App\Http\Controllers\StudentController@show')->name('student.show');
});

Route::prefix('attendancegroups')->group(function() {
    Route::get('', 'App\Http\Controllers\AttendanceGroupController@index')->name('attendancegroup.index');
    Route::get('create', 'App\Http\Controllers\AttendanceGroupController@create')->name('attendancegroup.create');
    Route::post('store', 'App\Http\Controllers\AttendanceGroupController@store')->name('attendancegroup.store');
    Route::get('edit/{attendancegroup}', 'App\Http\Controllers\AttendanceGroupController@edit')->name('attendancegroup.edit');
    Route::post('update/{attendancegroup}', 'App\Http\Controllers\AttendanceGroupController@update')->name('attendancegroup.update');
    Route::post('destroy/{attendancegroup}', 'App\Http\Controllers\AttendanceGroupController@destroy' )->name('attendancegroup.destroy');
    Route::get('show/{attendancegroup}', 'App\Http\Controllers\AttendanceGroupController@show')->name('attendancegroup.show');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/', function () {
    return redirect()->route('project.index');
});