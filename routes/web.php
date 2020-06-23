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

Route::get('/', function () {
    return view('index');
});




//-------------------------Admin Routeing pages -------------------------------

Route::get('/admin','AdminController@index');
Route::get('/login','AdminController@login');
Route::post('/admin-login','AdminController@adminLogin');
Route::get('/admin-dashbord','AdminController@index');
Route::get('/add-user','AdminController@addUser');
Route::get('/add-teacher','AdminController@addTeacher');
Route::get('/add-student','AdminController@addStudent');
Route::get('/add-web-menu','AdminController@addWebMenu');
Route::get('/add-web-slider','AdminController@addWebSlider');

//-------------------------Admin Add User Routeing pages -------------------------------
Route::get('/admininfo/{id}','AddUserController@show');


Route::post('/admin-user-add','AddUserController@adminUserAdd');
Route::get('/show-user-list','AddUserController@showUserList')->name('AllContact');



//-------------------------testing Routeing pages-------------------------------
Route::get('/test','MenuController@allFuncationTest');
Route::get('/Data','MenuController@allFuncation');




