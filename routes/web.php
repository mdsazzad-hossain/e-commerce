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
    return view('layouts.frontend.home');
});

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/register', 'Backend\LoginController@register_index')->name('register');

Route::group(["namespace"=>"Backend"],function() {
    Route::group(['middleware' => 'guest'], function () {
        Route::get('/admin', 'LoginController@login_index')->name('login');
        Route::get('/register', 'LoginController@register_index')->name('register');
        Route::post('/register-store', 'LoginController@store')->name('user.store');
        Route::post('/login', 'LoginController@login')->name('user.login');
    });


    Route::group(['middleware' => 'auth'], function () {
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
        //sub cat
        Route::get('sub-categories', 'ChildCategoryController@index')->name('child.category');
        Route::post('sub-category-create', 'ChildCategoryController@store')->name('child.add');
        Route::post('sub-category-update', 'ChildCategoryController@update')->name('update.child');
        Route::post('sub-category-delete/{id}', 'ChildCategoryController@destroy')->name('delete.child');
        //sub sub-cat
        Route::get('sub-sub-categories', 'SubChildCategoryController@index')->name('sub.child.category');
        Route::post('sub-sub-category-create', 'SubChildCategoryController@store')->name('sub.child.add');
        Route::post('sub-sub-category-update', 'SubChildCategoryController@update')->name('update.sub.child');
        Route::post('sub-sub-category-delete/{id}', 'SubChildCategoryController@destroy')->name('delete.sub.child');
        
         //Brand
        //  Route::get('products', 'ProductController@index')->name('products');
         Route::post('brand-create', 'BrandController@store')->name('brand.add');
         // Route::post('sub-sub-category-update', 'SubChildCategoryController@update')->name('update.sub.child');
         // Route::post('sub-sub-category-delete/{id}', 'SubChildCategoryController@destroy')->name('delete.sub.child');
        //product
        Route::get('products', 'ProductController@index')->name('products');
        Route::post('product-create', 'ProductController@store')->name('product.add');
        // Route::post('sub-sub-category-update', 'SubChildCategoryController@update')->name('update.sub.child');
        // Route::post('sub-sub-category-delete/{id}', 'SubChildCategoryController@destroy')->name('delete.sub.child');
        //product
        // Route::get('products', 'ProductController@index')->name('products');
        Route::post('product-avatar-create', 'ProductAvatarController@store')->name('avatar.upload');
        // Route::post('sub-sub-category-update', 'SubChildCategoryController@update')->name('update.sub.child');
        // Route::post('sub-sub-category-delete/{id}', 'SubChildCategoryController@destroy')->name('delete.sub.child');
    });

});

// Route::group(['namespace' => 'Frontend'], function () {

//     Route::get('home', 'HomeController@index')->name('home');

// });
