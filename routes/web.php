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
route::get('/', function(){
    return view('website.home');
});

// about route 
route::get('/about', function(){
    return view('website.about');
});
// category route 
route::get('/category', function(){
    return view('website.category');
});
// contact route 
route::get('/contact', function(){
    return view('website.contact');
});
// single post or post detais route 
route::get('/post', function(){
    return view('website.post');
});

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
});