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



// Forntend routs 
// home route
Route::get('/', 'FrontendController@index')->name('website.index');
// about route 
Route::get('/about', 'FrontendController@about')->name('website.about');
// category route 
Route::get('/category/{slug}', 'FrontendController@category')->name('website.category');
// contact route 
Route::get('/contact', 'FrontendController@contact')->name('website.contact');
// post route 
Route::get('/post/{slug}', 'FrontendController@post')->name('website.post');







// single post or post detais route 

// frontend routs end 

// Backend Routes start

route::group(['prefix'=>'/home', 'middleware' =>['auth']],  function(){
    route::get('/dashboard', function(){
        return view('admin.dashboard.index')->name('home');
    });

    route::resource('category', 'CategoryController');
    route::resource('tag', 'TagController');
    route::resource('post', 'PostController');
    Route::post('post/delete/{id}', 'PostController@delete')->name('post.delete');

    route::resource('user', 'UserController');
    Route::post('user/delete/{id}', 'UserController@delete')->name('user.delete');
    Route::get('/profile', 'UserController@profile')->name('user.profile');
    Route::get('/profile/update', 'UserController@profileupdate')->name('profile.update');
    Route::resource('settings', 'WebsiteSettingsXontroller@index');

});