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
Route::resource('job.comments', 'CommentsController');
Route::get('category/categoryType', 'CategoryController@categoryType');
Route::get('job/job/', 'JobController@myJobs')->name('job.myjobs');
Route::get('job/approved/', 'JobController@approved')->name('approved-jobs');
Route::get('job/expired/', 'JobController@expired')->name('expired-jobs');
Route::get('job/{slug}/applications', 'JobController@applications')->name('applications');
Route::get('users/{name}/applicant', 'UserController@applicant')->name('applicant');
Route::resource('job', 'JobController');
// Route::get('job/{slug}', 'JobController@show');
Route::get('users/myprofile', 'UserController@profile')->name('user.myprofile')->middleware('auth');
Route::resource('users', 'UserController');
Route::get('users/{name}/editprofile', 'UserController@edit')->name('editprofile')->middleware('auth');
// Route::resource('jobs.application', 'ApplicationController');
// Route::get('categories/jobsPerCategory', 'CategoriesController@categoriesJob')->name('categories.jobsPerCategory');
// Route::resource('categories', 'CategoriesController');
// Route::get('bids/failed/', 'BidsController@myBid')->name('bids.failed');

Route::get('applications/pending/', 'ApplicationController@pending')->name('pending');
Route::get('applications/approved/', 'ApplicationController@approved')->name('approved');
Route::get('applications/failed/','ApplicationController@failed')->name('failed');
Route::get('job.applications/{job}', 'ApplicationController@show')->name('bids.bid');
// Route::get('bids/bidList/', 'BidsController@bidList')->name('bids.bids');
// Route::get('jobs.bids/{job}', 'BidsController@bid')->name('bids.bid');
Route::resource('job.applications', 'ApplicationController')->except(['index']);
Route::post('job/{application}/application','ApproveApplicationController')->name('approve');
Route::get('job/{application}/application','ApproveApplicationController')->name('approve');

Route::get('/markAsRead', function(){
    auth()->user()->unreadNotifications->markAsRead();
});
Route::get('/FAQ','PageController@faq')->name('FAQ');
Route::get('/about','PageController@about')->name('about');
Route::get('/contact','PageController@contact')->name('contact');
Route::post('/contact','PageController@sendContact');
Route::get('/search/','PageController@search')->name('search');
Route::get('/find','PageController@find')->name('find');

Route::get('mpesa/register','MpesaController@index')->name('mpesa.register');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
