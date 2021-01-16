<?php

use Illuminate\Support\Facades\Auth;
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



Route::namespace('BackEnd')->prefix('admin')->middleware('admin')->group(function (){
    Route::get('home','HomeController@index')->name('admin.home');

    // Route::get('users','UsersController@index');
    // Route::get('users/create','UsersController@create');
    // Route::post('users','UsersController@store');
    // Route::get('users/{id}','UsersController@edit');
    // Route::post('users/{id}','UsersController@update');
    // Route::get('users/delete/{id}','UsersController@index');
    
    Route::resource('users', 'UsersController')->except(['show']);
    Route::resource('categories', 'Categories')->except(['show']);
    Route::resource('skills', 'SkillsController')->except(['show']);
    Route::resource('tags', 'TagsController')->except(['show']);
    Route::resource('pages', 'PagesController')->except(['show']);
    Route::resource('videos', 'Videos')->except(['show']);
    Route::resource('messages', 'MessagesController')->only(['index','destroy','edit']);

    Route::post('message/replay/{id}', 'MessagesController@replay')->name('message.replay');

    Route::post('comments', 'Videos@commentStore')->name('comment.store');
    Route::get('comments/{id}', 'Videos@commentDelete')->name('comment.delete');
    Route::post('comments/{id}', 'Videos@commentUpdate')->name('comment.update');



    

});

// Route::get('admin/home','BackEnd\HomeController@index');
Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');

Route::get('/category/{id}', 'HomeController@category')->name('front.category');

Route::get('/skills/{id}', 'HomeController@skills')->name('front.skill');
Route::get('/tags/{id}', 'HomeController@tags')->name('front.tags');

Route::get('/video/{id}', 'HomeController@getVideo')->name('frontEnd.video');
Route::post('/contact-us', 'HomeController@messageStore')->name('contact.store');
Route::get('/page/{id}/{slug?}', 'HomeController@page')->name('front.page');
Route::get('/profile/{id}/{slug?}', 'HomeController@profile')->name('front.profile');
Route::get('/', 'HomeController@welcome')->name('frontend.landing');

Route::middleware('admin')->group(function (){
    
    Route::post('/profile', 'HomeController@updateProfile')->name('profile.update');

    Route::post('/comments/{id}', 'HomeController@commentUpdate')->name('front.commentUpdate');
    Route::post('/comments/{id}/create', 'HomeController@commentStore')->name('front.commentStore');

});




