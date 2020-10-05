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
    return view('layouts.backend.auth.login');
});

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/register', 'Backend\LoginController@register_index')->name('register');

Route::group(["namespace"=>"Backend"],function() {
    Route::get('/', 'LoginController@login_index')->name('login');
    Route::get('/register', 'LoginController@register_index')->name('register');
    
    Route::post('/register-store', 'LoginController@store')->name('user.store');
    Route::post('/login', 'LoginController@login')->name('user.login');
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
    Route::get('user-list', 'DashboardController@user_list')->name('user.list');
    Route::get('vendor-list', 'DashboardController@vendor_list')->name('vendor.list');
    Route::post('update-user', 'loginController@update')->name('update.user');
    Route::post('delete-user', 'loginController@destroy')->name('delete.user');
    Route::get('user-role', 'RoleController@create')->name('user.role');
    Route::post('user-role-store', 'RoleController@store')->name('store.role');
    Route::get('role-edit/{id}', 'RoleController@edit')->name('role.edit');
    Route::post('role-update', 'RoleController@update')->name('update.role');
    Route::post('role-delete/{id}', 'RoleController@destroy')->name('role.delete');
    Route::get('banar-list', 'BanarController@index')->name('banar.list');
    Route::post('banar-upload', 'BanarController@upload')->name('banar.upload');
    Route::get('dropzone/fetch', 'BanarController@fetch')->name('dropzone.fetch');
    Route::post('delete-banar', 'BanarController@delete')->name('dropzone.delete');
    Route::get('categories', 'CategoryController@index')->name('categories');
    Route::post('create-category', 'CategoryController@store')->name('category.add');
    Route::post('update-category', 'CategoryController@update')->name('category.update');
    Route::post('delete-category', 'CategoryController@destroy')->name('category.delete');
    Route::get('sub-categories', 'ChildCategoryController@index')->name('child.category');

});