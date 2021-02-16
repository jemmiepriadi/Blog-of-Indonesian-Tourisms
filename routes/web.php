<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;

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

Route::get('/home', function()
{
    return view('home');
});

Route::group(['middleware' => ['auth','checkroleadmin:admin']],function(){
    Route::get('/admin/home', function()
    {
        return view('admin.home');
    });
    Route::get('/admin/user', 'DashboardController@index');
    Route::get('/admin/user/{id}/delete','DashboardController@delete');
});

Route::group(['middleware' => ['auth','checkroleuser:user']],function(){
    Route::get('/user/home', function()
    {
        return view('user.home');
    });
    Route::get('/user/blog/', function()
    {
        return view('user.blog');
    });
    Route::get('/user/profile', function()
    {
        return view('user.profile');
    });
    Route::post('/user/profile/{id}/edit','UserController@edit');
    Route::get('/user/blog/create','BlogController@create');
    Route::post('/user/blog/create/{id}','BlogController@postcreate');
    Route::get('/user/blog','BlogController@index');
    Route::get('/user/blog/{id}/delete','BlogController@delete');
    Route::get('/user/blog/{id}/edit','BlogController@edit');
    Route::post('/user/blog/{id}/update','BlogController@update');
});



Route::get('/register', 'AuthController@register');
Route::post('/postregister', 'AuthController@postregister');
Route::post('/postlogin','AuthController@postlogin');
Route::get('/login', 'AuthController@login')->name('login');
Route::get('/dashboard','DashboardController@index');
Route::get('/logout', 'AuthController@logout');

Route::get('/home/beach/{id}', 'HomeController@index');
Route::get('/home/mountain/{id}', 'HomeController@index');
Route::get('/home/foods/{id}', 'HomeController@index');