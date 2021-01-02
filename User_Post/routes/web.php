<?php

use Illuminate\Routing\RouteRegistrar;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
//Home-page


//user
//show table manageuser
Route::get('manageuser', 'UserController@index')->name('manageuser.index');
//login
Route::get('Login', 'UserController@logins')->name('login.index');
//forgot password
Route::get('forgotpassword', 'UserController@forgotpassword')->name('forgotpassword');
//goi den trang login
Route::get('createacount', 'UserController@create')->name('createaccount.create');
//register
Route::post('createacount', 'Auth\RegisterController@register');
//
 Route::post('createacount', 'UserController@store')->name('register.create');
//destroy
Route::delete('deleteuser/{id}', 'UserController@destroy')->name('user.destroy');
// edit user
Route::get('edit-user/{id}', 'UserController@edit')->name('edituser.edit');
//updateuser
Route::post('edituser', 'UserController@update')->name('edituser.update');


///category
//show category
Route::get('managecategory','CategoryController@index')->name('category.index');

//chuyen trang create category
Route::get('createcategory','CategoryController@create')->name('category.create');

//create name of category roi chuyen ve trang managecategory
Route::post('createcategory','CategoryController@store')->name('category.store');

//Delete category
Route::delete('category/delete/{id}', 'CategoryController@destroy')->name('category.destroy');

//chuyen den trang edit category
Route::get('editcategory/edit/{id}','CategoryController@edit')->name('category.edit');

//edit category va chuyen ve trang managecategory
Route::post('editcategory','CategoryController@update')->name('category.update');

//change information of user
//chuyen den trang profile
Route::get('change/infor/user/edit','ChangeInforUserController@edit')->name('changeinforuser.edit');

//change infor user va chuyen ve trang quan ly
Route::post('change/infor/user','ChangeInforUserController@update')->name('changeinforuser.update');

//chagne password user
//chuyen den trang update password
Route::get('password/update','ChangePasswordUserController@index')->name('password.index');

//update password va quay tro ve trang quan ly
Route::post('password/update','ChangePasswordUserController@store')->name('password.store');

//cac fuction ma nguoi dung duoc quyen truy cap
//UserController: logins,forgotpassword,create
//Auth\RegisterController: register
//thay doi password,chinh sua thong tin user.

Route::get('permission/admin/user','UserPermissionController@index')->name('permission.index');

//post
Route::get('managenewpost','PostController@index')->name('post.index');

//create new post
Route::get('createnewpost','PostController@create')->name('post.create');

//create new post va quay ve trang manage post
Route::post('createnewpost','PostController@store')->name('post.store');

//edit new post
Route::get('editnewpost/edit/{id}','PostController@edit')->name('post.edit');

//edti new post va chuyen ve trang manage post
Route::post('editnewlost','PostController@update')->name('post.update');

//delete new post
Route::delete('post/delete/{id}', 'PostController@destroy')->name('post.destroy');

//home
Route::get('HomePage','HomePageController@home')->name('Home.home');

//shownewpost
//Route::get('shownewpost','HomePageController@index')->name('Home.index');

//test
Route::get('test/{categoryId}','HomePageController@show')->name('test');

//auth
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


