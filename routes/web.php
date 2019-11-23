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

Route::get('/', 'HomeController@index');
Route::get('/job-details/{slug}', 'HomeController@jobDetails')->name('job-details');

Route::get('/user-profile', 'userProfileController@index')->name('user-profile.index');
Route::post('/user-profile', 'userProfileController@store')->name('user-profile.store');

//Route::get('login', 'employerLoginController@index')->name('login.index');

Route::group(['namespace' => 'Employer'], function(){
	Route::get('employer/register', 'employerRegisterController@index')->name('register.index');
	Route::post('employer/register', 'employerRegisterController@store')->name('register.store');
	Route::get('employer/login', 'employerLoginController@index')->name('login.index');
	Route::post('employer/login', 'employerLoginController@Login')->name('employer.login');
	Route::get('employer/logout', 'employerLoginController@Logout')->name('employer.logout');
	Route::get('employer/profile', 'employerProfileController@index')->name('profile.index');
});

Route::group(['namespace' => 'Jobpost'], function(){
	Route::get('jobpost', 'jobPostController@index')->name('jobpost.index');
	Route::post('jobpost', 'jobPostController@store')->name('jobpost.store');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
