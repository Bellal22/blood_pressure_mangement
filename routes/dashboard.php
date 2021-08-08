<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Dashboard Routes
|--------------------------------------------------------------------------
|
| Here is where you can register dashboard routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "dashboard" middleware group and "App\Http\Controllers\Dashboard" namespace.
| and "dashboard." route's alias name. Enjoy building your dashboard!
|
*/
Route::get('locale/{locale}', 'LocaleController@update')->name('locale')->where('locale', '(ar|en)');

Route::get('/', 'DashboardController@index')->name('home');

// Select All Routes.
Route::delete('delete', 'DeleteController@destroy')->name('delete.selected');
Route::delete('forceDelete', 'DeleteController@forceDelete')->name('forceDelete.selected');
Route::delete('restore', 'DeleteController@restore')->name('restore.selected');

// Doctors Routes.
Route::get('trashed/doctors', 'DoctorController@trashed')->name('doctors.trashed');
Route::get('trashed/doctors/{trashed_doctor}', 'DoctorController@showTrashed')->name('doctors.trashed.show');
Route::post('doctors/{trashed_doctor}/restore', 'DoctorController@restore')->name('doctors.restore');
Route::delete('doctors/{trashed_doctor}/forceDelete', 'DoctorController@forceDelete')->name('doctors.forceDelete');
Route::resource('doctors', 'DoctorController');

// Nurses Routes.
Route::get('trashed/nurses', 'NurseController@trashed')->name('nurses.trashed');
Route::get('trashed/nurses/{trashed_nurse}', 'NurseController@showTrashed')->name('nurses.trashed.show');
Route::post('nurses/{trashed_nurse}/restore', 'NurseController@restore')->name('nurses.restore');
Route::delete('nurses/{trashed_nurse}/forceDelete', 'NurseController@forceDelete')->name('nurses.forceDelete');
Route::resource('nurses', 'NurseController');

// Admins Routes.
Route::get('trashed/admins', 'AdminController@trashed')->name('admins.trashed');
Route::get('trashed/admins/{trashed_admin}', 'AdminController@showTrashed')->name('admins.trashed.show');
Route::post('admins/{trashed_admin}/restore', 'AdminController@restore')->name('admins.restore');
Route::delete('admins/{trashed_admin}/forceDelete', 'AdminController@forceDelete')->name('admins.forceDelete');
Route::resource('admins', 'AdminController');

// Settings Routes.
Route::get('settings', 'SettingController@index')->name('settings.index');
Route::patch('settings', 'SettingController@update')->name('settings.update');
Route::get('backup/download', 'SettingController@downloadBackup')->name('backup.download');

// Feedback Routes.
Route::get('trashed/feedback', 'FeedbackController@trashed')->name('feedback.trashed');
Route::get('trashed/feedback/{trashed_feedback}', 'FeedbackController@showTrashed')->name('feedback.trashed.show');
Route::post('feedback/{trashed_feedback}/restore', 'FeedbackController@restore')->name('feedback.restore');
Route::delete('feedback/{trashed_feedback}/forceDelete', 'FeedbackController@forceDelete')->name('feedback.forceDelete');
Route::patch('feedback/read', 'FeedbackController@read')->name('feedback.read');
Route::patch('feedback/unread', 'FeedbackController@unread')->name('feedback.unread');
Route::resource('feedback', 'FeedbackController')->only('index', 'show', 'destroy');

/*  The routes of generated crud will set here: Don't remove this line  */
