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
/*
Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/cms/register', 'CMS\AuthController@showRegisterForm')->name('admin.register');

Route::post('/cms/register', 'CMS\AuthController@register')->name('admin.registerpost');

Route::get('/cms/login', 'CMS\AuthController@showLoginForm')->name('admin.login');

Route::post('/cms/login', 'CMS\AuthController@login')->name('admin.loginpost');

Route::get('/cms/logout', 'CMS\AuthController@logout')->name('admin.logout');


Route::get('/cms/posts', 'CMS\PostController@index')->name('admin.posts');

Route::get('/cms/posts/view/{post_id}', 'Cms\PostController@view')->name('post.view');
Route::get('/cms/posts/edit/{post_id}', 'Cms\PostController@edit')->name('post.edit');

Route::post('/cms/posts/edit/{post_id}', 'CMS\PostController@edit')->name('post.editpost');

Route::get('/cms/posts/delete/{post_id}', 'CMS\PostController@delete')->name('post.delete');