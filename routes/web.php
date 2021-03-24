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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('category', 'CategoryController');
Route::get('category/categoryType', 'CategoryController@categoryType');
Route::get('job/job/', 'JobController@myJobs')->name('job.myjobs');
// Route::get('jobs/bid/', 'JobsController@bid')->name('jobs.bid');
Route::get('job/{slug}/applications', 'JobController@applications')->name('applications');
Route::get('users/{name}/applicant', 'ApplicationController@applicant')->name('applicant');
Route::resource('job', 'JobController');
// Route::get('job/{slug}', 'JobController@show');
Route::get('users/myprofile', 'UserController@profile')->name('user.myprofile')->middleware('auth');
Route::get('users/editprofile', 'UserController@edit')->name('editprofile')->middleware('auth');
Route::resource('users', 'UserController');
// Route::resource('jobs.application', 'ApplicationController');
// Route::get('categories/jobsPerCategory', 'CategoriesController@categoriesJob')->name('categories.jobsPerCategory');
// Route::resource('categories', 'CategoriesController');
// Route::get('bids/failed/', 'BidsController@myBid')->name('bids.failed');
Route::get('applications/pending/', 'ApplicationController@pending')->name('pending');
Route::get('applications/approved/', 'ApplicationController@approved')->name('approved');
// Route::get('bids/bidList/', 'BidsController@bidList')->name('bids.bids');
// Route::get('jobs.bids/{job}', 'BidsController@bid')->name('bids.bid');
Route::resource('job.applications', 'ApplicationController')->except(['index']);
// Route::post('/bids/{bid}/approve','ApproveBidController')->name('bids.approve');
Route::post('job/{application}/application','ApproveApplicationController')->name('approve');
Route::get('job/{application}/application','ApproveApplicationController')->name('approve');
// Route::get('/roles', 'PermissionController@Permission');
// Route::get('/markAsRead', function(){
//     auth()->user()->unreadNotifications->markAsRead();
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
