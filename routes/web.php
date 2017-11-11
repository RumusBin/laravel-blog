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
// Users routes
Route::group(['namespace'=>'User'], function (){
    Route::get('/','HomeController@index')->name('home');
    Route::get('post/{post}', 'PostController@postShow')->name('show.post');
    Route::get('post/tag/{tag}', 'HomeController@tag')->name('tag');
    Route::get('post/category/{category}', 'HomeController@category')->name('category');
    //Vue routes
    Route::post('getPosts', 'PostController@getAllPosts');
    Route::post('saveLike', 'PostController@saveLike');
});

Route::get('/home', 'HomeController@index');

//Admins routes
Route::group(['namespace'=>'Admin', 'prefix'=>'admin'], function (){
    //protected admins routes only for authenticated
    Route::group(['middleware'=>'auth:admin'], function (){
        Route::get('/dashboard', 'HomeController@index')->name('admin.home');
        //Routes for posts
        Route::resource('/post', 'PostController');
        //Routes for tags
        Route::resource('/tag', 'TagController');
        //Routes for categories
        Route::resource('/category', 'CategoryController');
        //Routes for roles
        Route::resource('/roles', 'RoleController');
        //Routes for users
        Route::resource('/users', 'UserController');
        //Permissions routes
        Route::resource('/permission', 'PermissionsController');

        Route::get('/admins', 'UserController@index')->name('admins.list');

    });
    //Admin auth routes
    Route::get('login', 'Auth\LoginController@showLoginForm');
    Route::post('login', 'Auth\LoginController@login')->name('admin.login');
    Route::post('logout', 'Auth\LoginController@logout')->name('admin.logout');
    //Admin password reset routes
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('admin.password.reset');
});
//users auth routes
Auth::routes();
//new logout route for users
Route::get('/user/logout', 'Auth\LoginController@logout')->name('user.logout');


