<?php

use Illuminate\Support\Facades\Route;

/*composer global require laravel/installer
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
// Tag route 
Route::get('/tag/{slug}', 'FrontendController@tag')->name('website.tag');
// contact route 
Route::get('/contact', 'FrontendController@contact')->name('website.contact');
Route::post('/contact', 'contactController@store')->name('contact.store');
// post route 
Route::get('/post/{slug}', 'FrontendController@post')->name('website.post');







// single post or post detais route 

// frontend routs end 

// Backend Routes start

route::group(['prefix'=>'/home', 'middleware' =>['auth']],  function(){
    route::get('/dashboard','DashboardController@index')->name('home');

    route::resource('category', 'CategoryController');
    route::resource('tag', 'TagController');
    route::resource('post', 'PostController');
    Route::post('post/delete/{id}', 'PostController@delete')->name('post.delete');

    route::resource('user', 'UserController');
    Route::post('user/delete/{id}', 'UserController@delete')->name('user.delete');
    Route::get('/profile', 'UserController@profile')->name('user.profile');
    Route::get('/profile/update', 'UserController@profileupdate')->name('profile.update');


// settings route 
    Route::get('settings', 'FrontendSettingController@edit')->name('settings.edit');
    Route::post('settings/update', 'FrontendSettingController@update')->name('settings.update');



    // message route 
    route::get('message/inbox', 'contactController@index')->name('contacet.index');
    route::get('/message/read/{id}', 'contactController@viewmessage')->name('contacet.viewmessage');
});