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
|--------------------------------------------------------------------------
| 1) User 認証不要
|--------------------------------------------------------------------------
*/
Route::get('/', function () { return view('top'); });
Route::get('/items', 'ItemsController@index');
Route::get('/items/search', 'ItemsController@search');
Route::get('/item/{item}', 'ItemsController@show');


Auth::routes();
/*
|--------------------------------------------------------------------------
| 2) User ログイン後
|--------------------------------------------------------------------------
*/
Route::group(['middleware' => 'auth:user'], function() {
    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/users/edit', 'UsersController@edit');
    Route::get('/users/password/{user_id}', 'UsersController@password');
    Route::post('/users/password_confirmation/{user_id}', 'UsersController@password_confirmation');
    Route::get('/users/{user_id}', 'UsersController@index');
    Route::post('/users/update/{user_id}', 'UsersController@update');

    Route::get('/items/search', 'ItemsController@search');

    Route::get('/cartitem', 'CartItemsController@index');
    Route::post('/cartitem/store', 'CartItemsController@store');
    Route::delete('/cartitem/{cartItem}', 'CartItemsController@destroy');
    Route::put('/cartitem/{cartItem}', 'CartItemsController@update');

    Route::get('/buy', 'BuyController@index');
    Route::post('/buy/update/{cartitems}', 'BuyController@store');


});

/*
|--------------------------------------------------------------------------
| 3) Admin 認証不要
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'admin'], function() {
    Route::get('/',         function () { return redirect('/admin/home'); });
    Route::get('login',     'Admin\LoginController@showLoginForm')->name('admin.login');
    Route::post('login',    'Admin\LoginController@login');
});

/*
|--------------------------------------------------------------------------
| 4) Admin ログイン後
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function() {
    Route::post('logout',   'Admin\LoginController@logout')->name('admin.logout');
    Route::get('home',      'Admin\HomeController@index')->name('admin.home');

    Route::get('/', function () { return view('/admin/top'); });

    Route::get('/users', 'Admin\AdminUsersController@index');
    Route::get('/users/new', 'Admin\AdminUsersController@new');
    Route::post('/users/store', 'Admin\AdminUsersController@store');
    Route::get('/users/edit/{user_id}', 'Admin\AdminUsersController@edit');
    Route::post('/users/update/{user_id}', 'Admin\AdminUsersController@update');
    Route::get('/users/delete/{user_id}', 'Admin\AdminUsersController@destroy');
    Route::get('/users/{user_id}', 'Admin\AdminUsersController@show');

    Route::get('/items/search', 'Admin\AdminItemsController@search');

    Route::get('/items', 'Admin\AdminItemsController@index');
    Route::get('/items/new', 'Admin\AdminItemsController@new');
    Route::post('/items/store', 'Admin\AdminItemsController@store');
    Route::get('/items/edit/{item_id}', 'Admin\AdminItemsController@edit');
    Route::post('/items/update/{item_id}', 'Admin\AdminItemsController@update');
    Route::get('/items/delete/{user_id}', 'Admin\AdminItemsController@destroy');
    Route::get('/items/{item_id}', 'Admin\AdminItemsController@show');

    Route::get('/blogs/search', 'Admin\AdminBlogsController@search');

    Route::get('/blogs', 'Admin\AdminBlogsController@index');
    Route::get('/blogs/new', 'Admin\AdminBlogsController@new');
    Route::post('/blogs/store', 'Admin\AdminBlogsController@store');
    Route::get('/blogs/edit/{blog_id}', 'Admin\AdminBlogsController@edit');
    Route::post('/blogs/update/{blog_id}', 'Admin\AdminBlogsController@update');
    Route::get('/blogs/delete/{blog_id}', 'Admin\AdminBlogsController@destroy');
    Route::get('/blogs/show/{blog_id}', 'Admin\AdminBlogsController@show');

});
